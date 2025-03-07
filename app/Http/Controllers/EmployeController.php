<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Http\Request;
use App\Models\EntiteAffectation;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Http\Controllers\Api\EmployeController as ApiEmployeController;
use App\Http\Controllers\Api\EntiteAffectationController as ApiEntiteAffectationController;

class EmployeController extends Controller
{
    protected $apiEmployeController;
    protected $apiEntiteAffectationController;

    public function __construct(ApiEmployeController $apiEmployeController, ApiEntiteAffectationController $apiEntiteAffectationController)
    {
        $this->apiEmployeController = $apiEmployeController;
        $this->apiEntiteAffectationController = $apiEntiteAffectationController;
    }

    public function index()
    {
        $employes = $this->apiEmployeController->index()->original;
        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        $entitesAffectation = $this->apiEntiteAffectationController->index()->original;
        return view('employes.create', compact('entitesAffectation'));
    }

    public function store(StoreEmployeRequest $request)
    {
        $validatedData = $request->validated();
        try {
            Employe::create($validatedData);
            return redirect()->route('employes.index')->with('success', 'Employé ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'ajout de l\'employé. Veuillez réessayer.']);
        }
    }

    public function edit($id)
    {
        $employe = $this->apiEmployeController->show($id)->original;
        $entitesAffectation = $this->apiEntiteAffectationController->index()->original;

        return view('employes.edit', compact('employe', 'entitesAffectation'));
    }

    public function show($id)
    {
        $employe = Employe::findOrFail($id);
        $demandes = Demande::where('Id_emp', $id)->get();

        return view('employes.show', compact('employe', 'demandes'));
    }

    public function update(UpdateEmployeRequest $request, $id)
    {
        $validatedData = $request->validated();
        try {
            $employe = Employe::findOrFail($id);
            $employe->update($validatedData);
            return redirect()->route('employes.index')->with('success', 'Employé mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la mise à jour de l\'employé. Veuillez réessayer.']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->apiEmployeController->destroy($id);
            return redirect()->route('employes.index')->with('success', 'Employé supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la suppression de l\'employé. Veuillez réessayer.']);
        }
    }
}
