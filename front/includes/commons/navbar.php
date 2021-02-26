<header>
    <div class="head">
            <nav role="navigation">
                <div id="menuToggle">
                    <input type="checkbox">      
                
                    <span></span>
                    <span></span>
                    <span></span>           

                    <ul id="menu">
                        <a href="accueil.php"><li>Accueil</li></a>
                        <?php if(isset($_SESSION['utilisateur'])){ ?>
                        <a href="profil.php"><li>Mon compte</li></a>

                        <?php } else {?>
                            <a href="connexion.php"><li>Mon Compte</li></a>
                        <?php } ?>
                        <a href="#"><li>Nous Contacter</li></a> <br><br>
                        <a href="accueil.php"><li>Me déconnecter</li></a>
                    </ul>
                </div>
            </nav>
            

                <!-- ----------------------------Code de la barre de recherche------------------------ -->
            <div class="tous_bar">
                <div class="bar_re">
                    <div class="recherche">
                        <label for="site-search">Rechercher dans le site : </label>
                        <input type="search" id="site-search" placeholder="..." name="recherche" >
                    </div>
                    <button class="button"> Rechercher </button>
                </div>


            <!-- ----------------------------Fin Code de la barre de recherche------------------------ -->

        <!--  <img src="../../assets/images/logo" class="connect"> -->

                <!-- Pour login -->
                <a href="connexion.php" >
                    <i class="fas fa-user"></i>
                    <!-- <img  src="../../assets/images/alber.png" class="connect" />  -->
                </a>
                
                    
            </div>
        </div>
</header>     








