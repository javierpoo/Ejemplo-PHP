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
  
  <form action="consultar.php" method="post">

    <div class="form-group">
      <label for="token">Token PuntoPagos</label>
      <input type="text" class="form-control" id="trx_id" placeholder="Enter password" name="trx_id">
    </div>

    <div class="form-group">
      <label for="trx_id">Id Trx Cliente</label>
      <input type="text" class="form-control" id="trx_id" placeholder="Enter password" name="trx_id">
    </div>
    
    <div class="form-group">
      <label for="monto">Monto:</label>
      <input type="text" class="form-control" id="monto" placeholder="Enter password" name="monto">
    </div>

    <div class="form-group">

  </div>
   <div class="form-group">  
    E-mail opcional: <input type="email" name="email">
   </div> 
   <button type="submit" class="btn btn-default">Submit</button>
  
  </form>
</div>

</body>
</html>
