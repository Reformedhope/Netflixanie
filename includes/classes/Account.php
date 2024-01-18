<?php
class Account {

    private $con;
    private $errorArray = array(); 
    // This is how you create an empty array in php


    public function __construct($con) {
        $this ->con = $con;

    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUserName($un);
        $this->validateEmails($em, $em2);
        
        // $this->validateFirstName($fn);
        // $this->validateFirstName($fn);

    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25){
            array_push($this->errorArray, Constants::$firstNameCharacters);

        }
    }
    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25){
            array_push($this->errorArray, Constants::$lastNameCharacters);

        }
    }
    
    private function validateUserName($un) {
        if(strlen($un) < 2 || strlen($un) > 25){
            array_push($this->errorArray, Constants::$userNameCharacters);
            

        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username =:un");
        $query->bindValue(":un", $un,);
            $query->execute();
            return;

            if($query->rowCount() != 0){
                array_push($this->errorArray, Constants::$userNameTaken);
            }
    }

    private function validateEmails($em, $em2) {
        if ($em != $em2){
            array_push($this->errorArray, Constants::$emailsDontMatch);
        }
    }


    public function getError($error) {
        if (in_array($error, $this -> errorArray)){
            return $error;
        }
    }



}


?>