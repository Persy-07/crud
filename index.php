<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.jpg">Ajouter</a>
       
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <tr>
                <td>Christian</td>
                <td>Cooper</td>
                <td>25 ans</td>
                <td><a href="modifier.php"><img src="images/pen.png"></a></td>
                <td><a href="supprimer.php"><img src="images/sup.png"></a></td>
            </tr>
         
            <?php
        //inclure la page de connexion
        include_once "connexion.php";
        //requete pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM employe");
        if(mysqli_num_rows($req) == 0){
            //S'il n'existe pas d'employé dans la base de donnée, alors on affiche ce message:
            echo "il n'ya pas encore des employé ajouter !!!";
        }else {
            //si non, affichons la liste de tout les employés
            while($row=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['age']?></td>
                    <!--nous allons mettre l'id de chaque employé dans ce lien-->
                    <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png" ></a></td>
                    <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/sup.png" ></a></td>

                </tr>
                <?php
            }
        }
        ?>

        </table>
    </div>
</body>
</html>