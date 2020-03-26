<?php

include_once('User.php');

class UserDAO{

    public function registerUser($conn, $username, $password, $creationDate, $name, $email, $imgName, $type){        
        //VALORES A INSERTAR EN LA BBDD
        $queryValues =  
            "'".$username."'". "," 
            ."'".$password."'". "," 
            ."'".$creationDate."'". ","
            ."'".$name."'". ","
			."'".$email."'". "," 
            ."'".$imgName."'". ","
            ."'".$type."'";

        $registerUser= "INSERT INTO user VALUES(".$queryValues.");";

        return $conn->query($registerUser);
    }

    public function userExists($conn, $username){
        $loginUserQuery = "SELECT username FROM user WHERE username = '".$username."';";
        $result = $conn->query($loginUserQuery);

        return $result->num_rows > 0;
    }

    public function getUser($conn, $username){
        $loginUserQuery = "SELECT * FROM user WHERE username = '".$username."';";
        $result = $conn->query($loginUserQuery);

        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $username = $row["username"];
            $password = $row["password"];
            $creationDate = $row["creationDate"];
            $imgName = $row["imgName"];
            $name = $row["name"];
            $type = $row["type"];
        }

        return new User($username, $password, $creationDate, $name, $email, $imgName, $type);
    }
	
	public function changeName($conn, $username, $name){
		$changeNameQuery = "UPDATE user SET name = '" . $name . "' WHERE username = '" . $username . "';";
		
		return $conn->query($changeNameQuery);
	}
	
	public function changeImg($conn, $username, $imgName){
		$changeImgQuery = "UPDATE user SET imgName = '" . $imgName . "' WHERE username = '" . $username . "';";
		
		return $conn->query($changeImgQuery);
	}
	
	public function changePassword($conn, $username, $newPass){
		$changePassQuery = "UPDATE user SET password = '" . $newPass . "' WHERE username = '" . $username . "';";
		
		return $conn->query($changePassQuery);
	}
}
?>
