<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Curso;
use App\Participant;
use App\Incription;
use App\UserAulas;
use App\Visit;
use App\Clase;
use App\Leccion;
use App\FilesLeccion;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon\Carbon;

class MenuAula extends Component
{

	public $cursos, $curso, $part, $part_id, $curso_id, $UserAula; //arrays 
	public $iniciar=true, $continue, $valid, $logeat,  $show_lecc, $regist, $verif, $aula;    //view
	public $decid, $insc;  
	public $cedula, $usuario, $password, $password_confirmation, $email; //array
	public $auth, $failAuth; //auhtenticacion
	public $clas, $lec, $cont;
	public $lecc, $clases_leccions; //view aula bienvenido
	public $resetAula,  $aulaUser, $Preg_regist;
	
	public $lecfiles;
	

	public function mount(){
		$cursos = Curso::all();
		$this->cursos = $cursos;
	}






    public function render()
    {
        return view('livewire.menu-aula');
        // return view('livewire.menu-aula', [
        // 	'aulas' =>Aula::orderBy('id','desc')->paginate(5) 
        // ]);
	}

	public function continue(){
		$this->iniciar = '';
		$this->part = '';
		$this->verif = '';
		$this->continue = true;
	}


	public function logeat($id){
		$curso = Curso::find($this->curso_id);	
		$this->verif = '';
		$this->cedula = '';	
		$this->regist = '';
		$this->logeat = true;
		$this->continue = '';
		$this->curso = $curso;		
		// $this->curso_id = $curso->id;
	}










	public function olvido(){
		
		$this->continue = '';
		$this->logeat = '';
		$this->verif =  true;
		
	}























	public function decid(){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;
		if ($this->decid){
			$this->regist = true; //pregunta si esta loguado  o no
		}else{
			$this->part =  '';
			$this->Preg_regist = '';
			$this->decid = '';
			$this->close();		}
	}













public function back(){
	$this->aula = true;
	// $this->edit='';
	$clas = Clase::where('curso_id',$this->curso_id)->first();
	$lec = Leccion::where('clase_id', $clas->id)->orderBy('id','asc')->get();
	$this->lec = $lec;
	$this->show_lecc='';
}


public function Preg_regist(){

}

public function regist($id){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;			
		$this->clear();
		$this->verif = true;		
		$this->logeat = '';	
}


public function verif($id){ 
	$this->part = '';
		$this->validate(['cedula' => 'required']); 
		$part = Participant::where('cedula',$this->cedula)->first();
		$this->part = $part;
		if ($part){
			$insc = Incription::where('part_id',$part->id)->where('curso_id',$this->curso_id)->where('conf', 1)->first();
			//$this->insc = $insc;
			if($insc){
				$this->part = $part;	
				$this->part_id = $part->id;
				$clas = Clase::where('curso_id',$this->curso_id)->first();
				if($clas){			
			  		$UserAula = UserAulas::where('part_id',$part->id)->where('clase_id',$clas->id)->first();
			  	
				  	if($UserAula){
				  		$this->continue = '';		  		
				  	 	$this->Preg_regist = '';
						$this->UserAula = true;  

				  	}else{ // llama a view registrarse
				  	 	$this->continue = '';
				  	 	$this->cedula = '';
				  	 	$this->Preg_regist = true;
				  	}			  		
				}else{
					$this->view();
					$this->continue = true;
        			return back()->with('alert','Este curso no ha dado inicio!, consulte con el administrador');	
				} 	
			}else{
				$this->close();

				$this->continue = true;

			  	return back()->with('alert', 'disculpe no esta inscrito en el curso, o debe esperar sea  "validada" su inscripcion');
			}
		// }else{
		// 	$this->regist = '';
		// 	$this->continue = '';
		// 	return back()->with('alert', 'Disculpe!, no esta registrado en nuestra base');
		// 	 		  //return back()->with('alert','Datos ya Registrados');
		}else{
			// $this->close();
			$this->clear();
			//return back()->with('alert','No existe en nuestra base de datos, puede 	que no se haya inscrito');
			request () -> session () -> flash ('alert','No existe en nuestra base de datos, puede 	que no se haya inscrito');	
			
		}

	}
	
	






















	public function saveregistro(){
		$this->validate([
        'usuario' => 'required|min:5|max:10|unique:user_aulas',
        'email' => 'required|email',
        'password' => 'required|min:5|max:10|confirmed',
        ]);
		//$part = Participant::where('id',$id)->first();
        $clas = Clase::where('curso_id',$this->curso_id)->first();
        if ($clas){
         $NewAula = UserAulas::create([
		 'part_id' => $this->part_id,
		 'curso_id' => $this->curso_id,
		 'clase_id' => $clas->id,		
		 'usuario' => $this->usuario,
		 'email' => $this->email,
		 'password' => bcrypt($this->password)	
		 ]);
        }else{
        	$this->view();
        	return back()->with('alert','Este curso no ha dado inicio!, consulte con administrador');
        }
  	
  //	   $NewAula = new UserAulas;
  //       $NewAula->part_id = $this->part_id;
  //       $NewAula->curso_id = $this->curso_id;
  //       $NewAula->curso_id = $this->curso_id;
  //       $NewAula->email = $this->email;
  //       $NewAula->usuario = $this->usuario;
  //       $NewAula->password = bcrypt($this->password);
  //	   $NewAula->save();
		if($NewAula){
			$visita = Visit::create([
				'usuario_id' => $NewAula->id,
				'visita' => now()->toDateTimeString()
			]);
			$curso = Curso::find($this->curso_id);
			$this->curso_id = $curso->id;
			$this->curso = $curso;			

			DB::table('usuario_clases')->insert(
    			['usuario_id' => $NewAula->id, 'clase_id' => $clas->id]
			);

			$lec = Leccion::where('clase_id', $clas->id)->where('visibility','=', 1)->get();
			if ($lec){
				$this->lec = $lec;
			}else{
				$this->lec = "Disculpe, en este momento 'no hay informacion para mostrar";
			}
			$this->view();
			//ACCEDIENDO ATRAVEZ DEL REGISTRO
			$this->auth = $NewAula;
			$this->aula = true;			
			
		}else{
			return back()->with('alert','ocurrio un error verifique!');
		}
	}







	public function resetAula($id){
		$this->clear();
		$this->curso = Curso::where('id',$this->curso_id)->first();
		$clas = Clase::where('curso_id',$this->curso_id)->first();
		$this->clas = $clas->id;
		$part = Participant::where('id',$id)->first();
		$this->part = $part;
		$aula = UserAulas::where('clase_id', $clas->id)->where('part_id',$part->id)->first();		
		$this->resetAula = true;
		$this->clearResetAula();
		$this->usuario = $aula->usuario;
		$this->email = $aula->email;
		
	}



	public function Savereset(){
		$this->validate([
	        'usuario' => 'required|min:5|max:10',
	        'password' => 'required|min:5|max:10|confirmed',
	        ]);
		$aula = UserAulas::where('clase_id', $this->clas)->where('part_id',$this->part->id)->first();	
		$this->aulaUser= $aula->usuario;
		if ($aula->usuario != $this->usuario){
			//$this->var='distintas';
		 		$this->validate([
		 			'usuario' => 'unique:user_aulas']);
		}
		// 	// $clas = Clase::where('curso_id',$this->curso_id)->first();
		// 	//$this->clas = $clas;
		// 	// $part = $this->part;
	       $aula->usuario = $this->usuario;
	        $aula->email = $this->email;
	        $aula->password = bcrypt($this->password);
		 	$aula->save();
		 	$this->resetAula = '';
		 	$this->logeat = true;
		// 	$this->usuario = '';
		// 	$this->password = '';
		// 	$this->email = '';
	

	}

	public function clearResetAula(){
		$this->verif = '';
		$this->regist = '';
		$this->continue = '';
		$this->UserAula = '';
		$this->iniciar= '';
		$this->password = '';
	}




	public function Acceder(){	
		$login = $this->usuario;

		//$usua= UserAulas::all();
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';		
		$auth = UserAulas::where('usuario',$this->usuario)->orWhere('email',$this->usuario)->where('password',$this->password)->first();
		//	$this->auth = $auth;
		if($auth){
			$visita = Visit::create([
				'usuario_id' => $auth->id,
				'visita' => now()->toDateTimeString()
			]);
			$this->auth = $auth;
			// select todas las secciones de este curso
			// consultar tabla usuario_clases para traer los usuario de dicha clases segun en curso seleccionado 		
			$clas = Clase::where('curso_id',$this->curso_id)->first();
			$lec = Leccion::where('clase_id', $clas->id)->orderBy('id','asc')->get();
			if ($lec){
				$this->lec = $lec;
			}else{
				$this->lec = "Disculpe, en este momento 'no hay informacion para mostrar";
			}
			//$cont = collect($lec)->pluck('leccion')->countBy();//CONTAR y AGRUPAR
			// $frutas= Leccion::select('seccion')->groupBy('seccion')->get();
			// 	$this->nro = $frutas; //

			// $countSec = Leccion::where('clase_id', $clas->id)->where('visibility','=', 1)->count();
			// $this->countSec = $countSec;


			//$aula = 'SELECT * FROM user_aulas';
	        // $aula = DB::select('SELECT * FROM seccions');
	        // $this->aula = $aula;

			// $this->iniciar = '';
			// $this->continue = '';
			// $this->regist = '';
			// $this->logeat = '';
			$this->view();
			$this->aula = true; //accediendo a traves del login
		}else{
			$this->failAuth='Fallo Autenticación, verifique';
		}
		
		//return [ $field => $login,	'password' => $this->password	];
		//$this->view();

	
		
	}






	public function aula($id){
		$this->aula = true; //ACCEDIENDO atraves del registro
		$clas = Clase::where('curso_id',$this->curso_id)->first();
		$curso = Curso::where('id',$this->curso_id)->first();
		$this->clas = $clas;
		$lec = Leccion::where('clase_id', $clas->id)->orderBy('id','asc')->get();
		$this->lec = $lec;
	}
		
		// $this->aulaExiste='';
		// $this->reg='';
		// $this->acceder='';
		// $this->ir='';
		
		//return back()->with('mensaje','Datos Registrados');
    




public $lecId;

	public function show_lecc($id){
		$this->aula = '';
		$this->show_lecc = true; 
		$this->show = $id;
		$clas = Clase::where('curso_id',$this->curso_id)->first();
		// $lecc = Leccion::where('leccion',$id)->get();
		$lecId = Leccion::where('clase_id', $clas->id)->where('id',$id)->first();
		//$lec = Leccion::where('leccion',$id)->get();
		$this->lecId = $lecId;

		$files = FilesLeccion::where('leccion_id',$id)->get();
		$this->lecfiles = $files;

		// $files = FilesLeccion::where('leccion_id',$id)->get();
		// $this->files = $lec->files;

		// // $user = UserAulas::where('id',$id)->first();

		//guarda registros en table, clase_leccions que ha visto el usuario reg en DB 'user_aulas'
		// DB::table('usuario_leccions')->insert([
		// 	'leccion_id' => $lecc->id, 
		// 	'usuario_id' => $user
		// 	]);
		}
















	public function close(){
		$this->iniciar = true;		
		$this->continue = '';
		$this->curso_id = '';
		$this->verif = '';
		$this->logeat = '';
		$this->resetAula = '';
		$this->aula = '';
		$this->regist = '';
		$this->show_lecc = '';
	}



	public function view(){
		$this->iniciar = true;	
		$this->continue = '';
		$this->regist = '';
		$this->logeat = '';
		$this->resetAula = '';
		$this->verif = '';
		$this->iniciar = '';
	}



		public function clear(){
		$this->cedula = '';
		$this->email = '';
		$this->usuario = '';
		$this->password = '';	
	}














}