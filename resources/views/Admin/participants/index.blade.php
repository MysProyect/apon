@extends('layouts.app')
@section('title','- Participants ')
@section('content')


	  
	<div class="text-center text-primary-2 display-4 spad" >
		Participant's&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{route('Admin')}}" title="salir">
			<img src="{{asset('images/icons/close.png')}}"   class="img-close-2 close cursor"  title="salir">
		</a>
	</div> 


@livewire('participants-component')


@endsection
