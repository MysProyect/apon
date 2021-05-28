@extends('layouts.app')
@section('title','- Bienvenidos')
@section('content')	         
 <div style="display: flex;  margin-top: 2%;">

	<div style="margin-right: 1%;">
		<span class="text-info">Documentacion</span><br>
		<a target="_blank" href="{{asset('APON.pdf')}}">
			<img src="{{asset('images/icons/PDF.png')}}" title="ver/descargar" class="pdf"> 
		</a>
	</div>
						

 	<div  style="font-family: 'Niconne', cursive;" class="text-center">
		<small  class="display-5 text-primary">Convencidos que los mejores tiempos </small>
		<small class="display-6 text-success">¡son estos que vivimos! </small> <br>
		<img src="{{asset('images/Apon.png')}}" class="apon" >	
	</div> 
   	<div  style="margin-left: 5%;" class="img-write" >
	    <a class="" href="{{ route('contactanos') }}" data-toggle="modal" data-target="#contacModal" class="img-menu-2">
	    <img src="{{asset('images/icons/write.png')}}" title="Contactacnos" > </a>
	</div>	
</div>
@livewire('comp-contactanos')
    <!-- 
	<div> 
		<div align="left">
			<a href="{{ route('aulas')}}"> 
				<img src="{{ asset('images/aula-virtual.png')}}" class="img-left" title="entrar al Aula Virtual">
			</a> 
		</div>   
	</div> -->

<div class=" change text-center" >     	
	<a href="{{ route('cursos-menu') }}">
    <!-- <a class="nav-link text-hover display-3" href="{{ route('cursos-menu') }}" class=""> -->
<!--     <div class="text text-1">C</div>
    <div class="text text-2">U</div>
	<div class="text text-3">R</div>
	<div class="text text-4">S</div>
	<div class="text text-2">0</div>
	<div class="text text-3">S</div> -->
	<img src="{{asset('images/cursos.gif')}}" title="Cursos" >
	<!-- <img src="{{asset('images/cursos-online.png')}}" class="curs-home"> -->
	</a>	
	<img src="{{ asset('images/tool.gif') }}" class="none" >
</div> 

<div align="right">

		<a class="nav-link text-center" href="{{ route('aulas')}}" id="aula" title="Tu Aula Virtual - Entrar">
			<!-- 	<img src="{{asset('images/GIF/clases-online.gif')}}" >	 -->	
				<img src="{{asset('images/GIF/aula.gif')}}" >	
		
	</a>

</div>


@endsection



