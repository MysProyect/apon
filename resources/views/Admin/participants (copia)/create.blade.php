<img src="{{asset('images/icons/new.png')}}" class="img-new"> <br>

		@include('Admin.participants.form')
	<div align="center">
	<button wire:click="store"  class="btn btn-primary btn-block">
		Guardar
	</button>
	  <img src="{{asset('images/icons/clear.png')}}" wire:click="clear"  class="img-clear" style="cursor: pointer;"  title="borrar">
	   <img src="{{asset('images/icons/close.png')}}" wire:click="close"   class="close img-close"  title="cerrar">
	</div>
<!-- 	<button wire:click="store" class="btn btn-primary  bt-save close-modal">
		Guardar
	</button> -->

