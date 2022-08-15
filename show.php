<?php 
require_once('database/connexion.php') ;
if($_GET['id'] AND !empty($_GET['id'])){
    $id = strip_tags($_GET['id']) ;

    $sql = 'SELECT * FROM articles WHERE id= :id';

    $data = $connexion->prepare($sql) ;

    $data->bindValue(':id',$id,PDO::PARAM_INT);

    $data->execute() ;

    $article = $data->fetch();

    if(!$article){
        header('Location:index.php') ; 
    }else{
        
    }
}else{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyez vos articles</title>
    <link rel="shortcut icon" href="img/shop.jpg" >
    <style>
        #retour{
            text-decoration: none;
            text-align: center;
            margin: auto;
            font-size: 18px;
            margin-top: 20px;
            margin-left: 10px;
            padding: 5px 15px;
            border-radius: 3px;
            background-color: rgb(255, 73, 7);
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <h1 style="font-family:'Century Gothic' ;">Commande d'identifiant : <?= $article['id'] ?></h1>
        <hr>
        <h3 style="font-family:'Arial';">Nom : <span style="color:rgb(255, 73, 7);"> <?= $article['nom'] ?> </span></h3>
        <h3 style="font-family:'Arial';">Description :<span style="color:rgb(255, 73, 7);"> <?= $article['description'] ?> </span></h3>
        <h3 style="font-family:'Arial';">Quantité :<span style="color:rgb(255, 73, 7);"> <?= $article['quantite'] ?> </span></h3>
        
    </div>
     <a href="index.php" id="retour">Retour</a>
    
</body>
</html>