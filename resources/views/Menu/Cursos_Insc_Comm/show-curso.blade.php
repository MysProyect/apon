<!-- Modal -->
<div wire:ignore.self class="modal fade" id="CursoShow" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">



   <div class="modal-dialog modal-lg" role="document">
   
    <div class="modal-content modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-header" id="exampleModalLabel">
          <div class="flex">
            <div class="display-5 text-primary text-uppercase" >{{ $title}}</div>&nbsp;&nbsp;&nbsp;
            <div>
              @if($img)
                <img src="{{ $img }}" alt="imagen No disponible" width="200" height="100"/>
              @else
                <img src="{{ asset('images/no-img.png') }}" width="200" height="100"/>
              @endif
            </div>
            
          </div>  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}"  width="50"></span>
            </button>
        </div>
        <div class="modal-body" style="" align="left">       
            <label style="margin-left: 10%; margin-right: 5%; " class="text-center display-5 ">{{$description}}</label>
        </div>
      @if($duration)
        <small class="text-primary display-6"><br>duracion: {{$duration}}</small>
      @endif    
    </div>
  </div>
</div>