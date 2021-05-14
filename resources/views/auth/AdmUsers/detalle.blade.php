@extends('layouts.app')
@section('title','- Detalles')
@section('content')

     
<div class="title display-4" ><b>Detalles de Usuario </b></div><br>

<div align="center" style="">
	 <img src="{{ asset('images/icons/user.png') }}"  class="irAtras"></a> 
	<div>
		  <h1>{{ $user->name}} {{ $user->last_name}}</h1>
		<h3>E-mail: {{ $user->email}}</h3><br>
	</div>
	
	<?php $rol=$user->role;
		$var=1;

		foreach ($rol as $r) {
	?>
		@if($var)
			<label class="display-5">{{$r->name }} <strong><b> Nivel(s):</b></strong></label>
		@endif
			<strong class="display-5"><b> {{$r->pivot['nivel']}} </b></strong>
	<?php
		 $var="";} 
	?>	
  <div class="display-5">
	@if($user->statud == 1)
		<span class="text-primary">Activo</span>
	@else
		<span class="text-muted">Inactivo</span>
	@endif
 </div>
    
<form method="post" action="{{route('statud', $user)}}"  onsubmit="return confirm('¿Seguro?');">
{{ csrf_field() }}
	<input type="submit" value="change?" class="btn btn-warning">
</form>





<div align="left" style="margin-left:60%;">
	<a href="{{ route('AdmUser') }}" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras-2"></a> 
</div>


<script src="{{ asset('js/forms.js') }}"></script>
@endsection
