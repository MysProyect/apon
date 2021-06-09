<!DOCTYPE html>
<html>
<head>
	<title>Listado</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div style="margin-top: 0"><img src="images/Apon.png"></div>
	<div class="display-5 text-success" style="font-weight: bold; margin: 5%;" align="center">Participant's</div>

<div align="center" class="table table-borde table-sm">
<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">   
			<th>#</th>     			
			<th>Nombre y Apellido(s)</th>
			<th>Email</th>
			<th>Telef/wp</th>
		</tr>
		</thead>
		<tbody> 
	   <?php $cont = 1; ?>	
		@foreach($parts as $part)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td class="text-center text-muted">{{$cont}}</td>
			<td wire:click="show({{ $part->id }})"  title="ver">{{ ucfirst(trans($part->name)) }} {{ ucfirst(trans($part->last_name))}}</td>
			<td>{{ $part->email }}</td>
			<td>{{$part->telef}} {{$part->wp}}</td>  

		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
   </div>
</body>


       
</head>
<body>