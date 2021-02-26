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
function ctrlerSaisieConnect($login, $pass) {
    // 1. Connexion à la base de donnée
    require_once __DIR__ . '../../CONNECT/database.php';

    $loginMemb = '';
    $passMemb = '';

    // Recup du mdp et log utilisateur
    global $db;
    $requete = "SELECT eMailMemb, passMemb FROM membre WHERE eMailMemb = ? AND passMemb = ? ;";
    $result = $db->prepare($requete);
    $result->execute([$login,$pass])

    // S'il y a bien un résultat
    if ($result and $result->num_rows) {
        // Récupération du résultat de requête
        $object = $result->fetch();
        // Récupération du résultat champ par champ
        $loginMemb = $object['eMailMemb'];
        $passMemb = $object['passMemb'];
        $numMemb = $object['numMemb'];
    }   // Fin if ($result ...)

    if (($loginMemb == $login) AND ($passMemb == $pass)) {
        $passOK = true;
    }
    else {
        $passOK = false;
    }

    // true si pass saisi = à celui en table pour login saisi
    return $passOK;
}

