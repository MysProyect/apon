<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Atr;
use App\Http\Controllers\Livewire\Storage;
//use App\Clase;
use App\Curso;
use App\Leccion;
use App\FilesLeccion;
use Auth;
use Image;

//se fuciono lecciones directamente telacionado con los cursos, tabla clases esta de mas, la valiable $class y $clases, se utilizaron para mostras relacion de curso con leccion, falta ManuAulas para ignorar totalmente la table clase


class ClassAdminComp extends Component
{
	use WithFileUploads;



	public $cursos, $fields, $errorfield, $exists, $class_select = true, $img, $curso, $mensaj, $edit, $create,   $curso_id, $lecN, $leccion ;
	public $title, $urlExt;
	public $files=[], $url, $texto, $files_lec;
	public $lec, $NroCS;
	public $list, $exist, $image, $busc, $upload, $delet, $visibility;
	public $class, $clases, $name, $file, $lecs, $clasSec, $show_lecns, $show, $lecns, $clase_name, $atras;


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
		if(empty($this->fields)){
			$this->errorfield = 'error actualice la pagina';
		}else{
			$this->fields = $this->fields + 1;		
		}
	}


	public function change_curso(){
		$this->lecN = true;
		$this->leccions = '';
		$this->create = '';
		$this->edit = '';
		if($this->curso_id){			
			$this->leccions = '';
			$curso = Curso::find($this->curso_id);
			$this->img = $curso->img; //solo img del array
			$this->curso = $this->curso;
		}else{
			$this->default();
		}

	}



	public function verif(){
		//$this->validate([ 'curso_id' => 'required', 'leccion' => 'required' ]);
		$class  = Leccion::where('curso_id',$this->curso_id)->where('leccion',$this->leccion)->first();
		if($class){
				$this->create = '';
			 	$this->edit = '';
			 	$this->mensaj = true;
		}else{
			// $curso = Curso::find($this->curso_id);
			//  $this->title = $curso->title; //solo titulo del array
			 	$this->leccion = $this->leccion;
			 	$this->mensaj = '';
			 	$this->edit = '';
				$this->create = true;
		}
	
	}








	public function edit(){
		$this->edit = true;
		$this->mensaj = '';	
		$curso = Curso::find($this->curso_id);
		$this->curso = $curso;
		$lec = Leccion::where('curso_id','=',$this->curso_id)->where('leccion','=',$this->leccion)->first();
		$this->lec = $lec;
		$files_lec = FilesLeccion::where('leccion_id','=',$lec->id)->get();
		$this->files_lec = $files_lec;	

		$this->texto= $lec->texto;
		$this->url = $lec->url;  	
		$this->urlExt = $lec->urlExt;
		$this->lec_id = $lec->id;
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
		$clases = Curso::withCount(['leccions'])->get();
		$this->clases = $clases;
		$this->default();
    	$this->list = true;
	}





	public function show_lec($id){
		$this->show_lecns = true;
		$clases = Curso::withCount(['leccions'])->get();
		$this->clases = $clases;
		$clase =  Curso::where('id',$id)->first();
		$this->curso =  $clase;
		$this->lecns =  $clase->leccions;		
	}


	public function show($id){
		$this->list= '';
		$this->default();
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
		$lec = Leccion::where('curso_id','=',$this->curso_id)->where('leccion','=',$this->leccion)->first();	
		 	if(empty($lec)){ 
				$lec = Leccion::create([
				'curso_id' => $this->curso_id,
				'leccion' => $this->leccion,
				'texto' => $this->texto,
				'urlExt' => $this->urlExt,
				'url' => $this->url,
				'visibility' => $this->visibility,
				'user_created' => Auth::user()->id
				 ]);
				 $this->lec = $lec;		
			}else{ //sino esta vacia actualiza leccion
				$lec->url = $this->url;
				$lec->urlExt = $this->urlExt;
				$lec->texto = $this->texto;
				$lec->visibility = $this->visibility;			
				$lec->user_updated = Auth::user()->id;
				$save = $lec->save();
		 	}
			if($this->files){
				// $this->validate(['files.*'=>  'max:1024']);
				 $files = count($this->files);
				 $this->nfiles = $files;
				if($files > 0){		
					foreach ($this->files as $file) {
						$imgName = $file->getClientOriginalName();
						
						// $image_resize = Image::make($file->getRealPath());
	     //   			 	$image_resize->resize(300,300);
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
		   	return back()->with('error','Error de al intentar guarda el registro, verif');
		}
	}














	public function delet_url($id){
		$clear = Leccion::find($id);
		$clear->urlExt = '';
		$clear->save();
		$this->edit();
	}



	public function delet(FilesLeccion $id){
		// Leccion::delete(file_path);
		//$file_db = FilesLeccion::find($id);
		$delet = $id->delete();
		$this->edit();
		//Storage::delete($file_db->file);
		//return store::disk('public')->delete('URL'.$file_db->file);
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
		$this->urlExt='';
		$this->show_lecns= '';
	}




		
	public function back(){
		$this->default();
		$this->clear();
		
	}



	public function close(){
		$this->curs = '';
		$this->curso_id = '';
		$this->img = '';
		$this->create = '';

	}
	public function salir(){
		$this->default();
		$this->close();
		$this->clear();	
	}






}