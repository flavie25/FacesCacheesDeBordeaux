<?
/////////////////////////////////////////////////////
//
//  Session login
//
//  Script  : sessionLogin.php
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

    // 0. Fonction permettant de contrôler l'existence des login/pass en BD
    require_once __DIR__."ctrlConnexion.php";

    // Recup login et password du form session.php
    $eMailMemb = isset($_POST['eMailMemb']) ? $_POST['eMailMemb'] : '';
    $passMemb = isset($_POST['passMemb']) ? $_POST['passMemb'] : '';

    if ($eMailMemb == '' OR $passMemb == '') {
        # Erreur saisie : champs vides => error = 1
        // Retour page d'accueil...
        header('Location: ../../front/pages/connexion.php?error=1');
    }
    else {
        # ici on contrôle l'existence des login/pass en BD...
        if (!ctrlerSaisieConnect($eMailMemb, $passMemb)) {
          // pass invalid => error = 2
          header('Location: ../../front/pages/connexion.php?error=2&login=' . $eMailMemb);
        }
        else {
          // numéro unique délivré au user
          // Login / pass trouvé en BD
          session_start();
          // Création des variables superglobales
          $_SESSION['eMailMemb'] = $eMailMemb;
          $_SESSION['passMemb'] = $passMemb;
          $_SESSION['logged'] = true;

          // Créat cookie si login existe
          if (isset($_POST["eMailMemb"]))
            setcookie("login", $_POST["login"], time()+24*2600, null, null, false, true);

          //$login = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';

          // Re-diriger le visiteur vers une nouvelle page
          header('Location: ./sessionBienvenue.php');
        }
    }
