<?php
namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Employe;
use App\Models\Demande;
use App\Models\Concerne;
use App\Models\Userr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalCameras = Camera::count();
        $totalEmployees = Employe::count();

        if ($user->role === 'admin') {
            $totalDemandes = Demande::count();
            $totalUsers = Userr::where('role', 'user')->count();
            $totalAdmins = Userr::where('role', 'admin')->count();

            $recentDemandes = Demande::with(['employe', 'userr'])
                ->latest('created_at')
                ->take(8)
                ->get();

            $chartMap = Demande::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
                ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total', 'month');

            $months = collect(range(5, 0))->map(function ($offset) {
                return now()->subMonths($offset)->format('Y-m');
            });

            $chartLabels = $months->map(function ($month) {
                return \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y');
            })->values();

            $chartData = $months->map(function ($month) use ($chartMap) {
                return (int) ($chartMap[$month] ?? 0);
            })->values();

            return view('index', compact(
                'user',
                'totalCameras',
                'totalEmployees',
                'totalDemandes',
                'totalUsers',
                'totalAdmins',
                'recentDemandes',
                'chartLabels',
                'chartData'
            ));
        }

        $myDemandes = Demande::where('id_u', $user->Id_u);
        $myTotalDemandes = (clone $myDemandes)->count();
        $mySavedDemandes = (clone $myDemandes)->where('Sauvegarder', 1)->count();
        $myDemandesThisMonth = (clone $myDemandes)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $myCamerasCount = Concerne::whereIn('Id_de', function ($query) use ($user) {
            $query->select('Id_de')
                ->from('demandes')
                ->where('id_u', $user->Id_u);
        })->distinct('Id_c')->count('Id_c');

        $myRecentDemandes = Demande::with('employe')
            ->where('id_u', $user->Id_u)
            ->latest('created_at')
            ->take(8)
            ->get();

        return view('index', compact(
            'user',
            'totalCameras',
            'totalEmployees',
            'myTotalDemandes',
            'mySavedDemandes',
            'myDemandesThisMonth',
            'myCamerasCount',
            'myRecentDemandes'
        ));
    }
}

