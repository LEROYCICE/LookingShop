<?php 
session_start() ;

require_once('database/connexion.php') ;
if(!empty($_POST["nom"]) && !empty(['description']) && !empty(['quantite'])){
$nom = strip_tags($_POST['nom']) ;
$description = strip_tags($_POST['description']);
$quantite = strip_tags($_POST['quantite']);

$sql = 'INSERT INTO articles(nom,description,quantite) VALUES(:nom,:description,:quantite)' ;
$article = $connexion->prepare($sql) ;

$article->bindValue(':nom',$nom,PDO::PARAM_STR);
$article->bindValue(':description',$description,PDO::PARAM_STR);
$article->bindValue(':quantite',$quantite,PDO::PARAM_INT);

$article->execute();
$_SESSION['message'] = "Votre commande est enrégistrée";
header('Location:index.php');


}else{
    $_SESSION['message'] = "Vous devez remplir tous les champs" ;
}


?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande d'article</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="img/bag.jpg" >
</head>
<body>
    <h1>Commande d'article</h1>
    <div class="create">
        <form action="" method="post">
            <input type="text" name="nom" placeholder="Votre article">
            <textarea name="description" placeholder="Bref description de votre article"></textarea>
            <input type="number" name="quantite" placeholder="La quantité d'article à commander">
            <button type="submit">Valider</button>
            <a href="index.php">Retour</a>
        </form>
    </div>
    

    
</body>
</html>