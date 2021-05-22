<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" style="padding-left: 2%; padding-right: 1%;">
        <div class="card-header title display-5 text-center text-uppercase" >{{ $curso->title}}</div>
          <div class="card-body">

	
<!-- 		<img src="{{asset('images/reg.jpg')}}" class="img-insc"> -->

		
			
			 
				<div class="form-group ">
					<small class="title-op" style="float: center;">Personal information</small><br>			
					<input type="text" wire:model="cedula"  class="slideselector text-primary"   autofocus placeholder="Identificacion"  onkeyUp="return ValNumero(this);" wire:change="verif" style="font-size: 1.5rem "> 
							@error('cedula')
								<label class="alert-danger text-8">identificacion obligaroria | invalid</label>
							@enderror
						  	@if (session('alert'))
								<div class="alert alert-success">             
									<small>{{ session('alert') }}  </small>
								</div>
							@endif
					<input type="text"   wire:model="name" class="form-control" autocomplete="on" placeholder="Name(s)" value="{{ old('name') }}"> 
							@error('name')
								<label class="alert-danger text-8">Nombre</label>
							@enderror        
					<input type="text" wire:model="last_name"class="form-control" autocomplete="on"  placeholder="Last name(s)" value="{{ old('last_name') }}" >
							@error('last_name')
								<label class="alert-danger text-8">Invalidque su nombre completo</label>
							@enderror
				</div> 
						<!-- 	<div align="right">
								<button wire:click="pagar" class="btn-primary">Avanzar</button>
							</div> -->
	
		  
		
		<div class="form-group">			
				<div class="flex img-contac">
					<small class="title-op" style="float: center;">Informacion de contacto
						<img src="{{asset('images/icons/contact.png')}}" class="">
					</small>
				</div>     		
				<div class="info">   		 			
					<DIV>E-mail
						<input type="email" class="form-control" wire:model="email"  autocomplete="on" style=" font-size: 2rem;" > 
						@error('email')
						<label class="alert-danger text-8"> Invalid email</label>
						@enderror
					</DIV>
					<div>
						Phone
						<input type="text" class="form-control"  wire:model="telef"  autocomplete="on"  onkeyUp="return ValNumero(this);" >  
					</div>
				    <div>
						WhatsApp
						<input  type="text" wire:model="NroWp" class="form-control"  />
					</div>     
				</div>
		</div>
	
		<div class="form-group"> 		
			<small class="title-op" style="float: center;">Course | Payment</small>
            <!--   <img class="" src="{{ asset('images/payment-platforms/stripe.jpg')}}"> 
              <img class="" src="{{ asset('images/payment-platforms/mercadopago.jpg')}}"> 
              <img class="" src="{{ asset('images/payment-platforms/paypal.jpg')}}">
              <img class="" src="{{ asset('images/payment-platforms/payu.jpg')}}"> <br> -->
             
             	<label class="text-danger text-center display-7">	
             		 Necesita adquirir esta aplicacion para proporcionar los methodos de pago y cuentas a la que estaran asociados sus cobros
             		<a href="{{route('contactanos')}}" class="display-7"  data-toggle="modal" data-target="#contacModal"  >consulte al administrador'</a>
             		
             	</label>
             	<div align="center">
             		<img src="{{asset('images/Fpagos.png')}}" class="img-pago" style="float: center"> 
             	</div>
   		</div>


	
		<br>

		<button wire:click="saveinsc" class="tex-bt btn btn-primary btn-lg btn-block" >Registrase</button>

	    <div>
	    	<img src="{{asset('images/icons/clear.png')}}" wire:click="default"   class="img-clear" style="cursor: pointer;"  title="borrar">
	        <img src="{{asset('images/icons/close.png')}}" wire:click="close"   class=" img-close close" style="cursor: pointer;"  title="salir">
	    </div>

    @if (session('mensaje'))
			<div class="alert alert-danger">             
				<label>{{ session('mensaje') }}  </label>
			</div>
		@endif
</div></div></div></div></div>


