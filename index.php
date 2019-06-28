<?php
require_once('puntopagos.class.php');
// A efectos de prueba creamos un id de transaccion y monto aleatorios
$trx_id = rand(1, 1000000);
$monto = rand(10000, 100000);
// Llamamos a la API para crear la transaccion. Esto nos devuelve la respuesta con el estado
// y el valor del token que identificará la transaccion de aquí en mas
echo "PUNTOPAGOS_KEY:", PUNTOPAGOS_KEY;
echo "PUNTOPAGOS_SECRET:", PUNTOPAGOS_SECRET;


echo "Enviando TRX a PuntoPagos monto ", $monto, " trx_id ", $trx_id;
$respuesta = PuntoPagos::CrearTransaccion($trx_id, $monto);
echo "Respuesta ", $respuesta;

if ($respuesta->{'token'} != null){
    // Esta es la URL a redirigir al cliente para que continue y efectue el pago en el medio que corresponde
    $url = PUNTOPAGOS_URL."/transaccion/procesar/".$respuesta->{'token'};
    ob_start();
    header("Location: $url");
    ob_flush();
}
else{
    echo $respuesta->{'error'};
}
