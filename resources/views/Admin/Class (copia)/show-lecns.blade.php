<div>

<div align="center">
	<strong class="text-success">{{$curso->title}}</strong>
</div><br>

@foreach($lecns as $N)
	@if ($N->visibility == 1)
		<li wire:click="show({{$N->id}})" class="text-primary display-7 cursor" title="detail...">Leccion {{$N->leccion}}</li>
	@else
		<li  class="text-muted">Leccion {{$N->leccion}}</li>
	@endif
@endforeach
<br><br>
	<div>
		<label class="text-primary display-7 cursor">Visible</label>
		<label class="text-muted">NO-visible</label>
	</div>
</div>

