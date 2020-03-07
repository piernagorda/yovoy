<?php
session_start();

$username = $_REQUEST["username"];
$passwd = $_REQUEST["passwd"];
$passwdConfirm = $_REQUEST["passwdConfirm"];
$name = $_REQUEST["name"];

$creationDate = date("Y-m-d");
$imgPath = NULL;
$isPremium = 0;
$type = 0;

//ASEGURAMOS QUE NO DEJAMOS HUECOS EN EL FORMULARIO
if($username == "" || $passwd == ""  || $passwdConfirm == "" || $name == ""){
    $_SESSION["noBlanks"] = false;
    header("Location: /register.php");
}

//ASEGURAMOS QUE LAS CONTRASEÑAS SEAN IGUALES
else if($passwd != $passwdConfirm){
    $_SESSION["validPass"] = false;
    $_SESSION["noBlanks"] = true;
    $_SESSION["login"] = false;
    $_SESSION["newUser"] = false;
    header("Location: /register.php");
}

else {

    include 'mySQLConnection.php';

        $_SESSION["validPass"] = true;
        $_SESSION["noBlanks"] = true;
        $_SESSION["login"] = true;
        $_SESSION["newUser"] = true;
        $_SESSION["username"] = $username;

        $getUserID = "SELECT COUNT(user_id) AS num FROM user";
        $result = $conn->query($getUserID);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_id = $row["num"] + 1; //OBTENEMOS EL USER_ID A PARTIR DEL 
                                            //NUMERO DE USUARIOS REGISTRADOS
                                            //(SUPONEMOS QUE NO BORRAMOS USUARIOS)
            }
        } 
  
        $registerUser= "INSERT INTO user VALUES(" 
            ."'".$user_id."'". "," 
            ."'".$username."'". "," 
            ."'".$passwd."'". "," 
            ."'".$creationDate."'". ","
            ."'".$name."'". ","
            ."'".$imgPath."'". ","
            ."'".$isPremium."'". ","
            ."'".$type."'". ");";

        if ($conn->query($registerUser) === true) {
            header("Location: /index.php");
        } 
        else {
            $_SESSION["userInDB"] = true;
            header("Location: /register.php");
        }
    
    $conn->close();
}

?>
