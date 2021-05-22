<div>
	
<div align="right">	
	@if($No_acceso)
		<label class="text-danger display-7 text-center" style="margin-top: 5%;">{{$No_acceso}}<br>
			<span class="text-primary display-7 text-center">'consulte al administrador'</span>
		</label>
	@endif
	<label align="right" style="cursor: pointer;" class="img-AddNew">
		<img src="{{asset('images/icons/AddNew.png')}}"  wire:click="create" >
	</label > 
	
</div>
<!-- -->
@if($conf)
	<div class="text-center" style="width: 60%;"> 
		<span class="text-danger display-7 text-center" >{{$conf}}<br><span>¿Esta seguro?</span></span>
	
	<div align="center" class="display-6">
		<input type="radio" wire:model="conf" name="conf" id="none"  value="si" wire:click="destroy({{ $resp_id }})">Si &nbsp;
		<input type="radio" wire:model="conf" name="conf" id="none"  value=""  >¡No!
	</div>
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

@if($resps->count())
<label class="flex shearch">
    <img src="{{asset('images/icons/shearch.png')}}">
	<input type="text"   wire:model="searchResp"  placeholder="Buscar" class="form-control"> 
</label>
<!--       {{$cursos}}  --> 
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
		@foreach($resps as $resp)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td   wire:click="show({{ $resp->id }})" title="verr" class="nav-link-2 cursor" data-toggle="modal" data-target="#showModal" >{{ ucfirst(trans($resp->name)) }} {{ ucfirst(trans($resp->last_name)) }}</td>
			<td>{{ $resp->email }}</td>
            <td><img src="{{asset('images/icons/editar.png')}}" width="30" wire:click="edit({{ $resp->id }})" class="cursor">  
				
				&nbsp;&nbsp;&nbsp;<img src="{{asset('images/icons/delet.png')}}"  wire:click="conf({{ $resp->id }})" width="30" class="cursor" title="eliminar">
			</td>  

		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
      <div style="color:blue;">
			{{ $resps->links() }}
     </div> 
     <div align="right">
     	 <a href="{{route('ExpResp')}}">
      	<img src="{{asset('images/icons/impress.png')}}">Exportar
      </a>
     </div>
@else
	<div align="center"  class="text-center text-danger display-5">No hay registros</div>
@endif	
 
 
		@include("Admin.responsabls.show") 

    
 </div>