 <? php 
require_once 'application/APIMercadoPago/vendor/autoload.php';  


class Controller_MercadoPago extends Controller{
     
    public function generarPago()
    {
       MercadoPago \ SDK :: setAccessToken (4659139758659336,'aovLAubnOQ4wb6Nce57id88N8iz2BOjc');

    $ pago  =  nuevo  MercadoPago \ Pago ();

    $ pago -> transaction_amount  =  141 ; 
    $ pago -> token = " YOUR_CARD_TOKEN " ; $ pago -> descripción = " Camisa de seda ergonómica " ; $ pago -> cuotas = 1 ; $ payment -> payment_method_id = " visa " ; $ pago -> payer = array ( " email " => " larue.nienow@hotmail.com ");

    $ pago -> guardar ();

    echo  $ pago -> estado ;
    }
   

  }

  ?>