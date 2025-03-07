<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntiteAffectation;
use App\Http\Requests\StoreEntiteAffectationRequest;
use App\Http\Requests\UpdateEntiteAffectationRequest;
use App\Http\Controllers\Api\EntiteAffectationController as ApiEntiteAffectationController;

class EntiteAffectationController extends Controller
{
    protected $apiEntiteAffectationController;

    public function __construct(ApiEntiteAffectationController $apiEntiteAffectationController)
    {
        $this->apiEntiteAffectationController = $apiEntiteAffectationController;
    }

    public function index()
    {
        $entitesAffectation = $this->apiEntiteAffectationController->index()->original;
        return view('entitesAffectation.index', ['entitesAffectation' => $entitesAffectation]);
    }

    public function create()
    {
        return view('entitesAffectation.create');
    }

    public function store(StoreEntiteAffectationRequest $request)
    {
        $validatedData = $request->validated();
        try {
            EntiteAffectation::create($validatedData);
            return redirect()->route('entitesAffectation.index')->with('success', 'Entité d\'affectation créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de l\'entité d\'affectation. Veuillez réessayer.']);
        }
    }

    public function show($id)
    {
        $entiteAffectation = $this->apiEntiteAffectationController->show($id);
        return view('entitesAffectation.show', ['entiteAffectation' => $entiteAffectation]);
    }

    public function edit($id)
    {
        $entiteAffectation = EntiteAffectation::findOrFail($id);
        return view('entitesAffectation.edit', compact('entiteAffectation'));
    }

    public function update(UpdateEntiteAffectationRequest $request, $id)
    {
        $validatedData = $request->validated();
        try {
            $entiteAffectation = EntiteAffectation::findOrFail($id);
            $entiteAffectation->update($validatedData);
            return redirect()->route('entitesAffectation.index')->with('success', 'Entité d\'affectation mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la mise à jour de l\'entité d\'affectation. Veuillez réessayer.']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->apiEntiteAffectationController->destroy($id);
            return redirect()->route('entitesAffectation.index')->with('success', 'Entité d\'affectation supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la suppression de l\'entité d\'affectation. Veuillez réessayer.']);
        }
    }
}
