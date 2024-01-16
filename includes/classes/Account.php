<?php
class Account {

    private $con;
    private $errorArray = array(); 
    // This is how you create an empty array in php


    public function __construct($con) {
        $this ->con = $con;

    }

    public function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn > 25)){
            array_push($this->errorArray, "First name wrong length");

        }
    }


    public function getError($error) {
        if (in_array($error, $this -> errorArray)){
            return $error;
        }
    }



}


?>