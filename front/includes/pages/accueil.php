<? 
include __DIR__ ."/../../../back/session/sessionVerif.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../../assets/css/accueil.css"> 

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/banierePresentation.css"> 

    <link rel="stylesheet" href="../../assets/css/nav.css">

    <link rel="stylesheet" href="../../assets/css/footer.css">

    <link rel="stylesheet" href="../../assets/css/cookies.css"> 

    <link rel="stylesheet" href="../../assets/css/bar_recherche.css">

    <!-- popup mentions légales <link rel="stylesheet" href="../../assets/css/popUp.css"> -->

    <!-- Script pour les réseaux sociaux -->
    <script src="https://kit.fontawesome.com/68b1f887b3.js" crossorigin="anonymous"></script>

</head>
    
    <body>

    <!-- ---------------------------- Code de la navbar------------------------ -->

    <body class="corp">

<header class="head">
    <nav role="navigation">
        <div id="menuToggle">
        <input type="checkbox">      
       
        <span></span>
        <span></span>
        <span></span>           

        <ul id="menu">
            <a href="accueil.php"><li>Accueil</li></a>
            <a href="inscription.php"><li>Mon Compte</li></a>
            <a href="#"><li>Nous Contacter</li></a> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            <a href="accueil.php"><li>Me déconnecter</li></a>
        </ul>
        </div>
    </nav>

  <!--  <img src="../../assets/images/logo" class="connect"> -->
    <input type="image" src="../../assets/images/loggin.png" class="connect" href="connexion.php" />
</header>


    <!-- ----------------------------Fin Code de la navbar------------------------ -->

    <!-- ----------------------------Code de la barre de recherche------------------------ -->
       
    <div class="bar_re">
        <div class="sep">
            <label for="site-search">Rechercher dans le site : </label>
           
                <input type="search" id="site-search" >
        </div>        

                <button class="button"> Rechercher </button>
    </div>


    <!-- ----------------------------Fin Code de la barre de recherche------------------------ -->

        
    <!-- ------------------------------------------- FIN FENETRE POP UP MENTIONS LEGALES ----------------------------------------->

    <!-- <body class="imgpop_mention">
        <div id="id-element" class="bulle">
            <h1 class="titre" >Mentions Légales</h1>
            <br>
            <p class="message">Afin de naviguer sur notre blog, vous devez accepter<br> nos mentions légales ainsi que nos conditions<br> d’utilisation.</p>
            <br>
            <br>
            <div class="bouton-container">
                <button onclick="afficher()" type="submit" class="bouton">Accepter les conditions</button>
                <a href="http:\\www.youtube.fr" class="alien">Toutes les mentions légales</a>
        </div>
        </div>
        <div style="height: 100vh;"></div>
        <div style="height: 100vh;"></div>

        <script>
    function afficher(){
        document.getElementById("id-element").style.display ="none";
    }
</script> -->

    <!--------------------------------------------- FIN FENETRE POP UP MENTIONS LEGALES --------------------------------------- -->


    <!------------------------------------------------- FENETRE POP UP COOKIES -------------------------------------------->
           
    <div id="overlay" class="overlay">
                    <div id="popup" class="popup">

                        <div class="separation">
                            <p class="para_cookie"> - Avec votre accord, nous utilisons des cookies pour stocker et accéder à des informations personnelles. 
                                                        Vous pouvez les refuser en ignorant ce message.
                                                        Nous traitons les données suivantes : 
                                
                            </p>

                            <p class="para_cookie"> - Données de géolocalisation précises et identification par analyse du terminal,
                                                        données d’audience et développement de produit, Stocker et/ou accéder à des informations sur un terminal. 
                            </p>
                        </div>

                        <button id="button" class="button" > Accepter les cookies </button>
                        <span id="btnClose" class="btnClose" >&times;</span>

                    </div>
                </div>

                <srcipt src="../../assets/css/cookies.css">

                <script src="../../assets/js/cookies.js"></script>

    <!------------------------------------------------- FIN FENETRE POP UP COOKIES -------------------------------------------->

    <!-- -------------------------------------------------Code de Sarah Banniere---------------------------------------------- -->
  
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap');
    </style>

<div class= "firstpage">   
    <div class="baniere">
             <div class="imagebaniere">
                <img src="..\..\assets\images\Bordeaux 1.jpg" width="100%" alt="les quais Bordealais">
            </div>

        <div class="logo_titre">
            <div class="logo">
                <img src="..\..\assets\images\logo_bulle_blanc.svg" alt="Logo Les faces cachés">
            </div>
            
            <div class="titreH1">
                <h1>Les faces cachées de <br> bordeaux</h1>
            </div>
        </div>
    </div>

    <div class="presentation">
        <div class ="presentation_titre">
            <h2>Présentation</h2>
        </div>

        <div class="presentation_texte">
            <p>Laissez-vous guider par notre blog “Les Faces Cachées de Bordeaux”. Ce blog saura vous montrer le chemin vers toutes les surprises que nous réserve notre ville ! Des visages qui se cachent et vous observent en silence en passant par des événements historiques, plus rien n’aura de secret pour vous ! Prêt.e à tenter l’aventure ? 
            </p>
        </div>
    </div> 
</div>



    <!-- ------------------------------------------------Partie de Sarah Fin--------------------------------------- -->

    <!-- -------------------------------------------1ere partie des articles présentation--------------------------------- -->

        <div class="articles">

            <svg class="bckgd" width="1440" height="917" viewBox="0 0 1440 917" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1366.22 17.2388C1048.72 60.2854 888.511 83.0967 817.01 146.251C754.372 201.585 802.432 222.269 737.86 278.374C642.485 361.256 446.349 395.43 284.585 379.415C103.85 361.518 77.3235 291.966 -87.1471 289.263C-245.002 286.661 -364.851 348.35 -395.013 363.874C-665.213 502.953 -703.729 819.939 -547.625 887.712C-412.676 946.308 -244.414 769.953 126.286 788.23C381.96 800.839 388.275 888.983 689.878 909.473C821.415 918.412 1133.58 939.622 1311.04 822.422C1408.62 757.971 1435.96 671.149 1591.63 631.229C1666.69 611.985 1687.02 625.314 1728.33 607.909C1928.74 523.477 1824.82 51.8116 1546.07 1.68945C1530.81 -1.05604 1513.75 -2.75926 1366.22 17.2388Z" fill="#113638"/>
            </svg> <!-- Ce code concerne la forme svg verte 1 -->

            <img class="img_accueil" src="../../assets/images/alber.png" alt="Une image"> <!-- Image Alber -->
            
            <div class="droite">

                <div class="droite_svg">

                    <h1 class="grand_titre"> Street Art - L'art Illégal</h1> <!-- Titre -->

                    <svg class="bckgd3" width="668" height="6" viewBox="0 0 668 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M97 3L0.500305 3M667.014 3L563.001 3" stroke="#FFF3FB" stroke-width="5"/>
                    </svg> <!-- Ce code concerne la forme qui encadre le titre 3 -->
                </div>
                <div class="droite_svg">   
                    <p class="para_presentation">
                        Il fait partie intégrante de chaque  
                        <br>
                        ville et pourtant il reste malgré tout 
                        <br>
                        illégal [...] 
                    </p>   

                    <svg class="haut_droit" width="72" height="61" viewBox="0 0 72 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="72" y2="2.5" stroke="#FFF3FB" stroke-width="5"/>
                        <path d="M69.5 61L69.5 5" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>     <!-- Ce code concerne la forme qui encadre les écritures 2 haut droit-->
                    <svg class="bas_gauche"  width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.2878" y1="59.1425" x2="0.288634" y2="59.4986" stroke="#FFF3FB" stroke-width="5"/>
                        <line x1="2.49997" y1="0.987637" x2="2.77691" y2="56.987" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>      <!-- Ce code concerne la forme qui encadre les écritures 2 bas gauche-->
                        
                </div> 

                <button class="btn_footer" href="#">VOIR L'ARTICLE</button>

            </div>

        </div> 

    <!--------------------------------------------- Seconde Partie --------------------------------------------------->

        <div class="articles2">

            <img class="img_accueil" src="../../assets/images/base.png" alt="Une image"> <!-- Image Base Sous Marine -->
            
            <div class="droite">
                <div class="droite_svg">
                    <h1 class="grand_titre2"> La face des bassins de Lumières</h1> <!-- Titre -->

                    <svg class="bckgd3" width="667" height="6" viewBox="0 0 667 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M101.013 3L0.000305176 3M666.514 3L567 3" stroke="#113537" stroke-width="5"/>
                    </svg>      <!-- Ce code concerne la forme qui encadre le titre 3 (les deux ptits traits)-->
                </div>


                <div class="droite_svg"> 

                    <p class="para_presentation2">
                        Les Bassins de Lumières, niché  
                        <br>
                        dans la base sous-marine de Bordeaux [...]
                    </p>

                    
                    <svg class="haut_droit" width="73" height="61" viewBox="0 0 73 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.5" y1="2.5" x2="72.5" y2="2.5" stroke="#113537" stroke-width="5"/>
                        <line x1="70" y1="61" x2="70" y2="5" stroke="#113537" stroke-width="5"/>
                    </svg>     <!-- Ce code concerne la forme qui encadre les écritures 2 haut droit-->
                    <svg class="bas_gauche" width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.7878" y1="59.1425" x2="0.788634" y2="59.4986" stroke="#113537" stroke-width="5"/>
                        <line x1="2.99997" y1="0.987637" x2="3.27691" y2="56.987" stroke="#113537" stroke-width="5"/>
                    </svg>   <!-- Ce code concerne la forme qui encadre les écritures 2 bas gauche-->
                    
                </div> 

                <button class="btn_footer2" href="#">VOIR L'ARTICLE</button>

            </div>

        </div> 


        <!--------------------------------------------- Troisième Partie --------------------------------------------------->

        
        <div class="articles2">

            <svg class="bckgd" width="1440" height="917" viewBox="0 0 1440 917" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1366.22 17.2388C1048.72 60.2854 888.511 83.0967 817.01 146.251C754.372 201.585 802.432 222.269 737.86 278.374C642.485 361.256 446.349 395.43 284.585 379.415C103.85 361.518 77.3235 291.966 -87.1471 289.263C-245.002 286.661 -364.851 348.35 -395.013 363.874C-665.213 502.953 -703.729 819.939 -547.625 887.712C-412.676 946.308 -244.414 769.953 126.286 788.23C381.96 800.839 388.275 888.983 689.878 909.473C821.415 918.412 1133.58 939.622 1311.04 822.422C1408.62 757.971 1435.96 671.149 1591.63 631.229C1666.69 611.985 1687.02 625.314 1728.33 607.909C1928.74 523.477 1824.82 51.8116 1546.07 1.68945C1530.81 -1.05604 1513.75 -2.75926 1366.22 17.2388Z" fill="#113638"/>
            </svg> <!-- Ce code concerne la forme svg verte 1 -->

            <img class="img_accueil" src="../../assets/images/mascarons.png" alt="Une image"> <!-- Image Mascarons -->
            
            <div class="droite">

                <div class="droite_svg">

                    <h1 class="grand_titre"> Mascarons de Bordeaux </h1> <!-- Titre -->

                    <svg class="bckgd3" width="668" height="6" viewBox="0 0 668 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M97 3L0.500305 3M667.014 3L563.001 3" stroke="#FFF3FB" stroke-width="5"/>
                    </svg> <!-- Ce code concerne la forme qui encadre le titre 3 -->
                </div>
                <div class="droite_svg">   
                    <p class="para_presentation">
                        Les mascarons, de l’italien,
                        <br>
                        “grand masque grotesque” et de l’arabe, “bouffonnerie” [...]
                    </p>

                    
                    <svg class="haut_droit" width="72" height="61" viewBox="0 0 72 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="72" y2="2.5" stroke="#FFF3FB" stroke-width="5"/>
                        <path d="M69.5 61L69.5 5" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>     <!-- Ce code concerne la forme qui encadre les écritures 2 haut droit-->
                    <svg class="bas_gauche"  width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.2878" y1="59.1425" x2="0.288634" y2="59.4986" stroke="#FFF3FB" stroke-width="5"/>
                        <line x1="2.49997" y1="0.987637" x2="2.77691" y2="56.987" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>      <!-- Ce code concerne la forme qui encadre les écritures 2 bas gauche-->
                        
                </div> 

                <button class="btn_footer" href="#">VOIR L'ARTICLE</button>

            </div>

        </div> 

    <!--------------------------------------------- Partie Footer --------------------------------------------------->

        <footer class="bas_page">

        <div class="bas_footer">

            <div class="contain_1">
                <ul><li> <h2 class="container_footer"> Notre blog</h2> </li>
                    <li> <br> <a href="accueil.php" class="spe_footer">Accueil</a></li>
                    <li> <br> <a href="#" class="spe_footer">A propos</a></li>
                    <li> <br> <a href="#" class="spe_footer">Contact</a></li>
                </ul>
            </div>
            
            
            
            <div class="contain_1">
                <ul><li> <h2 class="container_footer"> Découvrir </h2> </li>
                    <li> <br> <a href="article.php" class="spe_footer">Street-Art, l'Art Illégal</a> </li>
                    <li> <br> <a href="article.php" class="spe_footer">Mascarons de Bordeaux</a> </li>
                    <li> <br> <a href="article.php" class="spe_footer">La Face des Bassins des Lumières</a> </li>
                </ul>
            </div>

            

            <div class="contain_2">
                <ul><li> <h2 class="container_footer"> Nos Réseaux </h2> </li>
                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>

            

            <div class="contain_3"> 
                <button class="btn_footer3" href="connexion.php">Se connecter</button>
                <button class="btn_footer3" href="connexion.php">S'inscrire</button>
            </div>
            

        
        </div>

        <div id="trait_dessus"><hr></div>

        <div class="titre_mention">
            <h2 class="mention" > <a class="ment-alyssa"  href="https://drive.google.com/drive/u/0/folders/1HBglrX0-kUXurgdlhxJJsTzM3MyDvSqP?ths=true"> Mentions Légales</h2>
        </div>  

    </footer>





    </body>

</html>