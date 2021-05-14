<div class="form-group">
	<div class="text-center display-4 text-success">Actualizar</div>
	<div class="form-group form-2">
		<div class="text-center display-6 text-primary">{{$title}}</div><br>	
			<label class="text-right display-5 text-warning"><b>Leccion Nª <b>{{$leccion}}</label>
			  <div align="right" >	
		    <img src="{{asset('images/icons/close.png')}}" wire:click="salir"  class="img-close-2 close"  style="cursor: pointer;"  title="cerrar">
		</div>
		<div class="text-center display-5" style="margin-left: 5%; margin-right: 5%; margin-top: 2%;">Actualizar recursos subidos
			<p class="display-7 text-danger">formatos permitidos '.png, .jpg, .jpej, .mp3, .doc, .docx, .xml, .pdf, .mp4, .MPEG-4, .zip, .rar
			</p>
		</div>
		<label class="text-center text-success display-6">Imagesnes/videos/documentos/zip...</label><br>
		<div class="" style="display:flex;">
			<?php $i=0; ?>			
			@foreach($files_lec as $fl)
				<?php if(Str::endsWith($fl->file,['.png','.jpg','.jpeg'])){ ?>
					<div align="center"  >
						<img src="{{ Storage::url("$fl->file") }}" alt="imagen no disponible" class="img-file" style="cursor: pointer" title="{{$fl->name_file}}" /><br>
						<img src="{{asset('images/icons/delet.png')}}" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move; ">		
					</div>		
				<?php }?>				
			@endforeach
		</div>
	<br>
		<div>
			@foreach($files_lec as $fl)
				<?php if(Str::endsWith($fl->file,['.mp4','.MPEG-4'])){	?>
						<div align="center">
							<video  id="video-curs-2" autoplay loop muted >
								<source src="{{ Storage::url($fl->file)}}" type="video/mp4" style="cursor: move;  width: 5%;">
							</video>
							<img src="{{asset('images/icons/delet.png')}}" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move; width: 3%;">	
						</div>	
				<?php }?>
			@endforeach
		</div>
	<br>
<!-- {{$file_db}} -->
		<div style="display: flex;">
			<?php $i=0; ?>
			@foreach($files_lec as $fl)	
				<?php $i= $i+1; ?>
				<?php if(Str::endsWith($fl->file,['docx','.doc'])){?>
					<div style="display: block;" align="center">
						<label><b>Doc</b>
							<span class="text-info">{{$fl->name_file}}</span>	
							<img src="{{asset('images/icons/delet.png')}}" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move; width: 3%;">	
						</label>&nbsp;&nbsp;
					</div>
				<?php }?>
			@endforeach
		</div>
	<br>














		<div class="row">
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label form="downloads">Adjuntar archivo(s)</label>
					
							<input type="file" id="downloads" wire:model="files" class="form-control mb-2" multiple accept=".png, .jpg, .jpej, .mp3, .pdf, .mp4, .MPEG-4, .zip, .rar, .doc, .docx">	<span wire:loading wire:target="files">Uploading...</span>
							<!-- 	@if (session('error'))
										<span class="alert alert-success">             
											{{ session('error') }}
										</span>
									@endif -->
								

							@error('files')
								<label class="alert-danger">Apon no tiene soporte para el/uno de los archivo(s) seleccionado ¡verif extension o tamaño!</label>
							@enderror
					</div>
				<!-- 	<div class="form-group">
						<a href="#" class="btn btn-primary" wire:click.prevent="AddField"><b>Add +</b></a>
					</div> -->
				</div>
			</div>
			@if($url)
				<label class="text-primary display-7 nav-link">Sitio web <a href="{{$url}}" target="_back">{{$url}}</a></label>
			<div class="form-group">
		    	<label class="text-primary display-6">Cambiar?</label>
		    	<input type="url" wire:model.lazy="url" class="form-control"  placeholder="https://www.google.com/">
			</div>
			
		
			@else
			<div class="form-group">
		    	<label class="text-primary display-6">¿Tienes un sitio web para a compartir?</label>
		    	<input type="url" wire:model.lazy="url" class="form-control"  placeholder="https://www.google.com/">
			</div>
			@endif
				<div align="center" class="form-group">
		    	<label>Nota
		    		<textarea class=" form-control" wire:model.lazy="texto" rows="3"  cols="200" placeholder="Escriba informacion que considere importante o de referencia para esta leccion"></textarea>
		    	</label>

			</div>

			<div class="form-group">
				<label class="display-6 text-primary">Visible
					<input type="radio" id="public" wire:model="visibility" value="1"></label>
				<label class="display-6 text-danger"> No aun
					<input type="radio" id="public" wire:model="visibility" value="0"> </label>
				@error('visibility')
					<label class="alert-danger">¿Inique si estara visible o no?</label>
				@enderror
			</div>

	</div>
			<input type="text" wire:model="edit" value="1" class="d-lg-none">
    <div align="center">
    	<button wire:click="upload_save" class="btn btn-success btn-block">Subir y Guardar información</button>
    </div>

   

</div>
</div>
