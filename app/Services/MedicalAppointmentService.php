<?php

namespace App\Services;

use App\Models\MedicalAppointment;
use App\Models\Schedule;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentService
{
    public function __construct() {}

    public function create($request): MedicalAppointment
    {
        return DB::transaction(function () use ($request) {
            $schedule = Schedule::create([
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            
            if (!$schedule) {
                throw new Exception('Erro ao criar o agendamento.');
            }

            $appointment = MedicalAppointment::create([
                'patient_id' => $request->patient_id,
                'professional_id' => $request->professional_id,
                'unit_id' => $request->unit_id,
                'appointment_type_id' => $request->appointment_type_id,
                'status_id' => $request->status_id,
                'schedule_id' => $schedule->id
            ]);

            if (!$appointment) {
                throw new Exception('Erro ao criar a consulta.');
            }
    
            return $appointment->load('schedule');
        });
    }

    public function update($request): MedicalAppointment
    {
        return DB::transaction(function () use ($request) {
            $appointment = MedicalAppointment::findOrFail($request->medical_appointment_id);
    
            if ($request->filled('schedule_id')) {
                $schedule = Schedule::findOrFail($request->schedule_id);
                $schedule->update([
                    'date' => $request->date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                ]);
            }
    
            $appointment->update([
                'patient_id' => $request->patient_id,
                'professional_id' => $request->professional_id,
                'unit_id' => $request->unit_id,
                'appointment_type_id' => $request->appointment_type_id,
                'status_id' => $request->status_id,
                'schedule_id' => $schedule->id
            ]);
    
            return $appointment->load('schedule');
        });
    }

    public function archive($request): string
    {
        $updated = MedicalAppointment::where('id', $request->id)->update([
            'is_archived' => true
        ]);

        return $updated ? "Consulta arquivada com sucesso." : "Consulta não encontrada.";
    }

    public function listAll(): JsonResponse
    {
        $appointments = MedicalAppointment::query()->with('schedule')->get();

        return response()->json($appointments);
    }

    public function details($appointmentId): MedicalAppointment
    {
        return MedicalAppointment::query()->with('schedule')->find($appointmentId);
    }
}
