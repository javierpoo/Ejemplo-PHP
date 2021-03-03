<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simulador PuntoPagos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
  <h2>Simulador PuntoPagos</h2>
  <div>
    Fecha: <?php echo  date("D, d M Y H:i:s", time())." GMT"; ?>
  </div>
  
  <form action="crear.php" method="post">

    <div class="form-group">
      <label for="trx_id">Id Transacción:</label>
      <input type="text" class="form-control" id="trx_id" placeholder="Enter password" value="<?php echo  rand(1, 1000000); ?>" name="trx_id">
    </div>
    
    <div class="form-group">
      <label for="monto">Monto:</label>
      <input type="text" class="form-control" id="monto" placeholder="Enter password" value="<?php echo  rand(10000, 100000); ?>" name="monto">
    </div>

    <div class="form-group">
    <label for="mediopago1">Medio Pago</label>
    <select class="form-control" id="mediopago1" name="mediopago1">
      <option value="">Ninguno</option>
      <option value="3">Webpay</option>
      <option value="5">BCI</option>
      <option value="7">BancoEstado</option>
      <option value="10">Ripley (Chek)</option>
      <option value="21">Hites</option>
      <option value="22">Mi Pago</option>
      <option value="23">BancoEstado Multicanal</option>
      <option value="25">Millas Latam</option>
      <option value="26">Mach</option>
      <option value="27">Chek</option>
      <option value="28">Sweetpay</option>
      <option value="29">Captura Diferida TBK</option>
      <option value="31">Puntos CMR</option>
      <option value="32">Scotiabank</option>

      <option value="33">PSP Todo</option>

      <option value="34">PSP Diferida</option>

      <option value="61">PSP Crédito</option>
      <option value="62">PSP Débito</option>
      
    </select>
  </div>
   <div class="form-group">  
    E-mail opcional: <input type="email" name="email">
   </div> 
   <div class="form-group">  
    Celular opcional: <input type="celular" name="celular">
   </div> 
   <button type="submit" class="btn btn-default">Submit</button>
  
  </form>
</div>

</body>
</html>
