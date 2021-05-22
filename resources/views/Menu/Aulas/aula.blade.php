<div class="display-4 font-italic text-center" style="margin: 1%">BIENVENIDOS</div>
<div  class="form-gruop" align="center" style="margin-top: 2%;">
	


	<div align="right" class="text-success display-6">
		{{$auth->usuario}}	
		<img src="{{ asset('images/icons/salir.png') }}" wire:click="close" alt="imagen no disponible" title="Salir" class="img-salir cursor" />
	</div>
	<div style="margin-left: 10%; margin-right: 10%; margin-top: 2%;">
		<h1 class="text-center display-5 text-primary text-uppercase"  style="margin-top: 1%;">{{$curso->title}}</h1>
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/> 
		@else
			<img src="{{ asset('imagesf/no-img.jpeg') }}" alt="imagen no disponible" class="img-curs-2"/> 
		@endif
	</div>
<div class="container">
	<div class="form-group" style="margin-top: 2%;">
		<ul class="two">
	@if($lec)
		@foreach ($lec as $l)			
			 <li class="">
				 @if($l->visibility == 0)
				 	<span class="display-6  text-secondary">
				 @else
				 	<span class="display-6 text-primary font-weight-normal" wire:click="show_lecc({{ $l->id }},{{ $auth->id }} )" style="cursor: move;">
				 @endif
			 	Leccion {{ $l->leccion }}</span>
			 </li>
		@endforeach
	@else
			<h1>no hay registros</h1>
	@endif
		</ul>
	</div>
</div>

</div>