<?php
require 'connection.php';

$db = new Database();
$con = $db->conectar();

$names = $_POST['names'];
$pass = $_POST['password'];

$role = $db->getRoleUser($names,$pass);

if($role === 'admin'){
require_once('adminpage.php');}
elseif($role === 'Invalid'){
 return  require_once('invalid.php');
}
else{require_once('userpage.php');}










/*$comando = $con->prepare("SELECT * FROM users WHERE names = :names");
$comando->execute(['names' => $names]);
$num = $comando->rowCount();
if ($num > 0) {
    $row = $comando->fetch(PDO::FETCH_ASSOC);
   // echo $row['idUser'];
    $query = $con->prepare("SELECT * FROM login WHERE Users_id = :idUser AND password_ = :pass");
    $query->execute(['idUser' => $row['idUser'], 'pass' => $pass ]);
    $result = $query->rowCount();
    if ($result > 0) {
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if($data['role'] === 'admin'){
            require_once('adminpage.php');
        }else{
            require_once('userpage.php');
        }
    }


}else{
    echo 'Not User';
}*/

?>