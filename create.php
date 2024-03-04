<?php
require_once 'config.php';

if(isset($_POST)){
    if(isset($_POST['nom']) && !empty($_POST['prenom'])
        && isset($_POST['mail']) && !empty($_POST['ine'])
        && isset($_POST['telephone'])){
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $ine = strip_tags($_POST['ine']);
            $mail = strip_tags($_POST['mail']);
            $telephone = strip_tags($_POST['telephone']);

            $sql = "INSERT INTO `Etudiant` (`nom`, `prenom`, `email`, `INE`, `tel`) VALUES (:nom, :prenom, :email, :INE, :tel)";

            $query = $conn->prepare($sql);

            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindValue(':email', $mail, PDO::PARAM_INT);
            $query->bindValue(':tel', $telephone, PDO::PARAM_INT);
            $query->bindValue(':INE', $ine, PDO::PARAM_INT);
            


            $query->execute();
            $_SESSION['message'] = "Etudiant ajouté avec succès !";
            header('Location: index.php');
        }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
    <div class="container">
		<div class="form signup">
			<h2>Ajouter un etudiant</h2>
			<div class="inputBox">
				<input type="text" name="nom" required="required">
				<i class="fa-regular fa-user"></i>
				<span>Nom</span>
			</div>
			<div class="inputBox">
				<input type="text" name="prenom" required="required">
				<i class="fa-regular fa-user"></i>
				<span>Prenom</span>
			</div>
			<div class="inputBox">
				<input type="text" name="mail" required="required">
				<i class="fa-regular fa-envelope"></i>
				<span>email address</span>
			</div>
			<div class="inputBox">
				<input type="text" name="ine" required="required">
				<i class="fa-solid fa-address-card"></i>
				<span>INE</span>
			</div>
			<div class="inputBox">
				<input type="number" name="telephone" required="required">
				<i class="fa-solid fa-phone"></i>
				<span>Numero Telephone</span>
			</div>
			<div class="inputBox">
				<input type="submit" name="submit" value="Ajouter un etudiant">
			</div>
			<p> <a href="#" class="login">Annuler</a></p>
		</div>
		
		
	</div>
    </form>

	
</body>
</html>