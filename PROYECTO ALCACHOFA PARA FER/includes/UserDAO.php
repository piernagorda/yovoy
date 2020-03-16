<?php

include_once('User.php');

class UserDAO{

    public function registerUser($conn, $username, $password, $creationDate, $name, $imgPath, $isPremium, $type, $img){
        $getUserID = "SELECT COUNT(user_id) AS num FROM user";
        $result = $conn->query($getUserID);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_id = $row["num"] + 1; //OBTENEMOS EL USER_ID A PARTIR DEL 
                                            //NUMERO DE USUARIOS REGISTRADOS
                                            //(SUPONEMOS QUE NO BORRAMOS USUARIOS)
            }
        } 
        
        //VALORES A INSERTAR EN LA BBDD
        $queryValues = 
             "'".$user_id."'". "," 
            ."'".$username."'". "," 
            ."'".$password."'". "," 
            ."'".$creationDate."'". ","
            ."'".$name."'". ","
            ."'".$imgPath."'". ","
            ."'".$isPremium."'". ","
            ."'".$type."'". ","
            ."'".$img."'";

        $registerUser= "INSERT INTO user VALUES(".$queryValues.");";

        return $conn->query($registerUser);
    }

    public function userExists($conn, $username){
        $loginUserQuery = "SELECT username FROM user WHERE username =" ."'".$username."'";
        $result = $conn->query($loginUserQuery);

        return $result->num_rows > 0;
    }

    public function loginUser($conn, $username, $password){
        $loginUserQuery = "SELECT * FROM user WHERE username =" ."'".$username."'";
        $result = $conn->query($loginUserQuery);

        while($row = $result->fetch_assoc()) {
            $user_id = $row["user_id"];
            $username = $row["username"];
            $password = $row["password"];
            $creationDate = $row["creationDate"];
            $imgPath = $row["imgPath"];
            $name = $row["name"];
            $type = $row["type"];
            $isPremium = $row["isPremium"];
            $img = $row["img"];
        }

        return new User($user_id, $username, $password, $creationDate, $name, $imgPath, $isPremium, $type, $img);
    }
}
?>
