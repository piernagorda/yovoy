<?php

class User{
    private $user_id = "";
    private $username = "";
    private $password = "";
    private $creationDate = "";
    private $name = "";
    private $imgPath = "";
    private $isPremium = "";
    private $type = "";
    private $img = "";

    public function __construct($user_id, $username, $password, $creationDate, $name, $imgPath, $isPremium, $type, $img){
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->creationDate = $creationDate;
        $this->name = $name;
        $this->imgPath = $imgPath;
        $this->isPremium = $type;
        $this->type = $type;
        $this->img = $img;
    }

    public function getID(){
        return $this->user_id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function getName(){
        return $this->name;
    }

    public function getImgPath(){
        return $this->imgPath;
    }

    public function isPremium(){
        return $this->isPremium;
    }

    public function getType(){
        return $this->type;
    }

    public function getImg(){
        return $this->img;
    }
}   
?>