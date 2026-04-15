<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Demande;
use App\Models\Employe;
use App\Models\Concerne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Http\Controllers\Api\UserrController as ApiUserrController;
use App\Http\Controllers\Api\CameraController as ApiCameraController;
use App\Http\Controllers\Api\DemandeController as ApiDemandeController;
use App\Http\Controllers\Api\EmployeController as ApiEmployeController;

class DemandeController extends Controller
{
    protected $apiDemandeController;
    protected $apiCameraController;
    protected $apiEmployeController;
    protected $apiUserrController;

    public function __construct(ApiDemandeController $apiDemandeController, ApiCameraController $apiCameraController, ApiEmployeController $apiEmployeController, ApiUserrController $apiUserrController)
    {
        $this->apiDemandeController = $apiDemandeController;
        $this->apiCameraController = $apiCameraController;
        $this->apiEmployeController = $apiEmployeController;
        $this->apiUserrController = $apiUserrController;
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $demandes = Demande::latest('created_at')->get();
        } else {
            $demandes = Demande::where('id_u', $user->Id_u)
                ->latest('created_at')
                ->get();
        }

        return view('demandes.index', ['demandes' => $demandes]);
    }

    public function create()
    {
        $cameras = $this->apiCameraController->index()->original;
        $employes = $this->apiEmployeController->index()->original;
        $userrs = $this->apiUserrController->index()->original;
        return view('demandes.create', compact('cameras', 'employes', 'userrs'));
    }

    public function store(StoreDemandeRequest $request)
    {
        $validatedData = $request->validated();

        // Force ownership to authenticated user to prevent spoofing via hidden inputs.
        $validatedData['id_u'] = Auth::user()->Id_u;

        try {
            $demande = Demande::create($validatedData);

            $cameras = $request['Id_c'];
            $debutEnregistrements = $request['debut_enregistrement'];
            $finEnregistrements = $request['fin_enregistrement'];

            foreach ($cameras as $index => $cameraId) {
                Concerne::create([
                    'Id_de' => $demande->Id_de,
                    'Id_c' => $cameraId,
                    'Debut_sauv' => $debutEnregistrements[$index],
                    'Fin_sauv' => $finEnregistrements[$index],
                ]);
            }

            return redirect()->route('demandes.index')->with('success', 'Demande ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Récupérer la demande par son ID avec ses relations chargées (concernes, employe, etc.)
        $demande = Demande::with(['concernes.camera', 'employe'])->findOrFail($id);

        $this->authorizeDemandeAccess($demande);

        // Retourner la vue avec les données de la demande
        return view('demandes.show', compact('demande'));
    }

    public function edit($id)
    {
        try {
            $demande = Demande::findOrFail($id);
            $this->authorizeDemandeAccess($demande);

            $concernes = Concerne::where('Id_de', $id)->get();
            $employes = Employe::all();
            $cameras = Camera::all();

            return view('demandes.edit', compact('demande', 'concernes', 'employes', 'cameras'));

        } catch (\Exception $e) {
            return redirect()->route('demandes.index')->withErrors(['error' => 'Demande non trouvée.']);
        }
    }


    public function update(UpdateDemandeRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            // Récupérer la demande à mettre à jour
            $demande = Demande::findOrFail($id);
            $this->authorizeDemandeAccess($demande);

            // Keep ownership immutable from form submissions.
            $validatedData['id_u'] = $demande->id_u;

            // Mettre à jour les champs de la demande
            $demande->update($validatedData);

            // Supprimer toutes les relations existantes avec les caméras pour cette demande
            Concerne::where('Id_de', $demande->Id_de)->delete();

            // Réinsérer les nouvelles relations avec les caméras mises à jour
            $cameras = $request['Id_c'];
            $debutEnregistrements = $request['debut_enregistrement'];
            $finEnregistrements = $request['fin_enregistrement'];

            foreach ($cameras as $index => $cameraId) {
                Concerne::create([
                    'Id_de' => $demande->Id_de,
                    'Id_c' => $cameraId,
                    'Debut_sauv' => $debutEnregistrements[$index],
                    'Fin_sauv' => $finEnregistrements[$index],
                ]);
            }

            return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            // Trouver la demande à supprimer
            $demande = Demande::findOrFail($id);
            $this->authorizeDemandeAccess($demande);

            // Supprimer toutes les relations concernant cette demande
            Concerne::where('Id_de', $demande->Id_de)->delete();

            // Supprimer la demande elle-même
            $demande->delete();

            return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('demandes.index')->withErrors(['error' => 'Erreur lors de la suppression de la demande : ' . $e->getMessage()]);
        }
    }

    private function authorizeDemandeAccess(Demande $demande): void
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if ((int) $demande->id_u !== (int) $user->Id_u) {
            abort(403, 'Acces non autorise a cette demande.');
        }
    }


}
