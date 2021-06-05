  <div align="center">
      <img src="{{asset('images/reg.png')}}" width="100">  
       <h1 class="display-6 text-primary text-center">{{$CursSelec->title}}</h1> 
         
  </div>   
 

    @if (session('alert'))
          <div class="alert alert-danger">   
             {{ session('alert') }}
          </div>
    @endif
       @if (session('conf'))
          <div class="alert alert-success">             
            {{ session('conf') }}
          </div>
         @endif

  <div class="contenedor-div"> 
    @if($Insc->count())
      <div class="display-6 text-center ">Aspirantes:</div><br>
       @foreach($Insc as $in) 
       <div  class="form-group" style="border-bottom-color: red 1px;">
            @if($in->conf == 1)
                  <div class="text-success" style="width:  80%">
                    <img src="{{asset('images/icons/checked.png')}}" width="30">  
                    {{$in->part['name']}} {{$in->part['last_name']}} 

                                           
                        <!--   <input type="checkbox" name="conf[]" wire:model="insc_id" 
                          wire:click="saveconf({{ $in->id }})" id="conf" value="{{$in->id}}" > -->            
                       <!--   <input type="button" value="x" wire:click="destroy({{ $in->id }})" class="btn btn-danger" style=" float: right;">  -->
                  </div>  
             
              @else                 
                   <div class="" style="width:90%;"> 

                    <input type="checkbox"  name="conf[]" wire:model="insc_id" wire:click="saveconf({{ $in->id }})" id="conf" value="{{$in->id}}" onclick="conf()" title="validar">
                    {{$in->part['name']}} {{$in->part['last_name']}} 
                     <input type="button" value="x" wire:click="destroy({{ $in->id }})" class="btn btn-danger" style=" float: right;">  </div> 
                  <!--   <input type="button" value="x" wire:click="destroy({{ $in->id }})" class="btn btn-warning" style=" float: right;"> -->
                 
              
              @endif 
               </div>     
      @endforeach
    <input type="text" wire:model="CursSelec" name="curso" style="visibility: hidden;" value="{{$CursSelec->id}}">
   

    <div align="center">  
      <a href="{{route('ConfPDF',$CursSelec->id)}}" class="nav-link" title="Ver | download"><img src="{{asset('images/icons/PDF.png')}}" class="img-icon"></a>
    </div>



@else
  <div class="text-center text-danger display-6">'0' regs por conf. </div>
@endif

</div>
<div align="center">
   <img src="{{asset('images/icons/close.png')}}" wire:click="default"   class="img-close close cursor"  title="cerrar">
</div>
