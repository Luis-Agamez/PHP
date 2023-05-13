<?php

class Database
{
    private $hostname = "localhost";
    private $database = "unicor";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar()
    {
        try {

            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);
         
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }

    function createData(){
        $db = new Database();
        $con = $db->conectar();
        

    }
    function getRoleUser($names,$pass){
        $db = new Database();
        $con = $db->conectar();
        

$comando = $con->prepare("SELECT * FROM users WHERE names = :names");
$comando->execute(['names' => $names]);
$num = $comando->rowCount();
if ($num > 0) {
    $row = $comando->fetch(PDO::FETCH_ASSOC);
   // echo $row['idUser'];
    $query = $con->prepare("SELECT * FROM login_ WHERE Users_id = :idUser AND password_ = :pass");
    $query->execute(['idUser' => $row['idUser'], 'pass' => $pass ]);
    $result = $query->rowCount();
    if ($result > 0) {
      $data = $query->fetch(PDO::FETCH_ASSOC);
       return $data['role_'];

    }else{
        return  'Invalid';
    }
}else{
    return  'Invalid';
}
    }


    function defaultData(){
        $db = new Database();
        $con = $db->conectar();

$comando = $con->prepare("SELECT * FROM users");
$comando->execute();
$comando->fetchAll(PDO::FETCH_ASSOC);
$num = $comando->rowCount();
if($num === 0 ){
    $query = $con->prepare("INSERT INTO users (names,age,sex,addres) VALUES (:names, :age, :sex, :addres)");
    $query->execute(array('names' => 'Luis Agamez', 'age' => '23','sex' => 'Masculino','addres' => 'Calle 19'));

    $query = $con->prepare("INSERT INTO users (names,age,sex,addres) VALUES (:names, :age, :sex, :addres)");
    $query->execute(array('names' => 'Juan Montez', 'age' => '23','sex' =>'Masculino','addres' => 'Calle 45'));

    $query = $con->prepare("INSERT INTO login_ (Users_id,password_,role_) VALUES (:id, :pass, :role_)");
    $query->execute(array('id' => 1, 'pass' => '12345','role_' =>'admin'));

    $query = $con->prepare("INSERT INTO login_ (Users_id,password_,role_) VALUES (:id, :pass, :role_)");
    $query->execute(array('id' => 2, 'pass' => '123456','role_' =>'user'));
}else{

}
        
    }
}
