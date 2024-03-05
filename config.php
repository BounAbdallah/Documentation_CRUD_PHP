<?php 

$host ="localhost";
$username = "root";
$dbname = "gestion_des_Etudiant";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'tout est bon';
    }
catch(PDOException $e){
    echo ''. $e->getMessage();  
};