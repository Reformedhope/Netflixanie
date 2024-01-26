<?php
ob_start();//turns on output buffering.
session_start();
date_default_timezone_set("America/Detroit");

try {
    $con = new PDO("mysql:dbname=netflixanie;host=localhost:3307", "root", "");
    $con ->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}catch(PDOException $e) {
    exit("connection failed:" . $e ->getMessage());
    

}


