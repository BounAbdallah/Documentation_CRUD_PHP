<?php 
$host ="localhost";
$usernameer = "root";
$dbname = "gestion_des_etudiants";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'tout est bon';
    }
catch(PDOException $e){
    echo ''. $e->getMessage();  
};