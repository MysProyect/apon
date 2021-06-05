	<div  style="display:flex; " class="container ">
    @if($view)
	    <div style="margin-right:2%;" align="center">
			@include("Admin.participants.$view") 
		</div>
		<div style="width: 70%;">
			@include('Admin.participants.table')   
		</div>
	@else
		<div style="width: 100%;">
			@include('Admin.participants.table')   
		</div>
	
	@endif


</div>


