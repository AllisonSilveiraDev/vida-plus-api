<?php

namespace App\Http\Controllers;

use App\Services\ProfessionalService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class MedicalAppointments extends Controller

{
    public function __construct(protected ProfessionalService $professionalService){}

    public function create(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|int|exists:patients,id',
            'professional_id' => 'required|int|exists:healthcare_professionals,id',
            'unit_id' => 'required|int|exists:healthcare_professionals,id',,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'professional_type_id' => 'required|int|exists:professional_types,id',
            'specialty' => 'nullable|string|max:255',
        ]);

        $professional = $this->professionalService->create($request);

        return response()->json([
            'message' => 'Profissional criado com sucesso',
            'professional' => $professional
        ], 201);
    }

    public function update(Request $request)
    {

        $request->validate([
            'professionalId' => 'required|int|exists:healthcare_professionals,id',
            'license_number' => [
                'nullable',
                'string',
                'size:11',
                Rule::unique('healthcare_professionals', 'license_number')->ignore($request->professionalId),
            ],
            'cpf' => [
                'nullable',
                'string',
                'size:11',
                Rule::unique('healthcare_professionals', 'cpf')->ignore($request->professionalId),
            ],
            'rg' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'professional_type_id' => 'required|int|exists:professional_types,id',
            'specialty' => 'nullable|string|max:255',
        ]);

        $professional = $this->professionalService->update($request);

        return response()->json([
            'message' => 'Profissional atualizado com sucesso',
            'professional' => $professional
        ], 201);
    }
    

    public function archive(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|exists:professional_types,id',
        ]);

        $data = $this->professionalService->archive($request);
        return response()->json($data);
    }

    public function validate(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:healthcare_professionals,id',
            'professional_type_id' => 'nullable|integer|exists:professional_types,id',
        ]);

        $data = $this->professionalService->validate($request);
        return response()->json($data);
    }

    public function listAll(Request $request): JsonResponse
    {
        $data = $this->professionalService->listAll();
        return response()->json($data);
    }

    public function details($professionalId): JsonResponse
    {
        $professional = $this->professionalService->details($professionalId);
    
        if (!$professional) {
            return response()->json(['error' => 'Professional not found'], 404);
        }
    
        return response()->json($professional);
    }  
}