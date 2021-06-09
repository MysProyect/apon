	 
	 <small class="text-muted display-6">Información personal</small>
	
	     <div  class="form-gruop info">
			<input type="text" wire:model="cedula"  class="form-control" style="color: blue; font-size:2rem;"  autofocus required placeholder="Cedula" onkeyUp="return ValNumero(this);" wire:change="verif"> 
			@error('cedula')
				<label class="alert-danger">Cedula Obligarotia</label>
			@enderror
	 

			<input type="text"   wire:model="name" class="form-control"  autocomplete="on" placeholder="Nombre(s)">   
			<input type="text" wire:model="last_name" class="form-control" autocomplete="on" placeholder="Apellidos(s)">
	
			 <div  class="text-prymary display-6">Profession: 
			 	<select wire:model="profession_id">
			 		<option value="">Seleccione</option>
			 		@foreach($professions as $profession)
			 		<option value="{{$profession->id}}">{{$profession->name}} - {{$profession->abrev}}</option>
			 		@endforeach
			 	</select>
			 </div>
		</div><br> 

	 	<div align="center">
	 		<img src="{{asset('images/icons/contact.png')}}" class="img-contac">
	 	</div>
        <small class="text-muted display-6">Información de contacto</small>       
        <div class="info form-gruop">   		 			
			<DIV>E-mail
				<input type="email"  wire:model="email"  autocomplete="on" class="form-control"> 
				@error('email')
					<label class="alert-danger"> E-mail no valido</label>
				@enderror
			</DIV>
			<div>Telefono
				<input type="text"  wire:model="phone"  autocomplete="on"  onkeyUp="return ValNumero(this);" class="form-control"> 	    
            </div>
            <div>
				<label>WhatsApp</label> 
				<input  type="text" wire:model="NroWp" class="form-control" />
	        </div>

	    </div>

<script src="{{ asset('js/validar.js') }}"></script>


