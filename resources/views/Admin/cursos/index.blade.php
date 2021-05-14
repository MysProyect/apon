@extends('layouts.app')
@section('title','- Cursos')
@section('content')

<div class="text-center text-primary-2 display-4 spad">Cursos
		<a href="{{route('Admin')}}" title="salir">
			<img src="{{asset('images/icons/close.png')}}"   class="img-close-2 close cursor"  title="salir">
		</a>
</div>


				  @if (session('mensaje'))
					<div class="alert alert-success">             
						{{ session('mensaje') }}
					</div>
				  @endif
				  	
			      <div class="img-btn-new">
					  <a href="{{ route('Newcurso') }}"  title="Nuevo Curso">
					  	<img src="{{asset('images/icons/bt-new.png')}}">
					  </a>
			      </div >
			    
			 	    
	<div  class="container">
@if($cursos->count())	
	@foreach($cursos as $item)	
	        <div class="listCurs">  							
				<div class="form-group" align="center" style="width: 100%;">
					<div class="display-6">
						<a href="{{ route('detaill', $item) }}" title="Ver detalles" >
							<?php echo (strtoupper($item->title)) ?>
						</a> 
					</div>
					<div class="flex">
						<div align="center" style="margin-top: 2%;">
							@if (!empty($item->description))
								 <?php $tam = strlen($item->description); ?>
								@if ($tam <= 200)                
								<small class="text-muted display-6">{{$item->description}}</small>
			               		@elseif ($tam > 200)
								<small class="text-muted display-6"> <?php echo substr($item->description, 0, 200); ?>... </small>
								@endif
							@else
							    <p>Descripcion No disponible</p>
							@endif
						</div>
						 <div >
					          @if($item->img)
					              <img src="{{ Storage::url("$item->img") }}" alt="imagen no disponible" class="img-curs-2"/>
					          @else
					              <img src="{{ asset('images/no-img.png') }}" class="img-curs-2"/>
					          @endif
					     </div>
			
					</div>
			        @if($item->duration)
	                        <small class=" display-6 text-primary-2"><b>Duration {{$item->duration}}</b></small>
	                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	                
	                @endif
					@if($item->statud ==1)
						<label class="text-success display-6">Publicado</label>
					@else
						<label class="text-danger display-6">Sin publicard</label>
					@endif
			
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('EditCurs', $item) }}" title="editar"> 
					<img src="{{ asset('images/icons/editar.png') }}" class="edit" align="center">Editar</a>
				</div>  				
			</div>
			@endforeach
			    <label>{{ $cursos->links()}}</label> 
			    
			    <div align="right">
			    	<a href="{{route('ExpCurso')}}"> <img src="{{asset('images/icons/impress.png')}}">Exportar</a>	
			    </div>	
@else
	<div align="center"  class="text-center text-danger display-5">No hay registros</div>
@endif	

	      </div>	

			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			    
			    
			    
			    
		

@endsection
