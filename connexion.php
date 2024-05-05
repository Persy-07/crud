<?php
//connexion à la base de données
$con = mysqli_connect("localhost","root","", "entreprise");
if(!$con){
    echo "Vous etes connectés à la base de donnée";
}
?>