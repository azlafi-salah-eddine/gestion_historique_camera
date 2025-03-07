<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EntiteAffectation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntiteAffectationRequest;
use App\Http\Requests\UpdateEntiteAffectationRequest;

class EntiteAffectationController extends Controller
{
    public function index()
    {
        $entiteAffectations = EntiteAffectation::all();
        return response()->json($entiteAffectations);
    }
    public function store(StoreEntiteAffectationRequest $request)
    {
        $entiteAffectation = EntiteAffectation::create($request->validated());
        return response()->json($entiteAffectation, 201);
    }
    public function show(string $id)
    {
        $entiteAffectation = EntiteAffectation::findOrFail($id);
        return response()->json($entiteAffectation);
    }
    public function update(UpdateEntiteAffectationRequest $request, string $id)
    {
        $entiteAffectation = EntiteAffectation::findOrFail($id);
        $entiteAffectation->update($request->validated());
        return response()->json($entiteAffectation, 200);
    }
    public function destroy(string $id)
    {
        $entiteAffectation = EntiteAffectation::findOrFail($id);
        $entiteAffectation->delete();
        return response()->json(null, 204);
    }
}
