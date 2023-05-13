<?php

require 'connection.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['names'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $adress = $_POST['addres'];
    $password = $_POST['password'];

    if ($adress == '') {
        $adress = 'Not Address';
    }

    $query = $con->prepare("UPDATE users SET names=?,age=?, sex=?, addres=? WHERE idUser=?");
    $resultado = $query->execute(array($name,$age,$sex, $adress, $id));
    $query = $con->prepare("SELECT * FROM login_ WHERE Users_id = :idUser");
    $query->execute(['idUser' => $id ]);
    $query->fetchAll(PDO::FETCH_ASSOC);
    $num = $query->rowCount();
    if($num > 0){
        $query = $con->prepare("UPDATE login_ SET password_=? WHERE Users_id=?");
        $result = $query->execute(array($password, $id));
    }
    if ($resultado && $result) {
        $correcto = true;
    }
} else {
    $names = $_POST['names'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $addres = $_POST['addres'];
    $password = $_POST['password'];

    if ($addres == '') {
        $addres ='Not Addres';
    }

    $query = $con->prepare("INSERT INTO users (names,age,sex,addres) VALUES (:names, :age, :sex, :addres)");
    $resultado = $query->execute(array('names' => $names, 'age' => $age,'sex' => $sex,'addres' => $addres));

    if ($resultado) {
        $correcto = true;
        $id = $con->lastInsertId();

        $query = $con->prepare("INSERT INTO login_ (Users_id,password_,role_) VALUES (:id, :pass, :role_)");
        $query->execute(array('id' =>$id, 'pass' => $password,'role_' =>'user'));

    }
}
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

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Accion Exitosa</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="adminpage.php">Ir al inico</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>