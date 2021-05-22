
<div style="margin-top: 5%; width: 50%;">
	<div align="center">
		<span>Mensaje de </span>&nbsp;
		<span class="display-5 text-success">{{$msj->name}} {{$msj->last_name}}:</span>		
	</div>
	<div>
		<span>Asunto:</span>
		<span class="display-5 text-primary-2z">{{$msj->asunto}}</span>		
	</div>
	<div align="center">
		<span>Msj:</span>
		<span class="display-7 text-center">{{$msj->message}}</span>
	</div>

	<div class="display-6" align="center">Email: 
		<strong class=" text-primary">{{$msj->email}}</strong>
	</div>
	@if($msj->answered == 1)
		<br><h2 class="display-6 text-primary text-center">¡ya se envio una respuesta!</h2>
	@else
		<br><h2 class="display-6 text-danger text-center">esperando respuesta...</h2>
	@endif
</div>
 <img src="{{asset('images/icons/close.png')}}" wire:click="salir"   class="img-close-2 close cursor"  title="cerrar">
<div align="center" style=" margin-top: 1%;">
	@include('Admin.Mensaj.answer')
</div>


  