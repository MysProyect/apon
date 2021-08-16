@extends('layouts.app')
@section('title','- Bienvenidos')
@section('content')	
<div style=" margin-left: 15%;">
 <div style="display: flex;  margin-top: 2%;">

	<div style="margin-right: 1%;">
		<span class="text-info">Guia de usuario</span><br>
		<a target="_blank" href="{{asset('APON.pdf')}}">
			<img src="{{asset('images/icons/PDF.png')}}" title="ver/descargar" class="pdf"> 
		</a>
	</div>
						

 	<div  style="font-family: 'Niconne', cursive;" class="text-center">
		<small  class="display-5 text-primary">Convencidos que los mejores tiempos </small><br>
		<small class="display-6 text-success">¡son estos que vivimos! </small> <br>
			<img src="{{asset('images/Apon.png')}}" class="apon" >	
	</div> 
   	<div  style="margin-left: 5%;" class="img-write">
	    <a class="" href="{{ url('contactanos') }}" data-toggle="modal" data-target="#contacModal"  >
	    	<img src="{{asset('images/icons/write.png')}}" title="Contactacnos" > 
		</a>
	</div>	
</div>
@livewire('comp-contactanos')

<!-- 	DE YOUTUBE---
	<iframe width="300" height="200" src="https://www.youtube.com/embed/QBTDiQjCjOg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
<!-- 	<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fvirginia.palma.121%2Fposts%2F10206527217476881&show_text=true&width=500" width="500" height="188" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->

<div class="" style="display: flex;">  
	<div style="margin-right: 20%;">
		<a href="{{ route('cursos-menu') }}">

	<img src="{{asset('images/GIF/cursos.gif')}}" title="Cursos">
	</a>
	</div>
	<div style="margin-top: 10%;">
		
		<a class="nav-link text-center" href="{{ route('aulas')}}" id="aula" title="Tu Aula Virtual - Entrar">
			<!-- <img src="{{asset('images/GIF/clases-online.gif')}}" >	 -->	
			<img src="{{asset('images/GIF/aula.gif')}}" >	
		</a>

	</div>   	
		


</div>

</div>         

@endsection



