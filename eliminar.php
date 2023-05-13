<?php

require 'connection.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$data = $con->prepare("SELECT * FROM login_ WHERE Users_id = :id");
$data->execute(['id' => $id]);
$num = $data->rowCount();
if ($num > 0) {
    $row = $data->fetch(PDO::FETCH_ASSOC);
    $idLogin = $row['idLogin'];
    $query = $con->prepare("DELETE FROM login_ WHERE idLogin=?");
    $query->execute([$idLogin]);
    $query = $con->prepare("DELETE FROM users WHERE idUser=?");
    $query->execute([$id]);
    $numElimina = $query->rowCount();

} else {

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($numElimina > 0) { ?>
                        <h3>Registro eliminado</h3>
                    <?php } else { ?>
                        <h3>Error al eliminar registro</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="adminpage.php">Ir al inicio</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>