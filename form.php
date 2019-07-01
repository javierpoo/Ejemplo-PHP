<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="welcome.php" method="post">

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
    <select class="form-control" id="mediopago1">
      <option value="">Ninguno</option>
      <option value="3">Webpay</option>
      <option value="10">Ripley</option>
      <option value="21">BancoEstado Multicanal</option>
    </select>
  </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  
  </form>
</div>

</body>
</html>
