<?php

namespace App\Http\Controllers;

use App\Services\MedicalAppointmentService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MedicalAppointmentsController extends Controller

{
    public function __construct(protected MedicalAppointmentService $medicalAppointmentService){}

    public function create(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|int',
            'professional_id' => 'required|int',
            'unit_id' => 'required|int|exists:healthcare_units,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'appointment_type_id' => 'required|int|exists:appointment_types,id',
            'status_id' => 'required|int|exists:appointment_status,id',
        ]);

        $appointment = $this->medicalAppointmentService->create($request);

        return response()->json([
            'message' => 'Consulta criada com sucesso',
            'professional' => $appointment
        ], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'medical_appointment_id' => 'required|int|exists:medical_appointments,id',
            'patient_id' => 'required|int|exists:patients,id',
            'professional_id' => 'required|int|exists:healthcare_professionals,id',
            'unit_id' => 'required|int|exists:healthcare_units,id',
            'schedule_id' => 'nullable|int|exists:schedules,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'appointment_type_id' => 'required|int|exists:appointment_types,id',
            'status_id' => 'required|int|exists:appointment_status,id',
        ]);
    
        $appointment = $this->medicalAppointmentService->update($request);
    
        return response()->json([
            'message' => 'Consulta atualizada com sucesso',
            'appointment' => $appointment
        ], 200);
    }
    

    public function archive(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|int|exists:medical_appointments,id',
        ]);

        $data = $this->medicalAppointmentService->archive($request);
        return response()->json($data);
    }

    public function listAll(Request $request): JsonResponse
    {
        $data = $this->medicalAppointmentService->listAll();
        return response()->json($data);
    }

    public function details($appointmentId): JsonResponse
    {
        $appointment = $this->medicalAppointmentService->details($appointmentId);
    
        if (!$appointment) {
            return response()->json(['error' => 'Consulta não encontrada'], 404);
        }
    
        return response()->json($appointment);
    }  
}