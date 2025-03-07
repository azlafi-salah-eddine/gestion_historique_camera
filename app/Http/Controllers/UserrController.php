<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\UserrController as ApiUserrController;
use App\Http\Requests\StoreUserrRequest;
use App\Http\Requests\UpdateUserrRequest;
use App\Models\Userr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserrController extends Controller
{
    protected $apiUserrController;

    public function __construct(ApiUserrController $apiUserrController)
    {
        $this->apiUserrController = $apiUserrController;
    }

    public function index()
    {
        $users = $this->apiUserrController->index()->original;
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserrRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Si aucun rôle n'est fourni, utiliser "user" par défaut
        $validatedData['role'] = $validatedData['role'] ?? 'user';

        try {
            Userr::create($validatedData);
            return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $user = Userr::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserrRequest $request, $id)
    {
        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Si aucun rôle n'est fourni, utiliser "user" par défaut
        $validatedData['role'] = $validatedData['role'] ?? 'user';

        try {
            $user = Userr::findOrFail($id);
            $user->update($validatedData);
            return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la mise à jour de l\'utilisateur. Veuillez réessayer.']);
        }
    }

    public function show($id)
    {
        $user = Userr::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function destroy($id)
    {
        try {
            $user = Userr::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la suppression de l\'utilisateur. Veuillez réessayer.']);
        }
    }
}
