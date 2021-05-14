<div class="container"  style="margin-top: 5%;">

 		@if ($ver)
 		<div style="display: flex; ">
		    <div style="margin-right:1%; width: 40%;" class="">
		    	@include('Admin.Inscrip.show') 
			</div>
			<div style="width:70%;" class="">	    		
				@include('Admin.Inscrip.table') 
		    </div>
		</div>
		@endif
		@if ($valid)
		<div style="display: flex;">
			<div style="margin-right:2%; width: 30%;" class="">
		    	@include('Admin.Inscrip.valid-show')
		    </div>	
		    <div style="width: 70%;" class="">	    		
				@include('Admin.Inscrip.table') 
		    </div>
		</div>
		@endif
	
    	@if(empty($ver) && empty($valid))
    	 <div style="width: 100%;" class="">
			@include('Admin.Inscrip.table')
		</div> 
		@endif
	 
	
</div>

