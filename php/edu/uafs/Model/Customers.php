<?php
class Customers {
    private $custID;
    private $fname;
    private $lname;
    private $username;
    private $password;

    public function getCustID(){
        return $this->custID;
    }

    public function setCustID($custID){
        $this->custID = $custID;
    }

    public function getFname(){
        return $this->fname;
    }

    public function setFname($fname){
        $this->fname = $fname;
    }

    public function getLname(){
        return $this->lname;
    }

    public function setLname($lname){
        $this->lname = $lname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}

?>