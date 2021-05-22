<div  class="form-gruop" align="center" style="margin-top: 2%;">





	<div  align="right">
		<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>

	<div align="left" class="text-success display-6">
		Leccion: {{$show}}	
	</div>

		<!-- 	<div  class="">
				<label>array leccion y files  {{ $lecfiles }}</label>
			</div> -->

		<b class="display-7 text-primary">Multimedias (Imagenes/videos)</b>
		<div class="container-2">
		        @foreach($lecfiles as $fl)
		        	<?php if(Str::endsWith($fl->file,['.png','.jpg','.jpeg','.gif','.bmp', '.gim','svg'])){ ?>
		               <div class="item">
		                 <img src="{{ Storage::url("$fl->file") }}" alt="Archivo no encontrado" class="img-tam">
		                 <a href='/storage/{{$fl->file}}' class="display-8 text-center" ><br>
		                 	<img src="{{asset('images/icons/show-2.png')}}" title="ver/descargar" width="20" height="20" height="40"></a>
		                </div>
		              <?php }?>
		        @endforeach
		</div>

		<div class="container-2">
			@foreach($lecfiles as $fl)
				<?php if(Str::endsWith($fl->file,['.mp4','.MPEG-4', '.mwv', '.avi'])){	?>
						<div align="center">
							<video  id="video-curs-2" autoplay loop muted >
								<source src="{{ Storage::url($fl->file)}}" type="video/mp4" class="cursor" style="cursor: move;  width: 5%;">
							</video>
						</div>	
				<?php }?>
			@endforeach
		</div>

	
	<br>


		@if($lec->urlExt)
			  <iframe width="560" height="315" src="<?php echo $lec->urlExt ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
		@endif
		<div class="container-2">
				<img src="{{asset('images/icons/documnt.svg')}}" style="width: 10%; height: 2%;" title="document's">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php $i=0; ?>
				@foreach($lecfiles as $fl)	
					<?php $i= $i+1; ?>
					<?php if(Str::endsWith($fl->file,['docx','.doc','.pdf', '.zip','.rar'])){?>
						<div style="display: block;" align="center">
								<a target="_blank" href="{{ Storage::url($fl->file)}}">{{$fl->name_file}}</a>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php }?>
				@endforeach
			</div>


@if(!($lecfiles->count() && $lec))
	<label class="text-center display-6 text-danger">Esta Leccion esta Vacia </label>
@endif
<br><br>
		<div align="center" class="form-gruop">
			<div  class="">
				<label>{{$lec->texto}}</label>
			</div>
			@if ($lec->url)
				<b>Visite:</b> <a target="_blank" href="{{$lecc->url}}">{{$lecc->url}}</a>
			@endif
		</div>
</div>








