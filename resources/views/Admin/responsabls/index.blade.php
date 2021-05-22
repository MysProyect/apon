@extends('layouts.app')
@section('title','- Responsabls ')
@section('content')

 <div class="title text-center display-5" >
		Responsabl's / Facilitador's&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{route('Admin')}}" title="salir">
			<img src="{{asset('images/icons/close.png')}}"   class="img-close-2 close cursor"  title="salir">
		</a>
</div>	
	@livewire('responsabls-component')

@endsection
