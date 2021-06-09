
	<img src="{{asset('images/icons/ver-edit.png')}}" class="img-AddEdit"><br> 

	@include('Admin.responsabls.form')

	<button wire:click="update" class="btn btn-success btn-lg"> Actualizar</button>

   <img src="{{asset('images/icons/close.png')}}" wire:click="close"   class="close img-close" style="cursor: pointer;"  title="borrar">


<br><br><br>
<br><br><br>