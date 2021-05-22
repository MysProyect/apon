		<div align="center">
			<img src="{{asset('images/reg.png')}}" width="150" height="100">  
	 		<h1 class="title-op">Detaills</h1>
	 	</div>
	<div align="center">
		

	  <h1 class="display-7 text-primary text-center"> {{$CursSelec->title}}</h1>
    <br>

    <label> <i class="text-success">confirmados</i>, <i class="text-muted">no confirnados</i></label><br><br>
    @foreach($parts as $part)
       @foreach($All_inscs as $index=>$insc)
        
          @if(($part->id == $insc->part_id) && ($CursSelec->id == $insc->curso_id))
           
            @if($insc->conf == 1)
                <li class="text-success">              
                    <label>
                       {{$part->name}}{{$part->last_name}}
                      <img src="{{asset('images/icons/checked.png')}}" width="30"></label>
                </li>            
            @else
                <li class="text-muted">              
                    {{$part->name}}{{$part->last_name}}
                </li>
           @endif
           
          @endif
        @endforeach
      @endforeach
  



  <img src="{{asset('images/icons/close.png')}}" wire:click="default"   class="img-clear close cursor"  title="cerrar">
  </div>


