<?php
require_once('puntopagos.class.php');
// A efectos de prueba creamos un id de transaccion y monto aleatorios
$token = $_POST["token"];
$trx_id = $_POST["trx_id"];
$monto = $_POST["monto"];

// Llamamos a la API para consulta la transaccion.
$respuesta = PuntoPagos::ConsultarTransaccion($token, $trx_id, $monto);
echo "Respuesta ", var_dump($respuesta);

