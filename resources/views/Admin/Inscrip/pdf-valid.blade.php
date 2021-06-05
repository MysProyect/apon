<!DOCTYPE html>
<html>
<head>

	<title>Inscritos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div align="center">
		<img src="images/Apon.png" width="100">
	</div><br><br>
<div class="text-center disply-4 text-primary" align="center">
	{{$curso->title}}
</div>

<div class="text-center disply-3">Listado de Inscritos</div>

<div align="right" style="margin-right: 5%;">leyenda: 
	<span  style="color: blue; font-size: 5rem;">.</span>
		<span style="color: black; font-size: 0.5rem;">confirmado</span> 
	<span style="color: #f3a08e; font-size: 5rem;">.</span>
		<span style="color: black; font-size: 0.5rem;">No confirmado</span>
</div>

<div align="center" class="table table-borde table-sm">
	<table class="table">   		
			<thead class="thead-dark"> 			
			<tr>   
				<th>#</th>
				<th>Name and Surname </th>
			</tr>
		</thead>
		 <?php $cont = 1; ?>		
		<tbody>
			@foreach($inscs as $insc)
			@foreach($parts as $part)
				@if($part->id == $insc->part_id)
			<tr>
				<td>{{$cont}}</td>				
					@if ($insc->conf == 1)
						<td style="color: blue">{{$part->name}} {{$part->last_name}}</td>
					@else
						<td style="color: #f3a08e;">{{$part->name}} {{$part->last_name}}</td>
					@endif		
			</tr>
			@endif
			@endforeach
			<?php $cont= $cont+1; ?>
			@endforeach	
		</tbody>
	</table>
</div>

</body>
</html>