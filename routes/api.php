<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserrController as ApiUserrController;
use App\Http\Controllers\Api\DemandeController as ApiDemandeController;
use App\Http\Controllers\Api\CameraController as ApiCameraController;
use App\Http\Controllers\Api\EmployeController as ApiEmployeController;
use App\Http\Controllers\Api\EntiteAffectationController as ApiEntiteAffectationController;

Route::apiResource('userrs', ApiUserrController::class);
Route::apiResource('demandes', ApiDemandeController::class);
Route::apiResource('cameras', ApiCameraController::class);
Route::apiResource('employes', ApiEmployeController::class);
Route::apiResource('entite-affectations', ApiEntiteAffectationController::class);
