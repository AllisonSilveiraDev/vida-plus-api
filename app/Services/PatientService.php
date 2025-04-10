<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\User;

class PatientService
{
    public function __construct(){}

    public function create($request): Patient
    {
        $patient = Patient::create([
            'birth_date' => $request->birth_date,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'blood_type' => $request->blood_type,
        ]);

        return $patient;
    }

    public function update($request): Patient
    {
        $patient = Patient::findOrFail($request->patient_id);
    
        $patient->update($request->only([
            'birth_date',
            'cpf',
            'rg',
            'phone',
            'address',
            'gender',
            'marital_status',
            'blood_type',
        ]));
    
        return $patient;
    }

    public function archive($request): string
    {
        $updated = Patient::where('id', $request->id)->update([
            'is_archived' => true
        ]);
    
        return $updated ? "Paciente arquivado com sucesso." : "Paciente não encontrado.";
    }

    public function validate($request): string
    {
        $patientId = $request->patient_id;
        $userId = $request->user_id;
    
        $userExists = User::find($userId);
        $patientExists = Patient::find($patientId);
    
        if (!$userExists || !$patientExists) {
            return "Usuário ou paciente não encontrado.";
        }
    
        $updatedUser = User::where('id', $userId)->update([
            'patient_id' => $patientId
        ]);
    
        if ($updatedUser) {
            $updatedPatient = Patient::where('id', $patientId)->update([
                'is_validated' => true
            ]);
    
            if ($updatedPatient) {
                return "Paciente validado com sucesso.";
            }
        }
    
        return "Falha na validação do paciente.";
    }

    public function listAll()
    {
        $patients = Patient::query()->with('user')->get();
    
        return response()->json($patients);
    }

    public function details($patientId)
    {
        return Patient::query()->with('user')->find($patientId);
    }
    
}