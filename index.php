<?php
require_once('config.php');

$sql="SELECT * ,Etudiant.nom As nomEtu , Etudiant.id As idEtu , universite.nom As  nomUni
FROM Etudiant
INNER JOIN universite ON Etudiant.id_université = universite.id";
$statement=$conn->prepare($sql);
$statement->execute();
$result=$statement->fetchAll();

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h1>liste des etudiant</h1>
    <a href="ajouter.php">Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email</th>
            <th>INE</th>
            <th>tel</th>
            <th>université</th>
            <th>Action</th>
        </tr>
        <?php foreach($result as $row): ?>
            <tr>
                <td> <?=$row['nomEtu'] ?></td>
                <td> <?=$row['prenom'] ?></td>
                <td> <?=$row['email'] ?></td>
                <td> <?=$row['INE'] ?></td>
                <td> <?=$row['tel'] ?></td>
                <td> <?=$row['nomUni'] ?></td>
                <td>
                    <a href="modifier.php?id=<?php echo $row['idEtu']; ?>"  class="btn btn-primary btn-sm">Modifier</a> 
                    <a href="supprimer.php?id=<?php echo $row['idEtu']; ?>" class="btn btn-danger btn-sm" >Suppimer</a> 
                </td>
            </tr>
           
    <?php endforeach?>
        </table>
    </div>
  </div>
</div>
   
</body>
</html>