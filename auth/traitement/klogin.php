<?php 
session_start();
    
    include('../../db/connexion_db.php');

    $msg = "ERREUR de connection au serveur";
    $err = 0;

    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
       $email = strip_tags(trim($_POST['email']));
       $pass = strip_tags(trim($_POST['pass']));

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Adresse e-mail incorrecte";
            $err = 0;
       } else {
            $req = $db->prepare("SELECT * FROM user WHERE email_user = ?");
            $req->execute([$email]);
            $cpt = $req->rowCount();
            
            if ($cpt) {
                
                while ($data = $req->fetch()) {
                    $hash = $data['mdp_user'];
                    $_SESSION['id_user'] = $data['id_user'];
                    $_SESSION['nom_user'] = $data['nom_user'];
                }
                if (password_verify($pass, $hash)) {
                    $msg = "ok";
                    $err = 1;
                    
                } else {
                    $msg = "Mot de passe incorrecte";
                    $err = 0;
                }
            } else {
                $msg = "L'adresse n'existe pas";
                $err = 0;
            }
       }
       
    } else {
        $msg = "Veuillez remplir tous les champs";
        $err = 0;
    }

    $tab = ['msg' => $msg, 'err' => $err];
    echo json_encode($tab);
?>