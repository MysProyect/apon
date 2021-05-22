<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
     

    public function ConfPDF(Request $request, $id) {
   //  	$Marc = Count($request->conf);
   //  	for($i=0; $i<$Marc; $i++){
   //  		$ins = App\Incription::find($request->conf[$i]);
   //      	$ins->update([
			// 	'conf' => 1
			// ]); 
   //  	}

      //echo $id;
		$curso = App\Curso::find($id);
		$All_inscs = App\Incription::where('curso_id', '=', $id)->get();
		$parts = App\Participant::all();
	// echo   $curso, $inscs, $parts;
      // return view('Admin.Inscrip.pdf-valid', compact('curso','inscs','parts'));
	 	$pdf = PDF::loadView('Admin.Inscrip.pdf-valid', compact('curso','All_inscs','parts'));
  		return $pdf->download('listado-de-inscriptos.pdf');
    }

























    public function ExpPart() {
      $parts=App\Participant::all();
      // $pdf = PDF::loadView('Admin.participants.exp',compact('parts'));
      // return $pdf->download('participartes.pdf');
      return view('Admin.participants.exp',compact('parts'));
    }
    


    public function ExpResp() {
      $resps=App\Responsabl::all();
      // $pdf = PDF::loadView('Admin.responsabls.exp',compact('resps'));
      // return $pdf->download('Lista Respons | Facilitadores.pdf');
      return view('Admin.responsabls.exp',compact('resps'));
    }

    public function ExpCurso(Request $request){
      return view('Admin.cursos.exp');
    }




}
