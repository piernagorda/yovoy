<?php

include_once('User.php');

class UserDAO{

    public function registerUser($conn, $email, $username, $password, $creationDate, $name, $imgName, $type){        
        //VALORES A INSERTAR EN LA BBDD
        $queryValues = 
             "'".$email."'". "," 
            ."'".$username."'". "," 
            ."'".$password."'". "," 
            ."'".$creationDate."'". ","
            ."'".$name."'". ","
            ."'".$imgName."'". ","
            ."'".$type."'";

        $registerUser= "INSERT INTO user VALUES(".$queryValues.");";

        return $conn->query($registerUser);
    }

    public function userExists($conn, $username){
        $loginUserQuery = "SELECT username FROM user WHERE email =" ."'".$email."';";
        $result = $conn->query($loginUserQuery);

        return $result->num_rows > 0;
    }

    public function loginUser($conn, $username, $password){
        $loginUserQuery = "SELECT * FROM user WHERE email =" ."'".$email."';";
        $result = $conn->query($loginUserQuery);

        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $username = $row["username"];
            $password = $row["password"];
            $creationDate = $row["creationDate"];
            $imgName = $row["Name"];
            $name = $row["name"];
            $type = $row["type"];
        }

        return new User($email, $username, $password, $creationDate, $name, $imgName, $type);
    }
	
	public function changeName($conn, $email, $name){
		$changeNameQuery = "UPDATE user SET name = '" . $name . "' WHERE email = '" . $email . "';";
		
		return $conn->query($changeNameQuery);
	}
}
?>
