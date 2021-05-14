<!DOCTYPE html>
<html>
<head>
	<title>Listado</title>
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   	<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body>
	<div style="margin-top: 0"><img src="images/Apon.png"></div>
<div class="display-6 text-success" style="font-weight: bold; margin-top: 5%;" align="center">Responsabl's | Facilitador's</div>

<div align="center" style="margin-left: 5%; margin-right: 5%;">
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
		@foreach($resps as $resp)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td wire:click="show({{ $resp->id }})"  title="ver">{{ ucfirst(trans($resp->name)) }} {{ ucfirst(trans($resp->last_name)) }}</td>
			<td>{{ $resp->email }}</td>
			<td>{{ $resp->telef }} {{ $resp->wp }}</td>  

		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach
      </tbody>
      </table>
   </div>
</body>
</html>