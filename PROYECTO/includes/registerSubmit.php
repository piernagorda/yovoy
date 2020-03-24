<?php
include_once('MySQLConnection.php');
include_once('UserDAO.php');

session_start();

//Valores introduciodos por el usuario
$email = $_REQUEST["email"];
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$passwordConfirm = $_REQUEST["passwordConfirm"];
$name = $_REQUEST["name"];
$img = $_REQUEST["img"];

//Valores por defecto
$creationDate = date("Y-m-d");
$type = 1;

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
	
	// Si hay un foto subido por el usuario
	if (isset($_FILES["img"])){
		$targetDir = "includes/img/usuarios/";
		$imgName = basename($_FILES["img"]["name"]);
		$targetFilePath = $targetDir . $imgName;
		
		// Mover el foto al directorio de fotos de usuarios
		if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
			//Añadir el usuario a la BBDD
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
	// Si no hay foto, se usa default.jpg
	else{
		$imgName = "default.jpg"
		
		//Añadir el usuario a la BBDD
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
}

?>
