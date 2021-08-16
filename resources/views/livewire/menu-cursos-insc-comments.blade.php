<div  style="margin-left: 5%;">
  <small class=" display-6 text-danger"><i>Los datos que proporcion seran de prueba para la aplicacion web</i></small> 
    <div style="width: 100% margin-top: 2%; margin-left: 5%; margin-right: 10%; ">
    	@if (empty($view_insc))   		
			@include("Menu.Cursos_Insc_Comm.cursos")
			
		@else
			@include("Menu.Cursos_Insc_Comm.inscribirse")		
		@endif
	
    </div>

</div>

		
	