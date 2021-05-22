<div  class="form-gruop" align="center" style="margin-top: 2%;">





	<div  align="right">
		<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>




	<div align="left" class="text-success display-6">
		Leccion: {{$show}}	
	</div>
<br><br>
		<div align="center" class="form-gruop">
		<!-- 	<div  class="">
				<label>array leccion y files  {{ $lecfiles }}</label>
			</div> -->



		@foreach($lecfiles as $lf)
			<?php if(Str::endsWith($lf->file,['.png','.jpg','.jpeg'. '.bmp', '.gim'])){	?>
				<label style="margin-right: 5%; float: center;">
					<img src="{{ Storage::url("$lf->file") }}" alt="imagen no disponible" class="display-7 " style="cursor: pointer" title="{{$lf->name_file}}" width="200"/><br>
					<a href='/storage/{{$lf->file}}' class="display-8 text-center" ><img src="{{asset('images/icons/show-2.png')}}" title="ver/descargar" width="20" height="10"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</label>					
			<?php }elseif(Str::endsWith($lf->file,['.mp4','.MPEG-4', '.mwv', '.avi'])){	?>
				<br><div align="center">
						<video  id="video-curs" controls loop>
							<source src="{{ Storage::url($lf->file)}}" type="video/mp4">
						</video>
					</div>	
			<?php }elseif(Str::endsWith($lf->file,'.pdf')){	?>				
					<a target="_blank" href="{{ Storage::url($lf->file)}}">{{$lf->name_file}}
						<img src="{{ asset('images/icons/PDF.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>&nbsp;&nbsp;
			<?php }elseif(Str::endsWith($lf->file,['docx','.doc','.text',])){?>
				<div>
					<a target="_blank" href="{{ Storage::url($lf->file)}}">{{$lf->name_file}}
						<img src="{{ asset('images/icons/DOC.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>
				</div>	&nbsp;&nbsp;
			<?php }elseif(Str::endsWith($lf->file,['.zip', '.tar'])){?>
				<div >
					<a target="_blank" href="{{ Storage::url($lf->file)}}">{{$lf->name_file}}
						<img src="{{ asset('images/icons/zip.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>
				</div>	&nbsp;&nbsp;
			<?php }?>
		@endforeach
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