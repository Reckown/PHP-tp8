<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> TP 8 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="citation.php">Information </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>
</nav>

<?php
    include "connexpdo.php";
    $bdd = connexpdo('pgsql:host=localhost;port=5432;dbname=citations;', 'postgres','new_password');

    $reponse = $bdd->query('SELECT max(id) FROM citation');
    $temp = $reponse->fetch();

    echo "<h1>La citation du jour </h1>";
    echo "Il y a ".$temp['max']." citations répertorié <br>";
    echo "Voici l'une d'elle générée aléatoirement : <br>";


    $randomNumber = rand(1, $temp['max']);
    $reponse = $bdd->prepare('SELECT * FROM citation WHERE id =?');
    $reponse->execute(array($randomNumber));
    $temp1 = $reponse->fetch();

    $reponse2 = $bdd->prepare('SELECT* FROM auteur WHERE id = ?');
    $reponse2->execute(array($temp1[auteurid]));
    $temp2 = $reponse2->fetch();

    $reponse3 = $bdd->prepare('SELECT* FROM siecle WHERE id = ?');
    $reponse3->execute(array($temp1[siecleid]));
    $temp3 = $reponse3->fetch();

    echo "<br>";
    echo $temp1['phrase'];
    echo "<br>";
    echo $temp2['nom']." ".$temp2['prenom'];
    echo " (".$temp3['numero']." ème)";

?>
</body>