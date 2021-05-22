<div class="container">
	@if($list)
		@include('Admin.Class.list')
	@else
	
<br><br>
	<div align="right">
		<label align="right"  class="cursor-m text-center" wire:click="list" >
			<img src="{{asset('images/reg.png')}}" width="100"  title="Lista Class" ><br><span  class="text-primary display-6">Lista de clases</span>
		</label>
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