<?php
    require_once('../db/connexion_db.php');
    global $db;

    var_dump($_POST);

    if (!empty($_POST['Idprod']) && !empty($_POST['DCI-nat']) && !empty($_POST['Numlot']) && !empty($_POST['Origine']) && !empty($_POST['echantprlv']) && !empty($_POST['Datefab']) && !empty($_POST['Fab']) && !empty($_POST['nbrechant']) && !empty($_POST['Qterecu']) && !empty($_POST['DocTA']) && !empty($_POST['Formgal']) && !empty($_POST['Dosgeref']) && !empty($_POST['Prst']) && !empty($_POST['Dateprpt']) && !empty($_POST['echantngeff']) && !empty($_POST['echantrecu']) ) {
        # code...
    }
?>
