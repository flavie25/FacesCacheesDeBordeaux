<?
setcookie('page', 'article.php', 3600*24, null, null, false, true);
?>
<html>
    <header>
        <meta charset="utf8">
        <title>Article</title>
        <!-- <link rel="stylesheet" href="./../../assets/css/article.css"> -->
        <link rel="stylesheet" href="../../assets/css/nav.css">
        <link rel="stylesheet" href="../../assets/css/footer.css">
    </header>
    <body>

<? 

include __DIR__."./../commons/navbar.php";
require_once __DIR__."/../../../util/utilErrOn.php";
require_once __DIR__."/../../../util/ctrlSaisies.php";
require_once __DIR__."/../../../CLASS_CRUD/article.class.php";
global $db;
$article = new ARTICLE;

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $numArt = ctrlSaisies($_GET['id']);
    $contenu = $article->get_1ArticleByThemAngl($numArt);
    $titreArt = $contenu['libTitrArt'];
    $sousTitr1 = $contenu['libSsTitr1Art'];
    $sousTitr2 = $contenu['libSsTitr2Art'];

}
?>
        
        <div class="articleContainer">
            <br>
            <br>
            <div class="articleImage">
                <img src="../../../uploads/<?= $contenu['urlPhotArt'];?>" style="display: block;margin-left: auto;margin-right: auto; transform:translate(-2%)">
                <div class="articleOverlay">
                    <h1><?= $titreArt ?></h1>
                </div>
            </div>
            <br>
            <p><?= $contenu['libChapoArt']; ?></P>
            <p style="font-weight: bold;"><?= $contenu['libAccrochArt']; ?></p>
            <h2><?= $sousTitr1;?></h2>
            <p><?= $contenu['parag1Art']; ?></p>
            <h2><?= $sousTitr2; ?></h2>
            <p><?= $contenu['parag2Art']; ?></p>
            <p><?= $contenu['parag3Art']; ?></p>
            <h2> Conclusion : </h2>
            <p><?= $contenu['libConclArt']; ?></p>
        </div>
        <br>
        <br>
        <br>
        <br>
        </div>

        <?
        require_once __DIR__."/../../../CLASS_CRUD/comment.class.php";
        global $db;
        $comment = new COMMENT;

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $numArt = ctrlSaisies($_GET['id']);
            $commentaires = $comment->get_AllCommentByArt($numArt);
            $nbComment = $comment->get_nbComment($numArt);
        }
        foreach($commentaires as $commentaire){
        ?>
        <div class="articleContainer">
            <div style="display:flex;flex-direction:row">
                <div style="transform: translateY(25%);">
                    <img src="../../assets/images/Vector_2.svg" height="100" width="100" >
                </div>


                <div style="display:flex;flex-direction:column; margin-left: 2%;">
                    <div>
                        <label style="margin-left: 1%;font-size: 1.375em;"><?= $commentaire['dtCreCom'];?></label>
                        <label style="margin-left: 5%;"><?= $commentaire['pseudoMemb'];?></label>
                    </div>
                    <div>
                        <form action="">
                        <textarea id="commentaire" name="commentaire" class="formulaire" cols="40" rows="3" readonly="readonly" style="resize: none;"><?= $commentaire['libCom'];?></textarea><br>
                        <button class="button">Répondre</button>
                        <img src="../../assets/images/Like.png" style="margin-left: 1%;transform: translateY(5px);">
                        <label id="nbLikes">0</label>
                        
                        <!-- <a href="http://www.youtube.com" style="text-decoration: none; color: #201d1e;"><label style="text-decoration: underline; margin-left: 2%;font-size: 1.375em;"><label id="nbCommentaires" style="text-decoration: none; margin-left: 2%;font-size: 1.375em;"></label>0</label> Réponses →</label></a> -->
                        </form>
                    </div>
                </div>
            </div>  
        </div>
        <? 
        }

        if ($nbComment == 0){
        ?>
        <div class="articleContainer">
            <label>Pas encore de commentaires</label>
        </div>
        <?php
        }
        ?>
        <br>
        <hr style="color: #201d1e; width: 50%;">
        <br>


        <? 
            if(isset($_SESSION['pseudoMemb'])){

        ?>
        <div class="articleContainer">
            <div style="display:flex;flex-direction:row">
                <div style="transform: translateY(25%);">
                    <img src="../../assets/images/Vector_2.svg" height="100" width="100" >
                </div>
                <div style="display:flex;flex-direction:column; margin-left: 2%;">
                    <div>
                        <label style="margin-left: 5%;">Commentaire :</label>
                    </div>
    
                    <div>
                        <form method="post" action="./../../../back/comment/createComment1.php" enctype="multipart/form-data">
                            <input type="hidden" id="pseudoMemb" name="pseudoMemb" value="<?= $_SESSION['pseudoMemb'] ;?>" />
                            <input type="hidden" id="numArt" name="numArt" value="<?= $_GET['id'] ;?>" />
                            <div class="control-group">
                                <label class="control-label" for="libCom"><b>Commentaire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                                <input type="text" name="libCom" id="libCom" size="80" maxlength="80" autofocus="autofocus" />
                            </div>
                            <!-- <textarea id="libCom" name="libCom" placeholder="Écrivez un commentaire" class="formulaire" cols="40" rows="3" style="resize: none;"></textarea><br> -->
                            <input class="button" type="submit" value="Envoyer" name="Submit" />
                            <!-- <button class="button" style="margin-top:15px">Envoyer</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?
            }
            else{
        ?>
                <div class="articleContainer">
                    <div style="display:flex;flex-direction:row">
                        <div style="transform: translateY(25%);">
                            <img src="../../assets/images/Vector_2.svg" height="100" width="100" >
                        </div>
                        <div style="display:flex;flex-direction:column; margin-left: 2%;">
                            <div>
                                <label style="margin-left: 5%;">Connectez vous pour commenter :</label>
                                <a class="btn_footer" href="connexion.php">Connectez vous</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
        <br>
        <div style="display:flex;flex-direction:row">
            <div style="margin: 0 25%;">
                <img src="../../assets/images/Boutonprecedent.png" alt="precedent" style="width:250px;height:50px; margin-right: 10%;">
            </div>
            <div style="margin: 0 auto;width: 50%;">
                <img src="../../assets/images/Boutonsuivant.png" alt="suivant" style="width:250px;height:50px;margin-left: 10%;">
            </div>
        </div>

        <? 
        include __DIR__."./../commons/footer.php";
        ?>
    </body>
</html>
