<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Camera;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index()
    {
        $cameras = Camera::all();
        return response()->json($cameras);
    }

    public function store(StoreCameraRequest $request)
    {
        $camera = Camera::create($request->validated());
        return response()->json($camera, 201);
    }

    public function show(Camera $camera)
    {
        return response()->json($camera);
    }

    public function update(UpdateCameraRequest $request, Camera $camera)
    {
        $camera->update($request->validated());
        return response()->json($camera);
    }

    public function destroy(Camera $camera)
    {
        $camera->delete();
        return response()->json(null, 204);
    }
}
