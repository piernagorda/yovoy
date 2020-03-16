<?php
include_once('MySQLConnection.php');
include_once('UserDAO.php');

session_start();

//Valores introduciodos por el usuario
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$passwordConfirm = $_REQUEST["passwordConfirm"];
$name = $_REQUEST["name"];
$img = $_REQUEST["img"];

//Valores por defecto
$creationDate = date("Y-m-d");
$imgPath = NULL;
$isPremium = 0;
$type = 0;

//ASEGURAMOS QUE NO DEJAMOS HUECOS EN EL FORMULARIO
if($username == "" || $password == ""  || $passwordConfirm == "" || $name == ""){
    $_SESSION["noBlanks"] = false;
    header("Location: /register.php");
}

//ASEGURAMOS QUE LAS CONTRASEÑAS SEAN IGUALES
else if($password != $passwordConfirm){
    $_SESSION["validPass"] = false;
    $_SESSION["noBlanks"] = true;
    $_SESSION["login"] = false;
    $_SESSION["newUser"] = false;
    header("Location: /register.php");
}

else { //INICIAMOS CONEXIÓN CON MYSQL

    $mysql = new MySQLConnection();
    $conn = $mysql->connect();

    $userDAO = new UserDAO();

    $_SESSION["validPass"] = true;
    $_SESSION["noBlanks"] = true;
    $_SESSION["login"] = true;
    $_SESSION["newUser"] = true;
    $_SESSION["name"] = $name;

    if ($userDAO->registerUser($conn, $username, $password, $creationDate, $name, $imgPath, $isPremium, $type, $img) === true) {
        header("Location: /index.php");
    } 
    else {
        $_SESSION["userInDB"] = true;
        $_SESSION["login"] = false;
        echo "Error: " . $registerUser . "<br>" . $conn->error;
        header("Location: /register.php");
    }
}

?>
