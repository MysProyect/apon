
<div class="container">
	<div class="text-center display-4 text-success">Crear</div>
	<div class="form-group form-2">
		<label class=" display-5 text-warning"><b>Leccion Nª <b>{{$leccion}}</label><br>
				<img src="{{asset('images/icons/created.gif')}}">		
		    	<img src="{{asset('images/icons/close.png')}}" wire:click="salir"  class="img-close-2 close" align="right" style="cursor: pointer;"  title="cerrar">


		@include('Admin.Class.form')

	</div>
</div>
