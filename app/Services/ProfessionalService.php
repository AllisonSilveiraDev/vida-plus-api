<?php

namespace App\Services;

use App\Models\HealthcareProfessional;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ProfessionalService
{
    public function __construct() {}

    public function create($request): HealthcareProfessional
    {
        $professional = HealthcareProfessional::create([
            'license_number' => $request->license_number,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'professional_type_id' => $request->professional_type_id,
            'specialty' => $request->specialty,
        ]);

        return $professional;
    }

    public function update($request): HealthcareProfessional
    {
        $professional = HealthcareProfessional::findOrFail($request->professional_id);

        $professional->update($request->only([
            'license_number',
            'cpf',
            'rg',
            'phone',
            'address',
            'gender',
            'professional_type_id',
            'specialty',
        ]));

        return $professional;
    }

    public function archive($request): string
    {
        $updated = HealthcareProfessional::where('id', $request->id)->update([
            'is_archived' => true
        ]);

        return $updated ? "Profissional arquivado com sucesso." : "Profissional não encontrado.";
    }

    public function validate($request): string
    {
        $professionalId = $request->professional_id;
        $userId = $request->user_id;
    
        $userExists = User::find($userId);
        $professionalExists = HealthcareProfessional::find($professionalId);
    
        if (!$userExists || !$professionalExists) {
            return "Usuário ou profissional não encontrado.";
        }
    
        $updatedUser = User::where('id', $userId)->update([
            'professional_id' => $professionalId
        ]);
    
        if ($updatedUser) {
            $updateData = ['is_validated' => true];
    
            if ($request->filled('professional_type_id')) {
                $updateData['professional_type_id'] = $request->professional_type_id;
            }
    
            $updatedProfessional = HealthcareProfessional::where('id', $professionalId)->update($updateData);
    
            if ($updatedProfessional) {
                return "Profissional validado com sucesso.";
            }
        }
    
        return "Falha na validação do profissional.";
    }
    

    public function listAll(): JsonResponse
    {
        $professionals = HealthcareProfessional::query()->with('user')->get();

        return response()->json($professionals);
    }

    public function details($professionalId): HealthcareProfessional
    {
        return HealthcareProfessional::query()->with('user')->find($professionalId);
    }
}
