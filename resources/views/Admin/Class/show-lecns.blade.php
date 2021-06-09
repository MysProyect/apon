<div>

<div align="center">
	<strong class="text-success">{{$curso->title}}</strong>
</div><br><br><br>

@foreach($lecns as $N)
	@if ($N->visibility == 1)
		<li style="list-style-type: upper-roman;" wire:click="show({{$N->id}})" class="text-primary display-7 cursor" title="detail...">Leccion {{$N->leccion}}</li><br>
	@else
		<br><br><li  class="text-muted">Leccion {{$N->leccion}}</li>
	@endif
@endforeach
<br><br>
	<div style="font-size: 0.8rem">
		<label class="text-primary cursor">Visible</label>
		<label class="text-muted">NO-visible</label>
	</div>
</div>

