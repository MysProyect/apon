@extends('layouts.app')
@section('title','- Section Admin')
@section('content')

<div class="text-center text-primary-2 display-4 spad" style="margin-top: 5%;">User's&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{route('Admin')}}" title="salir">
			<img src="{{asset('images/icons/close.png')}}"   class="img-close-2 close cursor"  title="salir">
		</a>
</div>
	<!-- USERS -->
@if (session('mensaje'))
	<div class="alert alert-success">             
		{{ session('mensaje') }}
	</div>
@endif
<div align="right" class="img-btn-new">
	<a href="{{ route('register') }}"  title="Nuevo">
		<img src="{{asset('images/icons/bt-new.png')}}" >				
	</a>
</div>			



<div class="container">
	<table class="table table-striped clase" align="center">
		<thead class="thead-dark">
		<tr >      
			<th scope="col">User</th>
			<th scope="col">Nombre & Apellido (s)</th>
			<th scope="col">Privilegio</th>
			<th scope="col">Statud</th>
		</tr>
		</thead>			
		@foreach($users as $item)
		<tbody>
			<tr style=""> 
				<td style="text-align: center;" class="  " >
					<a href="{{route('ver', $item)}}" style="text-decoration: none;">
						<?php echo (strtoupper($item->username)) ?>
					<a/>
				</td>
				<td scope="row">
					<a href="{{route('ver', $item)}}" style="text-decoration: none;">
						{{$item->name}}  {{ $item->last_name }}
					</a>
				</td> 
				<td>
					<?php $rol=$item->role;
						$var=1;

						foreach ($rol as $r) {
					?>
						@if($var)
							<label class="display-7">{{$r->name }} <strong><b> Nivel(s):</b></strong></label>
						@endif
							<strong><b> {{$r->pivot['nivel']}} </b></strong>
					<?php
						 $var="";} 
					?>	










<!-- 




					<?php $rol=$item->role;   
						foreach ($rol as $r) {
							echo $r->name;
							echo "<b> nivel: ".$r->pivot['nivel']."</b";
						} 
					?> -->
				</td>
				<td>
					@if($item->statud == 1)
						<span class="text-primary">Activo</span>
					@else
						<span class="text-muted">Inactivo</span>
					@endif
				</td> 
			</tr>				
		</tbody>
		@endforeach
	</table>  
	 <div style="color:blue;">
			{{ $users->links() }}
     </div> 
     <div align="right">
     	 <a href="">
      	<img src="{{asset('images/icons/impress.png')}}">Exportar
      </a>
     </div>                               	  
</div>




	   	
	
	
	
	
@endsection
