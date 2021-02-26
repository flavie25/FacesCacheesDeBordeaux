<? 

$error = isset($_GET['error']) ? $_GET['error'] : '';

switch ($error) {
    case 1:
      $errLogin = "Merci de saisir un login et/ou un mot de passe !";
      echo ("<font color='#FF0000'>>> " . $errLogin . "</font><br />");
      break;

    case 2:
      echo ("<font color='#FF0000'>>> Le login et/ou le mot de passe ne sont pas valides !</font><br />");
      break;

    case 3:
      echo ("<font color='#FF0000'>>> Vous devez être connecté(e) !</font><br />");
      break;
  }

?>
<html>

<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../assets/css/connexion.css" />
</head>

    <div class="container">
        <svg class="icon" width="200" height="200" viewBox="0 0 2813 2813" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1406.5 0C629.793 0 0 629.669 0 1406.44C0 2183.21 629.731 2812.88 1406.5 2812.88C2183.33 2812.88 2813 2183.21 2813 1406.44C2813 629.669 2183.33 0 1406.5 0ZM1406.5 420.541C1663.51 420.541 1871.77 628.866 1871.77 885.75C1871.77 1142.7 1663.51 1350.96 1406.5 1350.96C1149.62 1350.96 941.353 1142.7 941.353 885.75C941.353 628.866 1149.62 420.541 1406.5 420.541ZM1406.19 2445.16C1149.86 2445.16 915.096 2351.81 734.017 2197.29C689.905 2159.67 664.452 2104.5 664.452 2046.61C664.452 1786.08 875.309 1577.57 1135.9 1577.57H1677.22C1937.88 1577.57 2147.93 1786.08 2147.93 2046.61C2147.93 2104.56 2122.6 2159.61 2078.43 2197.23C1897.41 2351.81 1662.58 2445.16 1406.19 2445.16Z" fill="#433E3F"/>
        </svg>
        <h1> Connexion </h1>
        <p class="obligatoire"> *Champs obligatoires </p>

        <form method="post" action="../../../back/session/verif_connexion.php" enctype="multipart/form-data" accept-charset="UTF-8">

        <label for="eMailMemb">E-Mail*</label> </br>
        <input type="text" name="eMailMemb" id="eMailMemb" required placeholder="Renseignez votre adresse mail" title="Renseignez votre adresse mail" /> </br>

        <label for="passMemb">Mot de passe*</label> </br>
        <input type="password" name="passMemb" id="passMemb" required placeholder="Renseignez votre mot de passe" title="Renseignez votre mot de passe" /> 
        </br>
        <input type="submit" class ="button" value="JE ME CONNECT"  name="Submit" /> 
        </form>

        <a href="inscription.php"> Pas de compte ? Inscris-toi ici ! </p>
    </div>

</html>