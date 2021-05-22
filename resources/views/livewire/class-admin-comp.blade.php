<div class="container">
	@if($list)
		@include('Admin.Class.list')
	@else
	
		<div style="display: flex;">
			<div>
				<img src="{{asset('images/admin-class.gif')}}" class="cursor">
			</div>
			
			<div style="margin-left: 30%">
				<label   class="cursor-m text-center" wire:click="list" >
					<img src="{{asset('images/reg.png')}}" width="100"  title="Lista Class" ><br><span  class="text-primary display-6">Lista de clases</span>
				</label>
			</div>
		</div>
	
		 	@if (session('mensaje'))
				<div class="alert alert-success">             
					{{ session('mensaje') }}
				</div>
			@endif

		@if($class_select)
			@include('Admin.Class.class_select')
		@endif

		@if($list)
			@include('Admin.Class.list')
		@endif

		
		@if($create)
			@include('Admin.Class.create')
		@endif

		@if($edit)
			@include('Admin.Class.edit')
		@endif
		@if($show)
			@include('Admin.Class.show')
		@endif

		@endif


</div>