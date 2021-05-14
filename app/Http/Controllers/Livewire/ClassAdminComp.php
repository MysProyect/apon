<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Clase;
use App\Curso;
use App\Leccion;
use App\FilesLeccion;
use Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Atr;
use App\Http\Controllers\Livewire\Storage;
//use App\Http\Controllers\Livewire\store;

class ClassAdminComp extends Component
{
	use WithFileUploads;

	public $class_select = true, $img, $edit, $create, $cursos, $curso, $curso_id, $title, $leccion;
	public $files=[], $url, $texto, $files_lec;
	public $fields, $save, $lec, $NroCS, $lecN;
	public $mensaj, $list, $exist, $image, $busc, $upload, $delet, $visibility;
	public $class, $clases, $name, $file, $lecs, $clasSec, $show_lecns, $show, $lecns, $clase_name, $atras;

	public $file_db;



    public function render()
    {
        return view('livewire.class-admin-comp');
    }

    public function mount(){
    	$cursos = Curso::all();
    	$this->cursos = $cursos;
    	$this->fields = 1;    	
    }


public function AddField(){
	$this->fields = $this->fields + 1;
//	$this->validate([  'files'=>  'string'  ]);
}

	public function change_curso(){
		$this->create = '';
		$this->lecN = true;
		if($this->curso_id){
			$curso = Curso::find($this->curso_id);
			$this->img = $curso->img;
		}else{
			$this->default();
		}

	}

	public function verif(){
		//$this->validate([ 'curso_id' => 'required', 'leccion' => 'required' ]);
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		if($class){
			$busc = Leccion::where('clase_id',$class->id)->where('leccion',$this->leccion)->first();
			if($busc){
				$this->create = '';
			 	$this->edit = '';
			 	$this->mensaj = true;
			}else{
				$curso = Curso::find($this->curso_id);
			 	$this->title = $curso->title;
			 	$this->leccion = $this->leccion;
				$this->create = true;
			}

		}else{
			$this->create = true;
		}	
	}




	public function edit(){
		$this->edit = true;
		$this->mensaj = '';
		$this->class_select ='';
		$curso = Curso::find($this->curso_id);
		$this->curso = $curso;
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		$lec = Leccion::where('clase_id','=',$class->id)->where('leccion','=',$this->leccion)->first();
		$this->lec = $lec;
		$files_lec = FilesLeccion::where('leccion_id','=',$lec->id)->get();
		$this->files_lec = $files_lec;	

		$this->texto= $lec->texto;
		$this->url = $lec->url;  	
	}




       	// $Extimg = Str::endsWith($file,'.png');
        	//seccMP4 = Str::endsWith($upload,['.mp4','MP4','mpeg-4','.MPEG-4','gif','GIF','ico']);
        	// $Extdoc = Str::endsWith($upload,['.doc','.docx','pptx','.pdf','.txt','.xml','.opt','.zip','rar']);
			// if($Extimg){
			// 	$save->image = $upload;
			// 	$save->save();
			// }

			// if($Extvideo){
			// 	$save->video = $upload;
			// 	$save->save();
			// }
			// if($Extdoc){
			// 	$save->doc = $upload;
			// 	$save->save();
			// }




	public function list(){
	

		$clases = Clase::withCount(['curso','leccions'])->get();
		//$clases = Clase::all();
    	$this->clases = $clases;
    	$clasSec = Leccion::all();
    	$this->clasSec = $clasSec;
    	$this->list = true;
    
    	//$this->class_select = '';
		$this->edit = '';
		$this->create = '';
	}



	public function show_lec($id){
		$this->show_lecns = true;
		$clases = Clase::withCount(['curso','leccions'])->get();
		$this->clases = $clases;
		$clase =  Clase::where('id',$id)->first();
		$this->curso =  $clase->curso;
		$this->lecns =  $clase->leccions;		
	}


	public function show($id){
		$this->list= '';
		$this->show_lecns= '';
		$this->class_select = '';
		$this->show = true;
		//$this->edit();
	}

	public function dejar(){
		$this->create='';
		$this->mensaj = '';
		$this->show_edit = '';
	}








public function upload_save(Request $request){
	$this->validate(['files'=>  'max:4096',  'visibility'=>'required'  ]);
	//validar nombres de files correctos
	$class = Clase::where('curso_id','=',$this->curso_id)->first();
		if(empty($class)){ //si clase no existe la crea
	   		$class = Clase::create([
			'curso_id' => $this->curso_id,
			'user_created' => Auth::user()->id,
			 ]);
		}
	$lec = Leccion::where('clase_id','=',$class->id)->where('leccion','=',$this->leccion)->first();
		if(empty($lec)){ 
			$lec = Leccion::create([
			'clase_id' => $class->id,
			'leccion' => $this->leccion,
			'texto' => $this->texto,
			'url' => $this->url,
			'visibility' => $this->visibility,
			'user_created' => Auth::user()->id
			 ]);		
		}else{
			$lec->url = $this->url;
			$lec->texto = $this->texto;
			$lec->visibility = $this->visibility;
			$lec->user_updated = Auth::user()->id;
			$save = $lec->save();
		}


		if($this->files){
			$this->validate(['files.*'=>  'max:1024']);

			$files = count($this->files);
			if($files > 0){		
				foreach ($this->files as $file) {
					$imgName = $file->getClientOriginalName();
					// $this->name = $imgName;
					$upload = $file->store('Files');
					$save = FilesLeccion::create([
						'leccion_id' => $lec->id,
						'file' => $upload,
						'name_file' => $imgName
						]);
				}
			}
		}
	if($save){
		$this->default();
		return back()->with('mensaje','Guardados/Actualizados correctamente');
	}else{
	   	$this->default();
	   	return back()->with('error','datos no actualizados');
	}



}







public function delet(FilesLeccion $id){
	// Leccion::delete(file_path);
	//$file_db = FilesLeccion::find($id);
	$delet = $id->delete();
	$this->edit();



	//Storage::delete($file_db->file);
	//return store::disk('public')->delete('URL'.$file_db->file);
}

public function back(){
	$this->default();
	$this->clear();
	
}

public function salir(){
	$this->default();
	$this->close();
	$this->clear();	
}

public function close(){
	$this->curs = '';
	$this->curso_id = '';
	$this->img = '';
	$this->create = '';

}
public function clear(){
	$this->url='';
	$this->texto='';
}


public function default(){
	$this->create = '';
	$this->mensaj = '';
	$this->edit = '';
	$this->curso_id ='';
	$this->leccion = '';
	$this->texto = '';
	$this->files = '';
	$this->url = '';
	$this->visibility ='';
	$this->class_select = true;
	$this->curso = '';
	$this->list='';
	$this->fields = '';
	$this->img='';
	$this->lecN='';
}








}