@extends('layouts.app')
@section('title','- Inscription ')
@section('content')



 <div class="title text-center display-5 spad" >
		Inscription's | valid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{route('Admin')}}" title="salir">
			<img src="{{asset('images/icons/close.png')}}"   class="img-close-2 close cursor"  title="salir">
		</a>
</div>	
	
  <div>@livewire('inscription-comp')</div>
       



@endsection

