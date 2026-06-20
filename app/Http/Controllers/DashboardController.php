<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCitas = Cita::count();
        $citasHoy = Cita::whereDate('fecha', now())->count();
        $totalUsuarios = User::count();
        $datos = Cita::selectRaw('fecha, count(*) as total')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
        $fechas = $datos->pluck('fecha');
        $totales = $datos->pluck('total');

        return view('dashboard', compact(
            'totalCitas',
            'citasHoy',
            'totalUsuarios',
            'fechas',
            'totales'
        ));
    }
}
