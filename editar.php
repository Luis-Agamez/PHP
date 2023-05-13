<?php
require 'connection.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$comando = $con->prepare("SELECT * FROM users WHERE idUser = :id");
$comando->execute(['id' => $id]);
$data = $con->prepare("SELECT * FROM login_ WHERE Users_id = :id");
$data->execute(['id' => $id]);
$num = $comando->rowCount();
if ($num > 0) {
    $row = $comando->fetch(PDO::FETCH_ASSOC);
} else {}

if ($num > 0) {
    $row_login = $data->fetch(PDO::FETCH_ASSOC);
} else {}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-1">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Editar registro</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-6" method="POST" action="guarda.php" autocomplete="off">
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-8">
                            <label for="names" class="form-label">Nombre</label>
                            <input type="text" id="names" name="names" class="form-control" value="<?php echo $row['names']; ?>" required autofocus>
                        </div>

                        <div class="col-md-4">
                            <label for="age" class="form-label">Edad</label>
                            <input type="text" id="age" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
                        </div>

        
                        </div>

                        <div class="col-md-2">
                            <label for="sex" class="form-label">Sexo</label>
                            <input type="text" id="sex" name="sex" value="<?php echo $row['sex']; ?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-20">
                            <label for="addres" class="form-label">Direccion</label>
                            <input type="text" id="addres" name="addres" value="<?php echo $row['addres']; ?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-20">
                            <label for="addres" class="form-label">Password</label>
                            <input type="text" id="password" name="password" value="<?php echo $row_login['password_']; ?>" class="form-control">
                        </div>
                       

                        <div class="col-md-12 p-3">
                            <a class="btn btn-secondary" href="adminpage.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>