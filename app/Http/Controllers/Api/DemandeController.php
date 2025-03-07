<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::all();
        return response()->json($demandes);
    }

    public function store(StoreDemandeRequest $request)
    {
        $demande = Demande::create($request->validated());
        return response()->json($demande, 201);
    }

    public function show(Demande $demande)
    {
        return response()->json($demande);
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        $demande->update($request->validated());
        return response()->json($demande);
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return response()->json(null, 204);
    }
}
