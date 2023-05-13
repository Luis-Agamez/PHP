<?php
require 'connection.php';
$db = new Database();
$con = $db->defaultData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="vh-100 bg-white ">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
  
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="redirect.php" autocomplete="off" >
          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form1Example13">Nombres</label>
            <input type="text" id="names" name="names" class="form-control form-control-lg" />
          </div>
          <!-- Password input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" />
            
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>
