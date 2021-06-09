<div class="container">

	<div class="text-center display-4 text-success">Actualizar</div>
	<div class="form-group form-2">
		<label class="text-right display-5 text-warning"><b>Leccion Nª <b>{{$leccion}}</label>&nbsp;&nbsp;&nbsp;
		<img src="{{asset('images/icons/update.gif')}}">		
		<img src="{{asset('images/icons/close.png')}}" wire:click="salir"  class="img-close-2 close" align="right" style="cursor: pointer;"  title="cerrar">				
		
		<div class="text-center text-primary display-5">Subidos...</div>
		<b class="display-7 text-primary">Multimedia (Imagenes/videos)</b>
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
		@include('Admin.Class.form')

	</div>
</div>





