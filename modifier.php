<?php
require_once 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
	// Requperation les donnees saissie
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $ine = strip_tags($_POST['INE']);
        $email = strip_tags($_POST['email']);
        $telephone = strip_tags($_POST['tel']);

		// Requet de modification de donnee
        $sql = "UPDATE `Etudiant` SET `nom`=:nom, `prenom`=:prenom, `email`=:email, `INE`=:INE, `tel`=:tel WHERE `id`=:id";
        $query = $conn->prepare($sql);


		// Recperer les variable sur la formulaire
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':tel', $telephone, PDO::PARAM_STR);
        $query->bindParam(':INE', $ine, PDO::PARAM_INT);

        if ($query->execute()) {
            $_SESSION['message'] = "Étudiant modifié avec succès !";
            header('Location: index.php');
            exit();
        } else {
            echo "Erreur lors de la modification de l'étudiant.";
        }
    } else {

		// Afficher Les donnees de precedent
    $sql = "SELECT * FROM `Etudiant` WHERE `id`=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $etu = $query->fetch(PDO::FETCH_ASSOC);

    if (!$etu) {
        echo "Étudiant non trouvé.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <div class="form signup">
				<div class="inputBox"><a  class="btn btn-second btn-sm" href="index.php">Retour</a></div>
                <h2>Modifier un étudiant</h2>
                <div class="inputBox">
                    <input type="hidden" name="id" value="<?= $etu['id']; ?>">
                </div>
                <div class="inputBox">
                    <input type="text" name="nom" value="<?= $etu['nom']; ?>" required="required">
                    <i class="fa-regular fa-user"></i>
                    <span>Nom</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="prenom" value="<?= $etu['prenom']; ?>" required="required">
                    <i class="fa-regular fa-user"></i>
                    <span>Prenom</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" value="<?= $etu['email']; ?>" required="required">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <input type="password" name="INE" value="<?= $etu['INE']; ?>" required="required">
                    <i class="fa-solid fa-address-card"></i>
                    <span>INE</span>
                </div>
                <div class="inputBox">
                    <input type="number" name="tel" value="<?= $etu['tel']; ?>" required="required">
                    <i class="fa-solid fa-phone"></i>
                    <span>Numero Telephone</span>
                </div>
                <div class="inputBox">
					<input type="submit" name="submit" value="Modifier">
                </div>
                <div class="inputBox"> <input type="reset" class="login" value="Annuler"></div>
            </div>
        </div>
		
    </form>
</body>
</html>
