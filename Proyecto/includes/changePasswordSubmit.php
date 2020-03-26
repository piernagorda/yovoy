<?php
include_once('MySQLConnection.php');
include_once('UserDAO.php');
include_once('User.php');
session_start();

//Valores introduciodos por el usuario
$currPass = $_REQUEST["currPass"];
$currPassConfirm = $_REQUEST["currPassConfirm"];
$newPass = $_REQUEST["newPass"];
$newPassConfirm = $_REQUEST["newPassConfirm"];

$username = $_SESSION["username"];

//INICIAMOS CONEXIÓN CON MYSQL

$mysql = new MySQLConnection();
$conn = $mysql->connect();

$userDAO = new UserDAO();
$user = $userDAO->getUser($conn, $_SESSION["username"]);

// Asegurar que todos los campos tengan texto
if ($currPass == "" || $currPassConfirm == "" || $newPass == "" || $newConfirm == "" ){
	$_SESSION["changePassStatus"] = "ERROR: Asegura que ninguno de los campos esté vacío";
}

// Comprobar las contraseñas
else if ($currPass != $currPassConfirm){
	$_SESSION["changePassStatus"] = "ERROR: Asegura que las contraseñas actuales sean iguales";
}
else if ($newPass != $newPassConfirm){
	$_SESSION["changePassStatus"] = "ERROR: Asegura que las contraseñas nuevas sean iguales";
}
else if ($user->getPassword() != $currPass){
	$_SESSION["changePassStatus"] = "ERROR: Contraseña actual incorrecta"
}

// Actualizar el usuario a la BBDD
else{
	if (!$userDAO->changePassword($conn, $username, $newPass)){
		$_SESSION["changePassStatus"] = "ERROR: Se produjó un error al cambiar su contraseña"
	}
	else{
		$_SESSION["changePassStatus"] = "Has cambiado su contraseña con éxito";
	}
}

header("Location: /Yovoy/Proyecto/editProfile.php");


?>
