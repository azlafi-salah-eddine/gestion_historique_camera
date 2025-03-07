<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use App\Http\Controllers\Api\CameraController as ApiCameraController;

class CameraController extends Controller
{
    protected $apiCameraController;
    public function __construct(ApiCameraController $apiCameraController)
    {
        $this->apiCameraController = $apiCameraController;
    }
    public function index()
    {
        $cameras = $this->apiCameraController->index()->original;
        return view('cameras.index', ['cameras' => $cameras]);
    }

    public function create()
    {
        return view('cameras.create');
    }

    public function store(StoreCameraRequest $request)
    {
        $validatedData = $request->validated();
        try {
            Camera::create($validatedData);
            return redirect()->route('cameras.index')->with('success', 'Caméra ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'ajout de la caméra. Veuillez réessayer.']);
        }
    }

    public function edit($id)
    {
        $camera = Camera::findOrFail($id);
        return view('cameras.edit', compact('camera'));
    }


    public function update(UpdateCameraRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $camera = Camera::findOrFail($id);
            $camera->update($validatedData);
            return redirect()->route('cameras.index')->with('success', 'Caméra mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la mise à jour de la caméra. Veuillez réessayer.']);
        }
    }

    public function destroy($id)
    {
        try {
            $camera = Camera::findOrFail($id);
            $camera->delete();
            return redirect()->route('cameras.index')->with('success', 'Caméra supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la suppression de la caméra. Veuillez réessayer.']);
        }
    }
}
