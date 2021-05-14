 <div class="form-group" align="center" style="margin-top: 3%; ">

 		<!-- <input type="text" wire:model="curso_id" value="{{$curso_id}}" class="d-lg-none"> -->
 		<input type="text" wire:model="cedula"  class="display-5" placeholder="Ingrese cedula de Identidad" autofocus required  onkeyUp="return ValNumero(this);" wire:change="verif({{ $curso_id }})" autofocus style="text-align: center" />
		@error('cedula')
			<label class="alert-danger">Cedula Obligatoria</label>
		@enderror

</div>
<div  style="margin:2%; " class="text-center">
@if($part)

	<span class=" text-success display-5">
    	{{$part->name}}&nbsp;{{$part->last_name}} <img src="{{asset('images/icons/checked.png')}}" width="50" height="30" /> 
    </span><br> 


@endif

@if($UserAula)
	<div align="center">			
		<label class="display-6">Ya ha creado el Aula Virtual para este curso </label><br>
			<input type="button" wire:click="resetAula({{$part->id}})" class="btn btn-warning nav-link" value="Restablecer datos de Acceso?">
		</label>
	</div>
@endif





@if ($Preg_regist)
		<label class="form-gruop text-center display-7" style="width: 62%; margin-top: 2%;" wire:click="decid" >
			<i>Quiere registrarse ahora?</i><br>
			<input type="radio" wire:model="decid" value="1" class="btn btn-success" >Si</input>
			<input type="radio" wire:model="decid" value="" class="btn btn-warning">No</button>
		</label>
@endif 
</div>

