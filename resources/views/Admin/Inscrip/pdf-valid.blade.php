<!DOCTYPE html>
<html>
<head>
	<title>Inscritos</title>
	 <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body>
	<div style="margin-top: 0"><img src="images/Apon.png"></div>
<div style="color:blue; font-size: 2rem;" align="center">{{$curso->title}}</div>

<div style="color: blue; font-size: 1.5rem; font-weight: bold; padding-left: 5%;">Listado de Inscritos</div>

<div align="right" style="margin-right: 5%;">leyenda: 
	<span style="color: #9cf7b9; font-size: 5rem;">.</span>
		<span style="color: black; font-size: 0.5rem;">confirmado</span> 
	<span style="color: #f3a08e; font-size: 5rem;">.</span>
		<span style="color: black; font-size: 0.5rem;">No confirmado</span>
</div>
<ul>
	@foreach($All_inscs as $insc)
	
			@foreach ($parts as $part)
				@if($part->id == $insc->part_id)
					@if ($insc->conf == 1)
						<li style="list-style: none; background: #9cf7b9;">{{ $part->name }} {{ $part->last_name }} </li><br>
					@else
						<li style="background:  #f3a08e ; list-style: none; ">{{ $part->name }} {{ $part->last_name }} </li><br>
					@endif
				@endif
			@endforeach
		

		@endforeach
</ul>

</body>
</html>