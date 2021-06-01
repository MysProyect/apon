<div class="display-4 font-italic text-center" style="margin: 1%">BIENVENIDO(A)&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="text-success display-5">{{$auth->usuario}}	</span>
</div>
<div align="right" >		
		<img src="{{ asset('images/icons/salir.png') }}" wire:click="close" alt="imagen no disponible" title="Salir" class="img-salir cursor" />
</div>

<div align="center" style="margin-right: 10%; margin-top: 5%;">
	<p class="display-5 text-primary text-uppercase">{{$curso->title}}</p>
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/> 
		@else
			<img src="{{ asset('imagesf/no-img.jpeg') }}" alt="imagen no disponible" class="img-curs-2"/> 
		@endif
</div>

<div class="container-2" style="margin-top: 2%;">
	<div>
		<img src="{{ asset('images/GIF/part.gif') }}" /> 
	</div>
	<div class="" style="margin-left: 10%">
	@if($lec)
		@foreach ($lec as $l)			
			 
				 @if($l->visibility == 0)
				 	<span class="display-6  text-secondary">Leccion{{ $l->leccion }}</span>
				 @else
				 	<img src="{{ asset('images/icons/show.png') }}"   />
				 	<span class="display-6 text-primary font-weight-normal" wire:click="show_lecc({{ $l->id }},{{ $auth->id }} )" title="ver" style="cursor: move;">Leccion{{ $l->leccion }}</span>
				 @endif
			 	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			
		@endforeach		
	@else
		<h1>no hay registros</h1>
	@endif
	</div>
</div>


