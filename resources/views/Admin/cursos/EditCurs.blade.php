@extends('layouts.app')
@section('title','- Cursos')
@section('content')
	
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card" style="padding-left: 2%; padding-right: 1%;">
        <div class="card-header title display-5 text-center" >Actualizar Curso</div>
          <div class="card-body">
		@if ($errors->has('login'))
			<span class="help-block">
				<strong>{{ $errors->first('login') }}</strong>
			</span>
		@endif  
  
	<div class="dorder-form" style="margin-right: 10%; margin-left: 5%;">                
		<form class="form-horizontal" method="POST" action="{{ route('UpCurso', $edit->id) }}" 
		name="formulario" enctype="multipart/form-data" onsubmit="return confirm('¿Actualizar curso?');" id="formulario">
		@method('PUT')
	    @csrf
			@error('title')
				<span class="alert alert-danger">indicate a course title</span>
			@enderror  
			<div  class="form-group">			
				<label class="display-5">Titulo:</label>
				<input type="text" name="title" value="{{ $edit->title }}" class="text-success form-control bold form-control " autofocus >		
			</div>
				
			<div class="form-group">
				<label class="display-7">Description:</label>
				<textarea name="description"  class="form-control"  value="{{ old('description') }}" cols="150" rows="5">{{$edit->description}}
				</textarea>
			</div>
				
			
				
					@if($edit->img)
					    <div class="img-curs">
					        <img src="{{ Storage::url("$edit->img") }}" alt="imagen no disponible" /><br>
					        <span class="display-8" >¿Cambiar imagen? 
							<input type="file" name="img" value="" id="miArchivo"  accept="image/png, .jpeg, .jpg, image/gif" style="color: transparent;"> </span>
					    </div>
					@else
						<div>
						   	Image
							<input type="file" name="img" value="" id="miArchivo" accept="image/png, .jpeg, .jpg, image/gif"> 
						</div>	
					@endif
			
				
				
				    
			 </div>
				<div class="display-6 text-primary" align="right" style="margin-left: 20%;" >Duracción
					<input type="text" name="duracion" size="10" value="{{ $edit->duration }}"  placeholder="Ejem: 5 hras"> 
				</div>	

			<div style="top:0;" class="text-center text-danger display-5" style="">
				@error('resp')
					<small>Debe volver a configurar el/los Facilitador(s) del curso</small> 
				@enderror
			</div>
			<div class="form-group" style="display: flex;">  				
				<div  id="Resp">  
					<label class="display-7 text-success">Facilitador's/Responsabl's</label>
					<input type="radio" id="Resp" name="cant_resps" value="1" onclick="SelecDinam()">uno &nbsp;&nbsp;&nbsp;
					<input type="radio" id="Resp" name="cant_resps"  value="2" onclick="SelecDinam()">mas...				
				</div>	
				<div class="display-7 text-danger" style="padding-top: 3%; margin-left: 10%;">
						Si responsable No esta en la lista de <a href="{{ route('resp-livew')}}" title="Responsabls">click aqui</a>
				</div>
			</div>	


				<div id="uno" style="display:none; padding:10;"> 		
					<select name="resp">
						<option value="">Seleccione</option>
							@foreach($resp as $item)
								&nbsp;&nbsp;<option value="{{$item->id}}">{{ $item->name }} {{ $item->last_name }}</option>
							@endforeach
						</select>
				</div>		
			 	<div id="mas" style="display:none;">
					@foreach($resp as $item)
							<input type="checkbox" name="resp[]" value="{{$item->id}}">{{ $item->name }} {{ $item->last_name }}
					@endforeach
		        </div>
	              
				 
 
	       <div style="">
		      
			</div>
	           <div align="center">	
				  <input type="submit" name="btnsave" class="tex-bt btn btn-success" value="Actualizar"/>	
				 <a href="{{ route('cursos') }}"> <input type="button" value="Cancelar" class="btn btn-danger" ></a>
	          </div>

	</form>

        
	@if($edit->statud== 1)			
		<label id="msj"  class="display-6 text-primary">Publicado</label>		
	@else
	   <label id="msj"  class="display-6 text-danger" >¡No Publicado!</label> 
	@endif
	<form method="post" action="{{route('statud', $edit)}}" >
		{{ csrf_field() }}
		<input type="submit" value="change?" class="btn btn-warning">
	</form>

	</div>

<!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-info">
        <input type="radio" name="gender" value="hombre" autocomplete="off"> Hombre
    </label>
    <label class="btn btn-info active">
        <input type="radio" name="gender" value="mujer" autocomplete="off"> Mujer
    </label>
</div>	 -->

</div>
		 <div align="left" style=";">
            <a href="{{ route('cursos') }}" title="ir atras">
               <img src="{{ asset('images/icons/back.png') }}"  class="irAtras">
            </a> 
          </div>
</div>	 
</div></div></div>       



@endsection

<script src="{{ asset('js/SelcDinam.js') }}"></script>  
<script src="{{ asset('js/public.js') }}"></script> 
<script src="{{ asset('js/forms.js') }}"></script> 
