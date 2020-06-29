<?php
require_once('puntopagos.class.php');

// Llamamos a la API para consultar medios de pago.
$respuesta = PuntoPagos::ConsultarMediosPago();
echo "Respuesta ", var_dump($respuesta);
