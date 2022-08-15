<?php
    session_start();
    require_once('database/connexion.php') ;
    $sql = 'SELECT * FROM articles';
    $data = $connexion->prepare($sql);

    $data->execute();

    $articles = $data->fetchAll(PDO::FETCH_ASSOC);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOOKING SHOP-TOGO</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="img/bag.jpg" >
    
</head>
<body>
    <h1>LOOKING SHOP </h1>
    <hr> 
    <p>Vente des vêtements et accessoires </p>
    <div class="div-mere">
        <div class="div-prime">
            <span id="article" >Nos articles: </span>
            <ul class="liste">
                <li>Sacs à main pour les femmes </li> <br>
                <li>Chaussures en talons pour les femmes </li> <br>
                <li>Manches longues pour les hommes </li> <br>
                <li>T-shirt sans dessin de toutes couleurs </li> <br>
                <li>T-shirt avec dessin </li> <br>
                <li>Bijoux pour les femmes et hommes  </li> <br>
            </ul>
        </div>
        <div class="div-second">
            <h2 class="liste-article">Liste des articles déja commandés</h2>
            <span class="commander"> <a href="create.php"> Commander un article </a></span>

            <?php
            if($_SESSION['message']){
                ?>
                <h2 style="color:green ;">
                 <?php echo $_SESSION['message'];
                        $_SESSION['message'] = " " ?>
                </h2>

                <?php
            }
            
            ?>



            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($articles as $article){?>
                    <tr>
                        <td><?=$article['id'] ?> </td>
                        <td><?=$article['nom'] ?></td>
                        <td><?=$article['description'] ?></td>
                        <td><?=$article['quantite'] ?></td>
                        <td><span id="show"><a href="show.php?id=<?=$article['id'] ?> ">Voir</a></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <footer style="margin:30px 0px ;">
        <div style="font-weight:500; font-style:oblique;font-family:'Open Sans';">
        Contact: (+228) 91598952 <br>
         Localisation : HAAC Agbalépédo Lomé-Togo </div> <br>
    <div style="font-family: 'Arial';font-size:20px;font-weight:500;"> 
        Copyright &copy; 2022. LookingShop-Togo</div>
    </footer>

</body>
</html>