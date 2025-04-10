<?php

namespace App\Services;

use App\Models\HealthcareUnit;

class HealthcareUnitService
{
    public function __construct() {}

    public function create($request): HealthcareUnit
    {
        $healthcareUnit = HealthcareUnit::create([
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'type_id' => $request->type_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return $healthcareUnit;
    }

    public function update($request): HealthcareUnit
    {
        $healthcareUnit = HealthcareUnit::findOrFail($request->healthcare_unit_id);

        $healthcareUnit->update($request->only([
            'name',
            'cnpj',
            'type_id',
            'phone',
            'address',
        ]));

        return $healthcareUnit;
    }

    public function archive($request): string
    {
        $updated = HealthcareUnit::where('id', $request->id)->update([
            'is_archived' => true
        ]);

        return $updated ? "Unidade de saúde arquivada com sucesso." : "Unidade de saúde não encontrada.";
    }

    public function listAll()
    {
        $healthcareUnits = HealthcareUnit::query()->with('type')->get();

        return response()->json($healthcareUnits);
    }

    public function details($healthcareUnitId)
    {
        return HealthcareUnit::query()->with('type')->find($healthcareUnitId);
    }
}
