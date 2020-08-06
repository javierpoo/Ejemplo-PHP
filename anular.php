<?php
require_once('puntopagos.class.php');

$token = $_POST["token"];
$trx_id = $_POST["trx_id"];
$monto = $_POST["monto"];

// Llamamos a la API para consulta la transaccion.
$respuesta = PuntoPagos::AnularTransaccion($token, $trx_id, $monto);
echo "Respuesta ", var_dump($respuesta);
