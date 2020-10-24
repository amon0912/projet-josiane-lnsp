<?php  
    require_once('../db/connexion_db.php');
    global $db;
    // var_dump($_POST);


    if (!empty($_POST['nomclt'])  && 
    !empty($_POST['prenomclt'])  && 
    !empty($_POST['Adrs'])  && 
    !empty($_POST['ville']) && 
    !empty($_POST['telephone']) && 
    !empty($_POST['personne_contacter']) && 
    !empty($_POST['pays']) && 
    /*!empty($_POST['fax']) &&*/ 
    !empty($_POST['exigence_client'])
    ) {
        $nomclt = strip_tags(trim($_POST['nomclt']));
        $prenomclt = strip_tags(trim($_POST['prenomclt']));
        $Adrs = strip_tags(trim($_POST['Adrs']));
        $ville = strip_tags(trim($_POST['ville']));
        $telephone = strip_tags(trim($_POST['telephone']));
        $personne_contacter = strip_tags(trim($_POST['personne_contacter']));
        $pays = strip_tags(trim($_POST['pays']));
        $fax = strip_tags(trim($_POST['fax']));
        $exigence_client = strip_tags(trim($_POST['exigence_client']));
        
        /**verification si le client est deja inscrit */
        $req = $db->prepare("select * from client where telephone = :tel");
        $req->execute(["tel" => $telephone]);
        $compter = $req->rowCount();
        // $reponse = $req->fetch();
        echo $compter;
        
        // die();

        if ($compter) {
            header('Location: ../form-client.html');
            
        } else {
            $id = uniqid();
            // echo $id;
            echo ' ok';
            $req1 = "insert into client (Idclt, Nomclt, prenomclt, Adrs, ville, telephone, personne_contacter, pays, fax, exigence_client) values (?,?,?,?,?,?,?,?,?,?)";
            $req2 = $db->prepare($req1);
            $req2->execute([$id, $nomclt, $prenomclt, $Adrs, $ville, $telephone, $personne_contacter, $pays, $fax, $exigence_client]);
            header('Location: ../index.html');
        }
        
    } else {
        // redirection vers le formulaire d'enregistrement du client 
        header('Location: ../form-client.html');

    }
    
?>