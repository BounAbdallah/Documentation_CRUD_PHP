<?php 

require_once "config.php";

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM Etudiant WHERE id = '$id'";
    $requete = $conn->prepare($sql);
    $requete->bindParam(":id", $id, PDO::PARAM_INT);
    $requete->execute();
    if($requete->rowCount()> 0){
        header("Location: index.php?");
        exit;
}else{
    echo "La suppression a echoué !";
    }
}