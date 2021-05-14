<div class="container mx-auto">
	@if($show)
		@include('Admin.Mensaj.show')
	@else
    	@include('Admin.Mensaj.all')
    @endif
</div>
