<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Vérifier que le bouton a été bien cliqué
    if(isset($_POST['button'])){
        // Extraction des informations envoyées dans des variables par la méthode POST
        extract($_POST);
        // Vérifier que tous les champs ont été remplis
        if(!empty($nom) && !empty($prenom) && !empty($age)){
            // Connexion à la base de données
            include_once "connexion.php";

            // Requête d'ajout
            $req = mysqli_query($con ,"INSERT INTO employe VALUES(NULL, '$nom', '$prenom', '$age')");
            if($req){ // Si la requête a été effectuée avec succès, on fait une redirection
                header("location: index.php");

            }else{ // Si non
                $message = "Employé non ajouté";
            }
        }else{
            // Si non
            $message = "Veuillez remplir tous les champs !";
        }
    }
        ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un employé</h2>
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
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Âge</label>
            <input type="text" name="age">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
