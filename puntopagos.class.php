<?php
/**
 * Clases de Punto Pagos
 *
 * @author dvinales & guillehorno
 */

require_once('puntopagos.inc.php');

class PuntoPagos {

    /**
    * Crea la transaccion para después redireccionar a PuntoPagos donde se realizará la selección
    * de el medio de pago
    * @param sring $trx_id Id de la transaccion asignado por la aplicacion cliente
    * @param sring $monto Monto del pago a cobrar a través de PuntoPagos
    * @return array Respuesta
    */

    public static function CrearTransaccion($trx_id, $monto, $email)
    {
        $funcion = 'transaccion/crear';
        $monto_str = number_format($monto, 2, '.', '');
        $data = '{"trx_id":"'.$trx_id.'","monto":"'.$monto_str.'","email":"'.$email.'"}';
        $header_array = PuntoPagos::TraerHeader($funcion, $trx_id, $monto_str);
        return json_decode(PuntoPagos::ExecuteCommand(PUNTOPAGOS_URL.'/'.$funcion, $header_array, $data));
    }
	
    public static function CrearSolicitudPago($trx_id, $medio_pago, $monto, $email, $celular)
    {
        $funcion = 'api/solicitudpago';
        $monto_str = number_format($monto, 2, '.', '');
	//$dt = date("D, d M Y H:i:s", $currentTimeinSeconds)." GMT";
        //$data = '{"fecha_vencimiento":"'.$dt.'","trx_id":"'.$trx_id.'","medio_pago":"'.$medio_pago.'","monto":"'.$monto_str.'"}';
        $data = '{"trx_id":"'.$trx_id.'","medio_pago":"'.$medio_pago.'","monto":"'.$monto_str.'","email":"'.$email.'","celular":"'.$celular.'"}';

	    
        $data = '{"trx_id":"'.$trx_id.'","monto":"'.$monto_str.'","email":"'.$email.'"}';
	$firma = 'solicitudpago/crear';
        $header_array = PuntoPagos::TraerHeader($funcion, $trx_id, $monto_str);
        return json_decode(PuntoPagos::ExecuteCommand(PUNTOPAGOS_URL.'/'.$funcion, $header_array, $data));
    }
	
    /**
    * Captura diferida de un monto de una transacción previamente autorizada 
    * @param string $trx_id Id de la transaccion asignado por la aplicacion cliente
    * @param string $monto Monto del pago a cobrar a través de PuntoPagos
    * @return array Respuesta
    */

    public static function CapturarTransaccion($token, $trx_id, $monto){
        $funcion = 'transaccion/capturar';
        $monto_str = number_format($monto, 2, '.', '');
        $data = '{"trx_id":"'.$trx_id.'","token":"'.$token.'","monto":"'.$monto_str.'"}';
        $header_array = PuntoPagos::TraerHeaderConsulta($funcion, $token, $trx_id, $monto_str);
	echo "$data ", var_dump($data);
	echo "$header_array ", var_dump($header_array);
	    
	    
        return json_decode(PuntoPagos::ExecuteCommand(PUNTOPAGOS_URL.'/'.$funcion, $header_array, $data));
    }
    /**
    * Anula una transacción
    * @param string $trx_id Id de la transaccion asignado por la aplicacion cliente
    * @param string $monto Monto del pago a cobrar a través de PuntoPagos
    * @return array Respuesta
    */

    public static function AnularTransaccion($token, $trx_id, $monto){
        $funcion = 'transaccion/anular';
        $monto_str = number_format($monto, 2, '.', '');
        $data = '{"trx_id":"'.$trx_id.'","token":"'.$token.'","monto":"'.$monto_str.'"}';
        $header_array = PuntoPagos::TraerHeaderConsulta($funcion, $token, $trx_id, $monto_str);

        return json_decode(PuntoPagos::ExecuteCommand(PUNTOPAGOS_URL.'/'.$funcion, $header_array, $data));
    }
	
   /**
    *  Crea la transaccion ya habiendo seleccionado un medio de pago en la aplicacion, haciendo
    * la redireccion correspondiente al medio de pago elegido
    * @param sring $trx_id Id de la transaccion asignado por la aplicacion cliente
    * @param sring $medio_pago Medio de pago elegido por el usuario, segun codificacion disponible en la documentacion de PuntoPagos
    * @param sring $monto Monto del pago a cobrar a través de PuntoPagos
    * @return array Respuesta
    */

    public static function CrearTransaccionMP($trx_id, $medio_pago, $monto, $email, $celular)
    {
        $funcion = 'transaccion/crear';
        $monto_str = number_format($monto, 2, '.', '');
	$currentTimeinSeconds = time() + 86400;
	    
	//$dt = date("D, d M Y H:i:s", $currentTimeinSeconds)." GMT";
        //$data = '{"fecha_vencimiento":"'.$dt.'","trx_id":"'.$trx_id.'","medio_pago":"'.$medio_pago.'","monto":"'.$monto_str.'"}';
        $data = '{"trx_id":"'.$trx_id.'","medio_pago":"'.$medio_pago.'","monto":"'.$monto_str.'","email":"'.$email.'","celular":"'.$celular.'"}';

	$header_array = PuntoPagos::TraerHeader($funcion, $trx_id, $monto_str);
        return json_decode(PuntoPagos::ExecuteCommand(PUNTOPAGOS_URL.'/'.$funcion, $header_array, $data));
    }

    /**
    *  Metodo para consultar el estado de una transacción en particular
    * la redireccion correspondiente al medio de pago elegido
    * @param sring $token Token de la transaccion
    * @param sring $trx_id Id de la transaccion asignado por la aplicacion cliente
    * @param sring $monto Monto del pago de la transaccion a consultar
    * @return array Respuesta
    */

    function ConsultarTransaccion($token, $trx_id, $monto){
        $funcion = 'transaccion';
        $header_funcion = 'transaccion/traer';
        $monto_str = number_format($monto, 2, '.', '');
        $header_array = PuntoPagos::TraerHeaderConsulta($header_funcion, $token, $trx_id, $monto_str);
        return json_decode(PuntoPagos::ExecuteCommandGET(PUNTOPAGOS_URL.'/'.$funcion.'/'.$token, $header_array));
    }
	
    function ConsultarMediosPago(){
        $funcion = 'TransactionService/mediospago';
        $header_funcion = 'mediospago';
        $header_array = PuntoPagos::TraerHeaderMediosPago($header_funcion);
    	echo $header_array;
	$url = PUNTOPAGOS_URL.'/'.$funcion;
	echo $url;
        return json_decode(PuntoPagos::ExecuteCommandGET($url, $header_array));
    }
	
	
    public static function FirmarMensaje($str) {
	if(strlen(PUNTOPAGOS_SECRET) <= 40){
		$signature = base64_encode(hash_hmac('sha1', $str, PUNTOPAGOS_SECRET, true));
        	return "PP ".PUNTOPAGOS_KEY.":".$signature;
	} else {
		$signature = base64_encode(hash_hmac('sha512', $str, PUNTOPAGOS_SECRET, true));
        	return "PP ".PUNTOPAGOS_KEY.":".$signature;
	}
    }

    public static function TraerHeader($funcion, $trx_id, $monto_str)
    {
        $fecha = date("D, d M Y H:i:s", time())." GMT";
        $mensaje = $funcion."\n".$trx_id."\n".$monto_str."\n".$fecha;
        $firma = PuntoPagos::FirmarMensaje($mensaje);
        $header_array = array('Accept: application/json',
                              "Content-Type: application/json; charset=utf-8",
                              'Accept-Charset: utf-8',
                              'Fecha: '. $fecha,
                              'Autorizacion:'.$firma);
        return $header_array;
    }
    
    function TraerHeaderConsulta($funcion, $token, $trx_id, $monto_str) {
	      $fecha = date("D, d M Y H:i:s", time())." GMT";
	      $mensaje = $funcion."\n".$token."\n".$trx_id."\n".$monto_str."\n".$fecha;
	      $firma = PuntoPagos::FirmarMensaje($mensaje);
     	 	$header_array = array('Accept: application/json',
                              "Content-Type: application/json; charset=utf-8",
                              'Accept-Charset: utf-8',
                              'Fecha: '. $fecha,
                              'Autorizacion:'.$firma);
	      return $header_array;
  }

    public static function TraerHeaderMediosPago($funcion)
    {
        $fecha = date("D, d M Y H:i:s", time())." GMT";
        $mensaje = $funcion."\n".$fecha;
        $firma = PuntoPagos::FirmarMensaje($mensaje);
        $header_array = array('Accept: application/json',
                              "Content-Type: application/json; charset=utf-8",
                              'Accept-Charset: utf-8',
                              'Fecha: '. $fecha,
                              'Autorizacion:'.$firma);
        return $header_array;
    }
	
    public static function ExecuteCommand($url, $header_array, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PuntoPagos-curl');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //execute post
        $result = curl_exec($ch);
        $error =  curl_error($ch);
        curl_close($ch);
        if($result){
            return $result;
        }
        else{
            return $error;
        }

    }
    
    public static function ExecuteCommandGET($url, $header_array) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_USERAGENT, 'PuntoPagos-curl');
        //execute get
        $result = curl_exec($ch);
        $error =  curl_error($ch);
        curl_close($ch);
        if($result){
            return $result;
        }
        else{
            return $error;
        }

    }
}
