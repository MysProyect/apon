	<small class="title-op">Información personal</small>
	<div class="form-gruop">
		<input type="text" wire:model="cedula"  class="form-control text-bold"  autofocus required placeholder="Cedula" onkeyUp="return ValNumero(this);" wire:change="verif"> 
		
	</div>
 <!--   @if (session('mensaje'))
			<div class="alert alert-success">             
				<small>{{ session('mensaje') }}  </small>
			</div>
		@endif
 -->
    <div class="form-group" >
		<input type="text"   wire:model.lazy="name" class="form-control"  autocomplete="on" placeholder="Nombre(s)"  > 
	
		<input type="text" wire:model.lazy="last_name"  class="form-control" autocomplete="on"  placeholder="Apellidos(s)">
	
	</div>

	
	<img src="{{asset('images/icons/contact.png')}}" class="img-contac"><br>   
   <small class="title-op">Información de contacto</small>  
    <div class="info form-group">
      		 			
		<DIV>E-mail
			<input type="email" class="form-control" wire:model="email"  autocomplete="on"> 
		</DIV>
		<div>Telefono
			<input type="text" class="form-control"  wire:model="phone"  autocomplete="on"  onkeyUp="return ValNumero(this);" >  
	    </div>
        <div>
			<label>WhatsApp</label> 
			<input  type="text" wire:model="NroWp" class="form-control" />
	    </div>
	            
	           
	 </div>
	 	@error('cedula')
			<div class="alert-danger">Cedula Obligarotia</div>
		@enderror
	 	@error('name')
			<div class="alert-warning">Nombre Obligatorio</div>
		@enderror
			@error('last_name')
			<div class="alert-warning">Apellido Obligatorio</div>
		@enderror
		@error('email')
			<div class="alert-danger"> Email no valido</div>
		@enderror

	
	
<!--      @if($errors->has)
     <div class="alert alert-danger" role="alert">
            @if ($errors->has('name'))
                {{ $errors->first('name') }}
            @elseif($errors->has('last_name'))
               {{ $errors->first('last_name') }}
            @elseif($errors->has('email'))
            	{{ $errors->first('email') }}
            @endif          
     </div>
     @endif -->

<script src="{{ asset('js/validar.js') }}"></script>

