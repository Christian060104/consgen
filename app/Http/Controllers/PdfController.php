<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function citas()
    {
        $citas = Cita::all();

        $pdf = Pdf::loadView('pdf.citas', compact('citas'));

        return $pdf->download('citas.pdf');
    }
}
