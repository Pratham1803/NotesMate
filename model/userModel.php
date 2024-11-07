<?php
// User Model class, represent the Data table of tblUser in MySQL database
class UserModel{
    private $id; // store the user id
    private $username; // store the username
    private $password; // store the password

    // constructor for initializing
    public function __construct($id=null, $username=null, $password=null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    // getter method for getting the user id
    public function getId(){
        return $this->id;
    }

    // getter method for getting the username
    public function getUsername(){
        return $this->username;
    }

    // getter method for getting the password
    public function getPassword(){
        return $this->password;
    }

    // setter method for setting the username
    public function setUsername($username){
        $this->username = $username;
    }

    // setter method for setting the passowrd
    public function setPassword($password){
        // $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
    }

    // setter method for setting the id
    public function setId($id){
        $this->id = $id;
    }
}
?>