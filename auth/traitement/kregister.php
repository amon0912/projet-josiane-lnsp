<?php 

    include("../../db/connexion_db.php");
    global $db;
    $msg = "ERREUR de connection au server";
    $err = 0;
    if (!empty($_POST["pass1"]) && !empty($_POST["pass2"]) && !empty($_POST["email"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"])) {
        $nom = strip_tags(trim($_POST["nom"]));
        $prenom = strip_tags(trim($_POST["prenom"]));
        $email = strip_tags(trim($_POST["email"]));
        $pass1 = strip_tags(trim($_POST["pass1"]));
        $pass2 = strip_tags(trim($_POST["pass2"]));

        if (strlen($nom) < 2) {
            $msg = 'Nom trop court';
            $err = 0;
        } else if (strlen($prenom) < 2) {
            $msg = 'Prénom trop court';
            $err = 0;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg ='Adresse email incorrecte';
            $err = 0;
        } else if ($pass1 != $pass2 || strlen($pass1) < 5) {
            $msg = 'Le mot de passe contenir  au moins <br> 5 caractères et identique au second champs';
            $err = 0;
        } else {

            // verifier si l'addresse email n'existe pas 
            $verfi = $db -> prepare("SELECT * FROM user WHERE email_user = ? ");
            $verfi -> execute([$email]);
            $cpt = $verfi -> rowCount();
            if (!$cpt) {
                $err = 1;
                $hash = password_hash($pass1, PASSWORD_DEFAULT);
                $req = $db -> prepare("insert into user (nom_user, prenom_user, email_user, mdp_user) values (?, ?, ?, ?)");
                $req -> execute([$nom, $prenom, $email, $hash]); 
                $msg = "inscription terminée";
                
            } else {
                $msg = "Le compte existe déjà";
                $err = 0;
            }

        }
        
        
    }

    $arr = ['msg' => $msg, 'err' => $err];
    $encode = json_encode($arr);
    echo $encode;
?>