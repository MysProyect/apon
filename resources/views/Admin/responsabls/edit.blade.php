<!-- Modal -->
 <div wire:ignore.self class="modal fade" id="EditRespModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"  aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
    <div class="modal-content">
        <div class="modal-header">
         <img src="{{asset('images/icons/ver-edit.png')}}" class="img-AddEdit">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn">
             	<img src="{{asset('images/icons/close.png')}}" width="50" ></span>
          </button>
        </div>

          <div class="modal-body">
         <form wire:submit.prevent="store" > 
			

			@include('Admin.responsabls.form')
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
