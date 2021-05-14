<div class="container">
  <small class=" display-8"><i>Los datos que proporcion seran de prueba para la aplicacion web</i></small> 
    <div style="margin-top: 2%;">
    	@if (empty($view_insc))   		
			@include("Menu.Cursos_Insc_Comm.cursos")
			
		@else
			@include("Menu.Cursos_Insc_Comm.inscribirse")		
		@endif
	
    </div>

</div>

		
	