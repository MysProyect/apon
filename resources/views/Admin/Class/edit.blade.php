

<div class="container">

		<div class="text-center display-4 text-success">Actualizar
		<p class="display-7 text-danger ">formatos permitidos '.png, .jpg, .jpej, .mp3, .doc, .docx, .xml, .pdf, .mp4, .MPEG-4, .zip, .rar</p>
		</div>


	<div class="form-group form-2">
			<label class="text-right display-5 text-warning"><b>Leccion Nª <b>{{$leccion}}</label>&nbsp;&nbsp;&nbsp;
				<img src="{{asset('images/icons/update.gif')}}">
		
		    	<img src="{{asset('images/icons/close.png')}}" wire:click="salir"  class="img-close-2 close" align="right" style="cursor: pointer;"  title="cerrar">
			
		
		<div class="text-center text-primary display-5">Subidos...</div>



		<b class="display-7 text-primary">Multimedias (Imagenes/videos)</b>
		<div class="container-2">
		        @foreach($files_lec as $fl)
		        	<?php if(Str::endsWith($fl->file,['.png','.jpg','.jpeg','.gif'])){ ?>
		               <div class="item">
		                 <img src="{{ Storage::url("$fl->file") }}" alt="Archivo no encontrado" class="img-tam">
		                 <img src="{{asset('images/icons/trash.png')}}" width="25" height="30" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move;">
		                </div>
		              <?php }?>
		        @endforeach
		</div>

		<div class="container-2">
			@foreach($files_lec as $fl)
				<?php if(Str::endsWith($fl->file,['.mp4','.MPEG-4'])){	?>
						<div align="center">
							<video  id="video-curs-2" autoplay loop muted >
								<source src="{{ Storage::url($fl->file)}}" type="video/mp4" class="cursor" style="cursor: move;  width: 5%;">
							</video>
							<img src="{{asset('images/icons/trash.png')}}" width="25" height="30" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move;">
						</div>	
				<?php }?>
			@endforeach
		</div>

	
	<br>


@if($lec->urlExt)
	  <iframe width="560" height="315" src="<?php echo $lec->urlExt ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <img src="{{asset('images/icons/delet.png')}}" wire:click="delet_url({{$lec->id}})" title="Eliminar" style="cursor: move; width: 3%;">
@endif
	<div class="container-2">
			<img src="{{asset('images/icons/documnt.svg')}}" style="width: 10%; height: 2%;" title="document's">
			<?php $i=0; ?>
			@foreach($files_lec as $fl)	
				<?php $i= $i+1; ?>
				<?php if(Str::endsWith($fl->file,['docx','.doc','.pdf', '.zip','.rar'])){?>
					<div style="display: block;" align="center">
						<label>
							<span class="text-warning">{{$fl->name_file}}</span>	
							<img src="{{asset('images/icons/trash-2.png')}}" width="25" wire:click="delet({{$fl->id}})" title="Eliminar" style="cursor: move;">
						</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				<?php }?>
			@endforeach
		</div>
<br><br><br>
<div class="">

<div class="text-center text-success display-4">Actualizar |<small class="text-primary"> Agregar...</small></div><br>
	
		<div class="row">
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label form="downloads" class="text-primary display-6">Adjuntar archivo(s)</label>
					
							<input type="file" id="downloads" wire:model="files" class="form-control mb-2" multiple accept=".png, .jpg, .jpeg, .gif, .mp3, .pdf, .mp4, .MPEG-4, .zip, .rar, .doc, .docx">	<span wire:loading wire:target="files">Uploading...</span>
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

		<div class="form-group">
		   	<label class="text-primary display-6">¿Video Externo (youtube)?</label>
		   	<input type="url" wire:model="urlExt" class="form-control" placeholder="insertar url https://www.youtube.com/embed">
		</div>
		<div class="form-group">
			<label class="text-primary display-6">¿Tienes un sitio web para a compartir?</label>
			<input type="url" wire:model.lazy="url" class="form-control"  placeholder="https://www.google.com/">
		</div>
		
		<div align="center" class="form-group">
		    <label class="text-primary display-6">Nota</label>
		    <textarea class=" form-control" wire:model.lazy="texto" rows="3"  cols="200" placeholder="Escriba informacion que considere importante o de referencia para esta leccion"></textarea>
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
    	<button wire:click="upload_save" class="btn btn-success btn-block btn-lg">Subir y Guardar información</button>
    </div>

  </div> 

</div>
</div>











