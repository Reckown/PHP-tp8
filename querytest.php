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
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
     </ul>
    </div>
</nav>

   <?php
   include "connexpdo.php";
    $bdd = connexpdo('pgsql:host=localhost;port=5432;dbname=citations;', 'postgres','new_password');

   echo "<h1> Auteurs de la BDD </h1>";
   $reponse = $bdd->query('SELECT * FROM auteur');
    echo "<table style='border: 1px solid black'> <thead> <td style='border: 1px solid black'> Nom </td> <td style='border: 1px solid black'> Prénom </td> </thead>";
    while ($data = $reponse->fetch()) {
        echo "<tr> <td style='border: 1px solid black '>".$data['nom']." </td> <td style='border: 1px solid black'> ".$data['prenom']." </td> </tr>";
    }

    echo "</table>";
    echo "<h1> Citatations de la BDD </h1>";
    $reponse = $bdd->query('SELECT * FROM citation');
    while ($data = $reponse->fetch()) {
        echo $data['phrase']."<br>";
    }

    echo "<h1> Siècles de la BDD </h1>";
    $reponse = $bdd->query('SELECT * FROM siecle');
    while ($data = $reponse->fetch()) {
        echo $data['numero']."<br>";
    }
?>
</body>
</html>