
<div  style="display:flex; " class="container">
    @if($view)
	    <div style="margin-right:2%;" align="center">    	
			@include("Admin.responsabls.$view") 
		</div>
		
	   <div style="width: 70%;">
			@include('Admin.responsabls.table')   
	   </div>
	@else
	 	<div style="width: 100%;">
			@include('Admin.responsabls.table')   
	   </div>
	@endif	

</div>