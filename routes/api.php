<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealthcareUnit;
use App\Http\Controllers\MedicalAppointments;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfessionalController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

Route::prefix('patient')->middleware('auth:api')->group(function () {
    Route::post('create', [PatientController::class, 'create']);
    Route::post('update', [PatientController::class, 'update']);
    Route::post('archive', [PatientController::class, 'archive']);
    Route::post('validate', [PatientController::class, 'validate']);
    Route::get('list-all', [PatientController::class, 'listAll']);
    Route::get('details/{patient_id}', [PatientController::class, 'details']);
});

Route::prefix('professional')->middleware('auth:api')->group(function () {
    Route::post('create', [ProfessionalController::class, 'create']);
    Route::post('update', [ProfessionalController::class, 'update']);
    Route::post('archive', [ProfessionalController::class, 'archive']);
    Route::post('validate', [ProfessionalController::class, 'validate']);
    Route::get('list-all', [ProfessionalController::class, 'listAll']);
    Route::get('details/{professional_id}', [ProfessionalController::class, 'details']);
});

Route::prefix('healthcare-unit')->middleware('auth:api')->group(function () {
    Route::post('create', [HealthcareUnit::class, 'create']);
    Route::post('update', [HealthcareUnit::class, 'update']);
    Route::post('archive', [HealthcareUnit::class, 'archive']);
    Route::get('list-all', [HealthcareUnit::class, 'listAll']);
    Route::get('details/{appointments_id}', [HealthcareUnit::class, 'details']);
});

// Route::prefix('medical-appointments')->middleware('auth:api')->group(function () {
//     Route::post('create', [MedicalAppointments::class, 'create']);
//     Route::post('update', [MedicalAppointments::class, 'update']);
//     Route::post('archive', [MedicalAppointments::class, 'archive']);
//     Route::post('validate', [MedicalAppointments::class, 'validate']);
//     Route::get('list-all', [MedicalAppointments::class, 'listAll']);
//     Route::get('details/{appointments_id}', [MedicalAppointments::class, 'details']);
// });
