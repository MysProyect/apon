
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
   
  <div class="modal-content">
      <div class="modal-header">
         <h5 class="display-5 text-primary" id="exampleModalLabel">Nuevo Participante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50"></span>
        </button>
      </div>

    <div class="modal-body">    

	@include('Admin.participants.form')
    </div>






<!-- <style type="text/css">

/* Etiquetas para entradas marcadas */
input:checked + label {
  color:  #409009;
}


/* Elemento Checkbox, cuando está marcado */
input[type="checkbox"]:checked {
  box-shadow: 0 0 0 3px hotpink;
}

</style> -->

   
     

</div>
</div>
</div>
<script src="{{ asset('js/validar.js') }}"></script>