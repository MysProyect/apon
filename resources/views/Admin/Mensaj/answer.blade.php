<div style="width:60%;">
 
    <form wire:submit.prevent="send">
        <div>       
            <img src="{{asset('images/icons/answer.png')}}" class="img-answer" > 
        </div>           
            <textarea wire:model="message" class="form-control" placeholder="indique respuesta/volver a responder" id="message" rows="7" cols="50"></textarea>
  

        
<!--         <input type="text" wire:model="email">
        <input type="text" wire:model="name"> -->
        <button type="submit" class="btn btn-primary bt-save btn-block" style="cursor: progress;">Enviar
        </button>           

        <img src="{{asset('images/icons/clear.png')}}" wire:click="clear" class="img-clear" style="cursor: pointer;" title="limpiar" >
        
    </form> 
</div>
