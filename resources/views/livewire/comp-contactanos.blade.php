<div>
	<!-- Modal -->
 <div wire:ignore.self class="modal fade" id="contacModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"  aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">   
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            &nbsp;&nbsp;&nbsp;
             Escribenos...!!! <img src="{{asset('images/reg.png')}}"  class="img-msn">
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50" ></span>
          </button>
        </div>

          <div class="modal-body">
         <form wire:submit.prevent="enviar">   
               <div style="display: flex;">               
                   <img src="{{asset('images/icons/name.png')}}" style="width: 15%;">                 
                   <input id="fname" wire:model="name" type="text" placeholder="Nombre" class="form-control">&nbsp;&nbsp;
                   <input id="lname" wire:model="lastname" type="text" placeholder="Apellido" class="form-control">              
               </div>
 
               <div style="margin-top: 3%;display: inline-flex;">  
                   <img src="{{asset('images/icons/asunto.png')}}" style="width: 5%;">
                   <input id="asunto" wire:model="asunto" type="text" placeholder="Asunto" class="asunto form-control" style="padding: 1%; background-color:     #c8eef9; font-weight: bold; font-size: 1.5rem;">
               </div>
                <div style="display: flex; ">  
                   <img src="{{asset('images/icons/email.png')}}" style="width: 8%;">
                   <input id="email" wire:model="email" type="text" placeholder="Email" class="form-control" style="font-weight: bold;" >                        
                </div>
                <div  style="display: flex;  ">
                   <img src="{{asset('images/icons/phone.png')}}" style="width: 15%;">
                   <input id="phone" wire:model="phone" type="text" placeholder="Phone" class="form-control" onkeyUp="return ValNumero(this);" >
                   <img src="{{asset('images/icons/whatsapp.png')}}" style="width: 8%;">
                   <input id="wp" wire:model="whatsapp" type="text" placeholder="whatsapp" class="form-control">
                </div>
                <div style="display: flex;  vertical-align: top;  ">
                   <img src="{{asset('images/icons/edit-doc.png')}}"  style="width: 30%;">
                   <textarea class="form-control" id="message" wire:model="message" placeholder="Ingrese su masaje para nosotros aquí. Nos comunicaremos con usted en un plazo de 2 días hábiles." rows="7"></textarea>
                </div>
                <div class="form-group">
                        @error('name')
                            <span class="alert-danger">Nombre</span>
                        @enderror
                        @error('asunto')
                            <span class="alert-warning">Motivo del mensaje 'asunto'</span>
                        @enderror
                        @error('email')
                            <span class="alert-danger"> Email no valido</span>
                        @enderror
                        @error('phone')
                            <span class="alert-warning">{{$message}}</span>
                        @enderror
                        @error('message')
                            <span class="alert-danger">Escriba el mensaje</span>
                        @enderror
                </div>
              
            @if (session('mensaje'))      
                <div class="alert alert-success">             
                    {{ session('mensaje') }}
                </div>
              @endif
              
            
          

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        
                            </div>
                              <img src="{{asset('images/icons/clear.png')}}" wire:click="clear" class="img-clear" style="cursor: pointer;"  title="borrar">
                        </div>
                   
                </form>

 
    </div>
  </div>
</div>
</div>
