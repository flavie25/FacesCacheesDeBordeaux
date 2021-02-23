        <div class="control-group">
            <label for="numLang">Choisissez la langue</label>
            <input type="hidden" id="idLang" name="idLang" value="<?= $numLang; ?>" />
            <select id="numLang" name="numLang"  onchange="document.forms['chgLang'].submit();" size="1" title="Sélectionnez la classe !" autofocus="autofocus"> 
                <option value="-1">- - - Choisissez une langue - - -</option>
                <?php 
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM LANGUE ORDER BY lib1Lang ;';
                $result = $db->query($requete);
                $allLangue = $result->fetchAll();
                foreach ($allLangue as $langue)
                {
                    $numLang = $langue['numLang'];
                    $lib1Lang = $langue['lib1Lang'];
                ?>
                
                <option value="<?= ($numLang); ?>" <?= ((isset($idLang) && $idLang == $numLang) ? " selected=\"selected\"" : null); ?> >
                    <?= ($lib1Lang); ?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
            <?
            $result->closeCursor();

            if (isset($idLang) AND $idLang != -1) {
                // Listbox dynamique
                $numLang = $_POST['numLang'];
                ?>
                <div class="control-group">
                    <label for="numAngl">Angle</label>  
                    <select id="numAngl" name="numAngl"  onchange="select()">
                        <option value="-1">- - - Choisissez un angle - - -</option>
                        <?php 
                        global $db;
                        $requete = 'SELECT numAngl, libAngl FROM ANGLE WHERE numLang = ?;';
                        $result = $db->prepare($requete);
                        $result->execute([$numLang]);
                        $allAngl = $result->fetchAll();
                        foreach ($allAngl as $angl)
                        {
                        ?>
                        <option value="<?php echo $angl['numAngl'];?>"><?php echo $angl['libAngl'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="control-group">
                    <label for="numThem">Thématique</label>  
                    <select id="numThem" name="numThem"  onchange="select()">
                        <option value="-1">- - - Choisissez une thématique - - -</option>
                        <?php 
                        global $db;
                        $requete = 'SELECT numThem, libThem FROM ANGLE WHERE numLang = ?;';
                        $result = $db->prepare($requete);
                        $result->execute([$numLang]);
                        $allThem = $result->fetchAll();
                        foreach ($allThem as $them)
                        {
                        ?>
                        <option value="<?php echo $them['numThem'];?>"><?php echo $them['libThem'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

            <?
                $result->closeCursor();
            }   // End of if (isset($idclas) && $idclas != -1)
            ?>