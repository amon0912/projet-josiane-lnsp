<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=service-accueil" , "root" , "");
        // echo 'ok!';
    } catch (PDOException $e) {
        echo 'Erreur de connection à la base de données ' . $e;
        die();
    }
?>