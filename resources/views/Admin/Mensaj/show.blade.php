
<div style="margin-top: 5%; width: 50%;" class="display-6">
	<div align="center">
		<span>Mensaje de:</span>
		<span class=" display-5">{{$msj->name}} {{$msj->last_name}}</span>		
	</div>
	<div>
		<span>Asunto:</span>
		<span class="text-primary">{{$msj->asunto}}</span>		
	</div>
	<div>
		<span>Email: </span>
		<strong class=" text-primary">{{$msj->email}}</strong>
	</div>
	<div>
		<spa>Msj:</span>
		<span class="text-center display-6 text-success">{{$msj->message}}</span>
	</div>

	
	@if($msj->answered == 1)
		<br><h2 class="display-6 text-primary text-center">¡ya se envio una respuesta!</h2>
	@else
		<br><h2 class=" text-danger text-center font-italic">esperando respuesta...</h2>
	@endif
</div>
 <img src="{{asset('images/icons/close.png')}}" wire:click="salir"   class="img-close-2 close cursor"  title="cerrar">
<div align="center" style=" margin-top: 1%;">
	@include('Admin.Mensaj.answer')
</div>


  