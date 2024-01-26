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
        $this->validatePasswords($pw, $pw2);
        

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
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailInvalid);
            return;

        }
        $query = $this->con->prepare("SELECT * FROM users WHERE email =:em");
        $query->bindValue(":em", $em,);
            $query->execute();
            return;

            if($query->rowCount() != 0){
                array_push($this->errorArray, Constants::$emailTaken);
            }
    }

    private function validatePasswords($pw, $pw2){
            if ($pw != $pw2){
                array_push($this->errorArray, Constants::$passwordDontMatch); 
            return;
            
            if(strlen($pw) < 8 || strlen($pw) > 20){
                array_push($this->errorArray, Constants::$passwordLength);
            }
        }


    }


   
    public function getError($error) {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessages'>$error</span>";
        }
    }
    
}
