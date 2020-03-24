<?php
include_once('MySQLConnection.php');
include_once('UserDAO.php');

session_start();

//Valores introduciodos por el usuario
$name = $_REQUEST["name"];
$img = $_REQUEST["img"];

// NOTA: Todos los campos del formulario son opcionales

//INICIAMOS CONEXIÓN CON MYSQL

$mysql = new MySQLConnection();
$conn = $mysql->connect();

$userDAO = new UserDAO();


// Si hay un nombre como entrada, cambiar el nombre del usuario
if (isset S_)

// Si hay un foto subido por el usuario, cambiarlo
if (isset($_FILES["img"])){
	$targetDir = "includes/img/usuarios/";
	$imgName = basename($_FILES["img"]["name"]);
	$targetFilePath = $targetDir . $imgName;
	
	// Si el foto anterior no es default.jpg, borrarlo
	
	// Mover el foto al directorio de fotos de usuarios
	if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
		//TAREA: Actualizar el usuario en la BBDD
		if ($userDAO->registerUser($conn, $email, $username, $password, $creationDate, $name, $imgName, $type) === true) {
			header("Location: /index.php");
		} 
		else {
			$_SESSION["userInDB"] = true;
			$_SESSION["login"] = false;
			echo "Error: " . $registerUser . "<br>" . $conn->error;
			header("Location: /register.php");
		}
	}
	else{
		echo "Error: Se produjo un error al subir su foto"
	}
}




?>
