<?php
include_once('MySQLConnection.php');
include_once('UserDAO.php');
include_once('User.php');
session_start();

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$mysql = new MySQLConnection();
$conn = $mysql->connect(); 
$userDAO = new UserDAO();

//OBTENEMOS USUARIO Y CONTRASEÑA DESDE LA BASE DE DATOS
if ($userDAO->userExists($conn, $username)) {
    $user = $userDAO->loginUser($conn, $username, $password);
} 

//ERROR CUANDO EL USUARIO NO ESTÁ REGISTRADO
else {
    $_SESSION["login"] = false;
    $_SESSION["userInDB"] = false;
   
    header("Location: /login.php");
}

//ERROR CUANDO DEJAMOS EL FORMULARIO EN BLANCO
if($username == "" || $password == ""){
    $_SESSION["login"] = false;
    $_SESSION["userInDB"] = false;
    header("Location: /login.php");
}

//ERROR CUANDO EXISTE EL USUARIO Y LA CONTRASEÑA ES INCORRECTA
else if($username == $user->getUsername() && $password != $user->getPassword()){
    $_SESSION["login"]= false;
    $_SESSION["userInDB"] = true;
    $_SESSION["correctPass"] = false;
    header("Location: /login.php");
}

//ACCESO CUANDO EL USUARIO EXISTE Y LA CONTRASEÑA ES CORRECTA
else if($username == $user->getUsername() && $password == $user->getPassword()){
    $_SESSION["login"] = true;
    $_SESSION["userInDB"] = true;
    $_SESSION["correctPass"] = true;
    $_SESSION["name"] = $user->getName();
    header("Location: /index.php");
}
?>

