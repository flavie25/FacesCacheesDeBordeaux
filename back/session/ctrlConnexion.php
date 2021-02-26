<?
/////////////////////////////////////////////////////
//
//  Connexion MEMBRE
//
//  Script  : ctrlerConnexion.php
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

//
// Contrôle que nous sommes bien en validation de formulaire:
// Lorsque le formulaire est envoyé, la varaible $_POST est renseignée
// sous forme de tableau avec toutes les valeurs du formulaire
//

// 0. Fonction traitant éléments formulaire (-> éviter injections SQL)
function ctrlerSaisieConnect($pseudo, $pass) {
    // 1. Connexion à la base de donnée
   

    $pseudoMemb = '';
    $passMemb = '';

    // Recup du mdp et log utilisateur
    global $db;
    $requete = "SELECT pseudoMemb, passMemb FROM membre WHERE pseudoMemb = ?;";
    $result = $db->prepare($requete);
    $result->execute([$pseudo]);



    // S'il y a bien un résultat
    if ($result) {
        // Récupération du résultat de requête
        $object = $result->fetch();
        // Récupération du résultat champ par champ
        $pseudoMemb = $object['pseudoMemb'];
        $passMemb = $object['passMemb'];
        
    }   // Fin if ($result ...)
    //password_verify($passMemb,$pass)
    if (($pseudoMemb == $pseudo) AND $passMemb == $pass) { 
        $passOK = true;
    }
    else {
        $passOK = false;
        header('Location: ./../../front/includes/pages/connexion.php?login='.$pseudoMemb.'&pass='.$pass.'&pass2='.$passMemb);
    }

    // true si pass saisi = à celui en table pour login saisi
    return ($passOK);
}

