 

   <div wire:ignore.self class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
   
    <div class="modal-content">
        <div class="modal-header">
           <h5 class="display-4 text-primary text-center" id="exampleModalLabel">¡Comentanos! &nbsp;&nbsp;&nbsp;
              <img src="{{asset('images/icons/comment.png')}}"  class="img-msn">
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50" wire:click="close"></span>
          </button>
        </div>
    


    <div class="modal-body">               
        <form wire:submit.prevent="savecomment">
        <div class="form-group">
           <input type="text" wire:model="nameCom" placeholder="name" class="form-control" autofocus>
              @error('nameCom') <span class="text-danger error">enter name</span>@enderror
           <input type="text" wire:model="emailCom" class="form-control" placeholder="email@example.com">
              @error('emailCom') <span class="text-danger error">enter a valid email</span>@enderror
   
            <br><br>
            <textarea  wire:model="comment" id="comment" align="center" class="form-control"  placeholder="enter commentt" autocomplete="off"> 
            </textarea>        
               @error('comment') <span class="text-danger error">enter comment</span>@enderror                   
        </div>            
        <input type="text" wire:model="curso_id" value="{{$curso->id}}" class="toast hide" >
        <div align="center"> 
          <button type="submit" class="btn btn-primary btn-block" >Enviar</button>
<!--        <button wire:click="savecomment" class="btn btn-primary" >Enviar</button> -->

          <img src="{{asset('images/icons/clear.png')}}" wire:click="clear"  class="img-clear" style="cursor: pointer;"  title="borrar"> 
        </div>

            
    </form>          

    </div>
 
    </div>
  </div>
</div>