<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <link rel="stylesheet" href="../../assets/css/profil.css">
    </head>
    <body>
        <svg width="100vw" height="40vw" viewBox="0 0 1440 1725" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: fixed; top:70%; left:20%">
        <path d="M2527.7 534.104C2322.01 189.33 1935.98 64.2684 1935.98 64.2684C1935.98 64.2684 1447.58 -126.848 950.845 150.059C950.845 150.059 695.096 356.279 411.108 139.386C131.292 -74.487 -127.345 412.667 -135.046 426.966C-135.046 427.369 -135.367 427.973 -135.367 428.375C-141.785 453.75 -251.209 909.086 -59.9582 1098.59C-59.9582 1098.59 86.3676 1274.8 334.095 1208.55C334.095 1208.55 1169.05 938.286 1138.57 1370.46C1138.57 1370.46 1164.56 1641.93 1653.59 1710.81C1653.59 1710.81 2099.63 1822.37 2415.07 1415.37C2414.75 1415.37 2733.71 878.877 2527.7 534.104Z" fill="#113638"/>
        </svg>
        <div id="center">
            <div style="display:flex;flex-direction:row">
                <div style="display:flex;flex-direction:column;width: 40vw;">
                    <div style="transform: translateY(25%);">
                        <img id="pp" src="../../assets/images/Vector_2.svg" height="300" width="300" >
                    </div>
                    <div style="margin-top: 15%;margin-left: 0%; text-align : center"><label>Profil : </label><label id="roleProfil">admin</label></div>
                    <div style="margin-top: 5%;margin-left: 0%; text-align : center"><label>E-mail : </label><label id="email">email@email.com</label></div>
                    <div style="margin-top: 5%;margin-left: 0%; text-align : center;"><label>Mot de passe : </label><label id="mdp">**********</label></div>
                    <button style="margin-left: 50%;width: 200px;margin-top:5%" class="button2">Modifier les information</button>
                    <button style="margin-left: 50%;width: 200px;" class="button2">Se déconnecter</button>
                    <button style="margin-left: 50%;width: 200px;" class="button2">Supprimer le compte</button>
                </div>
                <div style="display:flex;flex-direction:column" class="pseudo">
                    <div id="titrepseudo">
                        Pseudo
                    </div>
                    <div style="display:flex;flex-direction:row">
                        <input type="text" class="formulaire" placeholder="Pseudo">
                        <button style="margin-left: 10%;width: 200px;" class="button">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>