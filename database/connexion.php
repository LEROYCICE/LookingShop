<?php 

try {
    $login = 'root';
    $connexion = new PDO('sqlite:database.db',$login);
} catch (PDOException $e) {
    echo 'Erreur'.$e->getMessage() ;
}


?>