<?
setcookie('page', 'accueil.php', 3600*24, null, null, false, true);
$page = basename($_SERVER["SCRIPT_FILENAME"]);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    
    <link rel="stylesheet" href="../../assets/css/normalize.css">

    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/cookies.css">
    <link rel="stylesheet" href="../../assets/css/banner.css"> 

    <link rel="stylesheet" href="../../assets/css/presentation.css"> 
    <link rel="stylesheet" href="../../assets/css/accueil.css"> 

    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- popup mentions légales <link rel="stylesheet" href="../../assets/css/popUp.css"> -->

    <!-- Script pour les réseaux sociaux -->
    <script src="https://kit.fontawesome.com/68b1f887b3.js" crossorigin="anonymous"></script>

</head>

<body class="corp">

    <?
        include __DIR__ ."./../commons/navbar.php";

        include __DIR__ ."./../components/cookies.php";

        include __DIR__ ."./../commons/banner.php";

        include __DIR__ ."./../components/presentation.php";

        //include __DIR__ ."./../components/accueilArticles.php";

    ?>
        <div class="svgBackground">
            <svg class="bckgd" width="1440" height="917" viewBox="0 0 1440 917" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1366.22 17.2388C1048.72 60.2854 888.511 83.0967 817.01 146.251C754.372 201.585 802.432 222.269 737.86 278.374C642.485 361.256 446.349 395.43 284.585 379.415C103.85 361.518 77.3235 291.966 -87.1471 289.263C-245.002 286.661 -364.851 348.35 -395.013 363.874C-665.213 502.953 -703.729 819.939 -547.625 887.712C-412.676 946.308 -244.414 769.953 126.286 788.23C381.96 800.839 388.275 888.983 689.878 909.473C821.415 918.412 1133.58 939.622 1311.04 822.422C1408.62 757.971 1435.96 671.149 1591.63 631.229C1666.69 611.985 1687.02 625.314 1728.33 607.909C1928.74 523.477 1824.82 51.8116 1546.07 1.68945C1530.81 -1.05604 1513.75 -2.75926 1366.22 17.2388Z" fill="#113638"/>
            </svg> <!-- Ce code concerne la forme svg verte 1 -->
        </div>
        <div class="articles">
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
                <a class="btn_footer" href="article.php?id=55">VOIR L'ARTICLE</a>
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
                <a class="btn_footer2" href="article.php?id=56">VOIR L'ARTICLE</a>

            </div>

        </div> 


        <!--------------------------------------------- Troisième Partie --------------------------------------------------->
        <svg class="bckgd2" width="1440" height="917" viewBox="0 0 1440 917" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1366.22 17.2388C1048.72 60.2854 888.511 83.0967 817.01 146.251C754.372 201.585 802.432 222.269 737.86 278.374C642.485 361.256 446.349 395.43 284.585 379.415C103.85 361.518 77.3235 291.966 -87.1471 289.263C-245.002 286.661 -364.851 348.35 -395.013 363.874C-665.213 502.953 -703.729 819.939 -547.625 887.712C-412.676 946.308 -244.414 769.953 126.286 788.23C381.96 800.839 388.275 888.983 689.878 909.473C821.415 918.412 1133.58 939.622 1311.04 822.422C1408.62 757.971 1435.96 671.149 1591.63 631.229C1666.69 611.985 1687.02 625.314 1728.33 607.909C1928.74 523.477 1824.82 51.8116 1546.07 1.68945C1530.81 -1.05604 1513.75 -2.75926 1366.22 17.2388Z" fill="#113638"/>
        </svg> <!-- Ce code concerne la forme svg verte 1 -->
        
        <div class="articles2">

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
                <a class="btn_footer" href="article.php?id=57">VOIR L'ARTICLE</a>

            </div>

        </div> 

    <!--------------------------------------------- Partie Footer --------------------------------------------------->
<!-- 
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
            <h2 class="mention" > <a class="ment-alyssa"  href="mentions.php"> Mentions Légales</h2>
        </div>  

    </footer> -->



<?

include __DIR__."./../commons/footer.php";

?>

    </body>

</html>