<?php

session_start();

$username = $_REQUEST["username"];
$passwd = $_REQUEST["passwd"];
$loginUsername="";
$loginPasswd="";

include "mySQLConnection.php";

//OBTENEMOS USUARIO Y CONTRASEÑA DESDE LA BASE DE DATOS
$loginUser = "SELECT username, password FROM user WHERE username =" ."'".$username."'";
$result = $conn->query($loginUser);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $loginUsername = $row["username"];
        $loginPasswd = $row["password"];
    }
} 

//ERROR CUANDO EL USUARIO NO ESTÁ REGISTRADO
else {
    $_SESSION["login"] = false;
    $_SESSION["userInDB"] = false;
   
    header("Location: /login.php");
}
$conn->close();

//ERROR CUANDO DEJAMOS EL FORMULARIO EN BLANCO
if($username == "" || $passwd == ""){
    $_SESSION["login"] = false;
    $_SESSION["userInDB"] = false;
    header("Location: /login.php");
}

//ERROR CUANDO EXISTE EL USUARIO Y LA CONTRASEÑA ES INCORRECTA
else if($username == $loginUsername && $passwd != $loginPasswd){
    $_SESSION["login"]= false;
    $_SESSION["userInDB"] = true;
    $_SESSION["correctPass"] = false;
    header("Location: /login.php");
}

//ACCESO CUANDO EL USUARIO EXISTE Y LA CONTRASEÑA ES CORRECTA
else if($username == $loginUsername && $passwd == $loginPasswd){
    $_SESSION["login"] = true;
    $_SESSION["userInDB"] = true;
    $_SESSION["correctPass"] = true;
    $_SESSION["username"] = $loginUsername;
    header("Location: /index.php");
}
?>

