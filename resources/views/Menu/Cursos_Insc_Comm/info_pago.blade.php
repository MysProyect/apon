
<img src="{{asset('images/icons/info-pagos.png')}}" title="Informacion sobre pago" data-toggle="modal" data-target="#exampleModal-pago" style="cursor: pointer; width: 50%; height: 70%;">
 


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal-pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   
    <div class="modal-content">
        <div class="modal-header">
           <h5 class="display-4 text-primary text-center" id="exampleModalLabel">Inf. Pagos &nbsp;&nbsp;&nbsp;
            <img src="{{asset('images/Fpagos.png')}}" width="200" height="100"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true close-btn"><img src="{{asset('images/icons/close.png')}}" width="50"></span>
          </button>
        </div>

      <div class="modal-body" style="" align="left">
           
        <button class="btn btn-success bt-lg">1,00 $</button>
          <div>FORMAS DE PAGO
          <label>
          Disponemos de las siguientes formas de pago:

          <ul>
            <li>Tarjeta de crédito</li>
            <li>PayPal</li>
            <li>Transferencia bancaria o ingreso en la cuenta bancaria</li>
            <li>Contra reembolso</li>
          </ul>

          Los métodos de pago más rápidos y seguros que garantizan que tu pedido se procesará de forma inmediata son tarjeta de crédito/débito o PayPal.

          Recuerda que las transferencias bancarias pueden tardar hasta 3 días, lo que retrasa la gestión de pedido. Por eso si necesitas el pedido urgente, siempre aconsejamos pagar con tarjeta o PayPal.
          </label>
          </div>

      </div>
    </div>
  </div>
</div>
