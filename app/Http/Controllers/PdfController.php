<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
     

    public function ConfPDF(Request $request, $id) { 
		  $curso = App\Curso::find($id);
		  $parts = App\Participant::all();
      $inscs = $curso->inscs()->get();
	     
      $pdf = PDF::loadView('Admin.Inscrip.pdf-valid', compact('curso','parts','inscs'));
      return $pdf->download('listado-de-inscriptos.pdf');
    }







//x hacer
    public function ExpCurso(Request $request){
      return view('Admin.cursos.exp');
    }




}
