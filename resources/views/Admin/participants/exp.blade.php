<!DOCTYPE html>
<html>
<head>
	<title>Listado</title>
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   	<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body>
	<div style="margin-top: 0"><img src="images/Apon.png"></div>
	<div class="display-5 text-success" style="font-weight: bold; margin: 5%;" align="center">Participant's</div>

<div align="center" style="margin-right: 5%; margin-left: 5%;">
<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Nombre y Apellido(s)</th>
			<th>Email</th>
			<th>Telef/wp</th>
		</tr>
		</thead>
		<tbody> 
	   <?php $cont = 1; ?>	
		@foreach($parts as $part)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td wire:click="show({{ $part->id }})"  title="ver">{{ ucfirst(trans($part->name)) }} {{ ucfirst(trans($part->last_name)) }}</td>
			<td>{{ $part->email }}</td>
			<td>{{ $part->telef }} {{ $part->wp }}</td>  

		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
   </div>
</body>
</html>