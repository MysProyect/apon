<div>
		
<div align="right">	
	@if($No_acceso)
		<label class="text-danger display-7 text-center" style="margin-top: 5%;">{{$No_acceso}}<br>
			<span class="text-primary display-7 text-center">'consulte al administrador'</span>
		</label>
	@endif
	<label align="left" class="img-AddNew cursor">
		<img src="{{asset('images/icons/AddNew.png')}}"  wire:click="create" >
	</label > 
	
</div>

@if($conf)
	<div class="text-center"> 
		<span class="text-danger display-6 text-center">{{$conf}}</span><br>
		<span class="text-success display-7">{{$part->name}} {{$part->last_name}}</span>&nbsp;&nbsp; <strong class="display-8">¿esta seguro?</strong><br>
	</div>
	<div align="center" class="display-6">
		<input type="radio" wire:model="conf" name="conf" id="none"  value="si" wire:click="destroy({{ $part->id }})">Si &nbsp;
		<input type="radio" wire:model="conf" name="conf" id="none"  value=""  >¡No!
	</div>
@endif
@if (session('mensaje'))		
		<div class="alert alert-success">             
			{{ session('mensaje') }}
		</div>
@elseif (session('alert'))	
		<div class="alert alert-danger">             
			{{ session('alert') }}
		</div>
@endif

@if($parts->count())  
<label class="flex shearch">
    <img src="{{asset('images/icons/shearch.png')}}">
	<input type="text"   wire:model="searchPart"  placeholder="Buscar" class="form-control"> 
</label>

	
            
   
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Nombre y Apellido(s)</th>
			<th>Email</th>
			<th>Edit - Elim</th>
		</tr>
		</thead>
		<tbody> 
	   <?php $cont = 1; ?>	
		@foreach($parts as $part)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif align="center" >
			<td wire:click="show({{ $part->id }})" title="ver" class="nav-link-2 cursor" data-toggle="modal" data-target="#showModal" >{{ $part->name}} {{ $part->last_name}}</td>
			<td>{{ $part->email }}</td>
            <td><img src="{{asset('images/icons/editar.png')}}" width="30"  wire:click="edit({{ $part->id }})" class="cursor" title="Actualizar">

				&nbsp;&nbsp;&nbsp;<img src="{{asset('images/icons/delet.png')}}"  wire:click="conf({{ $part->id }})" width="30" class="cursor" title="eliminar">

            </td>    

		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
      <div style="color:blue;">
			{{ $parts->links() }}
     </div> 
  
    <div align="right" class="exp">
     <a href="{{url('list-parts')}}">
      	<img src="{{asset('images/icons/impress.png')}}" title="Exportar">
      </a>
    </div>

    <<!-- img src="{{asset('images/icons/impress.png')}}" class="cursor" wire:click="downloadpdf"> -->
 
@else
	<div align="center"  class="text-center text-danger display-5">No hay registros</div>
@endif	

		
    

			@include("Admin.participants.show") 

 </div>
 
