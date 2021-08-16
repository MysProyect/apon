   <div align="right">
         <button type="button" class="close" wire:click="close"  data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50" ></span>
          </button>
      </div>
@if($inputcedula)
	 <div class="form-group"  style="margin-top: 3%; ">
	 <img src="{{asset('images/GIF/busc.gif')}}" /> 
	 		<!-- <input type="text" wire:model="curso_id" value="{{$curso_id}}" class="d-lg-none"> -->
	 		<input type="text" wire:model="cedula"  class="display-5" placeholder="Ingrese cedula de Identidad" autofocus required  onkeyUp="return ValNumero(this);" wire:change="verif({{ $curso_id }})" autofocus style="text-align: center" />
			@error('cedula')
				<label class="alert-danger">Cedula Obligatoria</label>
			@enderror
	</div>
@endif
<div  style="margin:2%; " class="text-center">

@if($UserAula)
	@if($part)
		<span class=" text-success display-5">
	    	{{$part->name}}&nbsp;{{$part->last_name}}<img src="{{asset('images/icons/checked.png')}}" width="50" height="30" /> 
	    </span><br> 
	@endif
	<div align="center">			
		<label class="display-6">Ya ha creado el Aula Virtual para este curso </label><br>
			<input type="button" wire:click="resetAula({{$part->id}})" class="btn btn-warning nav-link" value="Restablecer datos de Acceso?">
		</label>
	</div>
@endif



</div>

