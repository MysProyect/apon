@extends('layouts.app')
@section('title','- Section Admin')
@section('content')

<div align="center">
	<small class="title display-5">Bienvenido a la sección con privilegios</small>
	<p>Courses | Participants | Responsable | Inscription | Adm. class & aulas virtual | Users</p>
</div>
<div align="center" style="margin-top:2%; width: 100%; float: center;">
	<div class="flex" style="margin-left: 15%;" >		

		<div class="left" >	
		<!-- RESPONSABLS -->
			 <div class=" display-6" title="Responsabls" style="padding: 3%;">
			    <a href="{{ route('resp-livew')}}"  class="img-tool-admin">
					<img src="{{asset('images/resp.png')}}" >
					Responsabl's
				</a>	
			 </div>		  
			<!-- PARTICIPANTS -->	
			<div class="" title="Participants" style="padding: 3%;">
				<a href="{{ route('part-livew') }}"  class="img-tool-admin">
					<img src="{{asset('images/participants.png')}}"  style="">
					<span>Participante</span>
				</a>
			</div>	
			<!-- USERS -->
			<div class=" display-6" title="Usuarios" style="padding: 3%;"> 
				<a href="{{ route('AdmUser') }}"  class="img-tool-admin">
					<img src="{{asset('images/loguear.png')}}" class=""  style="">
						Users
				</a>                           	  
			</div>
		</div>
		<!--  class="img-tool-admin" -->

		<div align="center" >
			<!-- CURSOS -->
			<div  class="" title="Cursos" style="padding: 2%;">
				<a href="{{ route('cursos') }}"  class="img-tool-admin"> 
				<img src="{{ asset('images/cursos-online.png') }}"> 
				 <span class="display-5">Cursos(courses)</span>
				</a>
			</div>

			<!-- Virtual Class  -->
			<div class="" title="entrar al Aula Virtual" style="padding: 2%;" >
				<a href="{{ route('class')}}" class="img-tool-admin" title="cursos"> 
					<img src="{{ asset('images/class-virtual.png')}}" class=""  >
					 <span>class-aulas Virtual</span>
				</a> 	
			</div> 

			<!-- INSCRIPTION-->	
		   <div  title="valid Inscription" style="padding: 2%;">
				<a href="{{ route('insc-auth') }}" title="ver/validar inscripcion" class="img-tool-admin2">
					<img src="{{ asset('images/list-inscrip.png')}}">
				</a>
			</div>
		</div>
	</div><br><br>
	<!-- MENSAJES -->
	<div   title="Mensajes" align="center">
		<a href="{{ route('mensajs')}}" title="Adm. mensajes" class="img-tool-admin-msj"> 
			<img src="{{ asset('images/mensajes.png')}}" >
		</a> 
	</div> 	  	
	
</div>


	
	
	
@endsection
