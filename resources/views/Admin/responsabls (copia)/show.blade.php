 <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"  aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
   
    <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Informacion Registrada
            &nbsp;&nbsp;&nbsp;
              <img src="{{asset('images/reg.png')}}"  class="img-msn">
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50" ></span>
          </button>
        </div>

       
        <div style="margin-left: 10%"class="modal-body">
         
              <div class="text-center">{{$cedula}}</div>
              <div class="display-6">
                <strong>{{$name}} &nbsp;
               {{$last_name}}</strong></div><br>
              <div >Email:<strong class="text-primary">{{$email}}</strong></div>
              @if($phone)
                <div >Telefono:<strong class="text-primary">{{$phone}}</strong></div>
              @endif
              @if($NroWp)
                <div><img src="{{asset('images/icons/whatsapp.png')}}">&nbsp;&nbsp;<strong class="text-primary">{{$NroWp}}</strong></div>
              @endif
        </div>

                

       </div>
 
    </div>
  </div>
</div>