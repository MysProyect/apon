<div>

	<br>
@if (session('mensaje'))		
	<div class="alert alert-success">             
		{{ session('mensaje') }}
	</div>
@endif
@if (session('error'))		
	<div class="alert alert-danger">             
		{{ session('error') }}
	</div>
@endif

@if($mensajs)  

	<label class="flex shearch">
    <img src="{{asset('images/icons/shearch.png')}}">
	<input type="text"   wire:model="search"  placeholder="Buscar" class="form-control"> 
</label> 
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Msj de: </th>
			<th>Asunto</th>
			<th>Phone|Whatsapp</th>
			<th>Statud</th>
		</tr>
		</thead>
		<tbody> 
	   <?php $cont = 1; ?>	
		@foreach($mensajs as $msn)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td align="center" class="display-5">{{ $msn->name }} {{$msn->last_name}}</td>
			<td>{{ $msn->asunto }}</td>
			<td>{{ $msn->phone }} @if($msn->whatsapp) | {{ $msn->whatsapp }} @endif</td>
			<td align="center"  wire:click="show({{ $msn->id }})" class="">
				@if($msn->answered == 0)
					<img src="{{asset ('images/icons/msn-2.png')}}" title="sin respondder" class="img-msj-all cursor">
				@else
					<img src="{{asset ('images/icons/msn.gif')}}"  title="listo (respondido)" class="img-msj-all2">
				@endif 
			<!-- 	<button wire:click="edit({{ $msn->id }})" class="btn btn-info">editar | ver</button> -->
                 
<!--
				&npsn; <button wire:click="destroy({{ $msn->id }})" class="btn btn-danger">Eliminar</button>
-->

			</td>
		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
@else
<br><br>
	<strong class="text_center display-5"> No hay registros</strong>

@endif

   <div style="color:blue;">
			{{ $mensajs->links() }}
     </div> 
 </div>
   
