<?php 
require_once('connection.php');
$db = new Database();
$con = $db->conectar();

$activo = 1;

$comando = $con->prepare("SELECT * FROM users");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Personas
                    <a href="index.php" class="btn btn-danger float-right mr-10">Salir</a>
                        <a href="nuevo.php" class="btn btn-primary  ms-1">Nuevo</a>
                      
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Direccion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['idUser']; ?></td>
                                    <td><?php echo $row['names']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td><?php echo $row['sex']; ?></td>
                                    <td><?php echo $row['addres']; ?></td>
                                    <td><a href="editar.php?id=<?php echo $row['idUser']; ?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $row['idUser']; ?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>



