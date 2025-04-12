<?php

namespace App\Http\Controllers;

use App\Services\HealthcareUnitService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HealthcareUnitController extends Controller
{
    public function __construct(protected HealthcareUnitService $healthcareUnitService){}

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' =>  'required|string|max:20',
            'type_id' => 'required|int|exists:unit_types,id',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $healthcareUnit = $this->healthcareUnitService->create($request);

        return response()->json([
            'message' => 'Unidade de saúde criada com sucesso',
            'healthcareUnit' => $healthcareUnit
        ], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'healthcare_unit_id' => 'required|int|exists:healthcare_units,id',
            'name' => 'required|string|max:255',
            'cnpj' =>  'required|string|max:20',
            'type_id' => 'required|int|exists:unit_types,id',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $healthcareUnit = $this->healthcareUnitService->update($request);

        return response()->json([
            'message' => 'Unidade de saúde atualizada com sucesso',
            'healthcareUnit' => $healthcareUnit
        ], 200);
    }

    public function archive(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|exists:healthcare_units,id',
        ]);

        $data = $this->healthcareUnitService->archive($request);

        return response()->json($data);
    }

    public function listAll(Request $request): JsonResponse
    {
        $data = $this->healthcareUnitService->listAll();
        return response()->json($data);
    }

    public function details($healthcareUnitId): JsonResponse
    {
        $healthcareUnit = $this->healthcareUnitService->details($healthcareUnitId);
    
        if (!$healthcareUnit) {
            return response()->json(['error' => 'Unidade de saúde não encontrada'], 404);
        }
    
        return response()->json($healthcareUnit);
    }  
}