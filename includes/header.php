<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/Entity.php");

if(!isset($_SESSION["userLoggedIn"])){
    header("Location: register.php");
    

}
$userLoggedIn = $_SESSION["userLoggedIn"];
?>
<!DOCTYPE html>

<html>
    <head> 
        <title> Welcome to Netflixanie</title>
        <link rel="stylesheet" type = text/css href="assets/style/style.css"/>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
        <script src="https://kit.fontawesome.com/a0c01a8968.js" crossorigin="anonymous"></script>
        
</head>
        <body>
            <div class 'wrapper'>

           
            
            

  