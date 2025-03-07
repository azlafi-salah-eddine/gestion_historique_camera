<?php
namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Employe;
use App\Models\Demande;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCameras = Camera::count();
        $totalEmployees = Employe::count();
        $totalDemandes = Demande::count();

        return view('index', compact('totalCameras', 'totalEmployees', 'totalDemandes'));
    }
}

