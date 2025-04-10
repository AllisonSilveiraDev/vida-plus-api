<?php

namespace App\Http\Controllers;

use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    public function __construct(protected PatientService $patientService){}

    public function create(Request $request)
    {
        $request->validate([
            'birth_date' => 'required|date',
            'cpf' => 'required|string|size:11|unique:patients,cpf',
            'rg' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'marital_status' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:5',
        ]);

        $patient = $this->patientService->create($request);

        return response()->json([
            'message' => 'Paciente criado com sucesso',
            'patient' => $patient
        ], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|int|exists:patients,id',
            'birth_date' => 'date',
            'cpf' => 'string|size:11|unique:patients,cpf',
            'rg' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'marital_status' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:5',
        ]);

        $patient = $this->patientService->update($request);

        return response()->json([
            'message' => 'Paciente atualizado com sucesso',
            'patient' => $patient
        ], 200);
    }
    

    public function archive(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|exists:patients,id',
        ]);

        $data = $this->patientService->archive($request);
        return response()->json($data);
    }

    public function validate(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $data = $this->patientService->validate($request);
        return response()->json($data);
    }

    public function listAll(Request $request): JsonResponse
    {
        $data = $this->patientService->listAll();
        return response()->json($data);
    }

    public function details($patientId): JsonResponse
    {
        $patient = $this->patientService->details($patientId);
    
        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    
        return response()->json($patient);
    }  
}