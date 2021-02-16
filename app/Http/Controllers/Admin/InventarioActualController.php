<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarioActualController extends Controller
{

   public function index(){
     return view('admin.ReporteInventarioActual.index');
   }

   public function ReporteInventarioActualPDF(){

        // return $reporteInventarioActual = \PDF::loadView('admin.ReporteInventarioActual.RepInventarioActual');

        
        // return $reporteInventarioActual->download('admin.ReporteInventarioActual.RepInventarioActual.pdf');
    return view('admin.ReporteInventarioActual.RepInventarioActual');
   }
}
