<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        // Connexion à la base de données
        include_once "connexion.php";
        //on recupère les id dans le lien
        $id = $_GET['id'];
        // Requête pour afficher les infos d'un employé
        $req = mysqli_query($con ,"SELECT * FROM employe WHERE id = $id");
        $row = mysqli_fetch_assoc($req);
     
    // Vérifier que le bouton a été bien cliqué
    if(isset($_POST['button'])){
        // Extraction des informations envoyées dans des variables par la méthode POST
        extract($_POST);
        // Vérifier que tous les champs ont été remplis
        if(!empty($nom) && !empty($prenom) && !empty($age)){
            //requete de modification
            $req = mysqli_query($con, "UPDATE employe SET nom = '$nom' ,prenom = '$prenom', age = '$age' WHERE id = $id");
            if($req){ // Si la requête a été effectuée avec succès, on fait une redirection
                header("location: index.php");

            }else{ // Si non
                $message = "Employé non modifié";
            }
        }else{
            // Si non
            $message = "Veuillez remplir tous les champs !";
        }
    }
        ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier l'Employé: <?=$row['nom']?></h2>
        <p class="erreur_message">
            <?php
            // Si la variable message existe, afficher son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prenom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Age</label>
            <input type="text" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>
