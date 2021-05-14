<div class="container">
	@if (session('mensaje'))
		<div class="alert alert-success text-center" style="margin-top: 1%">             
			{{ session('mensaje') }}
		</div>
	@endif
	@if (session('alert'))
		<div class="alert alert-danger text-center" style="margin-top: 1%">             
			{{ session('alert') }}
			 <a class="" href="{{ route('contactanos') }}" data-toggle="modal" data-target="#contacModal" >contactenos...</a>
		</div>
	@endif

	@if($iniciar)
	<div style=" margin-top: 5%;" class="form-group" align="center" >
	    <div class="text-center"  >
	      <small class="display-4"> Bienvenidos al</small> <br><small class="display-3 text-primary">Aula Virtual</small>
	    </div>
        <div class="text-center display-7" style=" margin-top: 2%; display: flex;" align="center">
	      <label class="text-danger" ><i>Para continuar... esta seccion previamente debe estar inscripto en un de nuestros
	      	 <a class="nav-link text-hover" href="{{ route('cursos-menu') }}" class="nav-link">cursos disponibles...</a></i>
	      </label> 
	    </div>			
		<div align="center" style=" margin-top: 2%;">
				<img src="{{asset('images/continue.png')}}" width="200"  wire:click="continue" class="cursor">
		</div>
	</div>
	@endif
	@livewire('comp-contactanos')
		@if($continue)
			@include('Menu.Aulas.continue')
		@endif

		@if ($verif)
			@include('Menu.Aulas.verif')
		@endif

		@if($regist)
			@include('Menu.Aulas.regist')
		@endif


		@if($logeat)
	 		@include('Menu.Aulas.logeat')
   		@endif
   		@if($resetAula)
	 		@include('Menu.Aulas.resetAula')
   		@endif

		@if($aula)
	 		@include('Menu.Aulas.aula')
   		@endif
   		
   		@if($show_lecc)
			@include('Menu.Aulas.show_lecc')
		@endif

</div>

	

