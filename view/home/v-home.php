<?php
    require_once "view/header.php";
?>

    <div style="position: relative; top: 50px; left: 50px">
        <form class="row g-3" action="" method="post">
            <div class="col-md-1" style="width: 3%"><a class="btn btn-default" id="divBtnDate">
                <i class="fa-solid fa-calendar-days fa-2xl"></i></a>
            </div>
            <div class="col-md-1" id="formDate">
                <input type="date" class="form-control" name="da" id="da" value="<?= $dateJour ?>">
            </div>
            <div class="col-md-1">
                <button class="btn btn-default" type="submit" id="btnChange"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
    <br>
    <h1 class="center"><?= $dateJourTexte ?></h1>
    <br>
    <div class="social-box">
        <div class="container">
            <div class="row">
            <?php
                if(count($mesAppelsJourAM) != 0){
            ?>
                <div class="col-md-6">
                    <h5 class="center">Matin</h5>
                    <form action="index.php?action=editappel" method="post">
                        <?php
                            $classeEnCours = "";
                            $totalPresent = 0;
                            foreach($mesAppelsJourAM as $aam){
                                if($aam->getEstPresent() == 1){
                                    ++$totalPresent;
                                }
                                if($classeEnCours != $aam->getEleve()->getClasse()->getId()){
                                    if($classeEnCours != ""){
                                        echo "</div>";
                                    }
                                    $classeEnCours = $aam->getEleve()->getClasse()->getId();
                                    $nbPresent = (array_key_exists($aam->getEleve()->getClasse()->getLibelleCourt(), $nbElevesByClassePresentAM))?($nbElevesByClassePresentAM[$aam->getEleve()->getClasse()->getLibelleCourt()]):(0);
                                    echo "<div><br><h7 class=\"center\">".$aam->getEleve()->getClasse()->getLibelleCourt()." - ".$aam->getEleve()->getClasse()->getLibelle()." (<span id=\"nbClasse\">".$nbPresent."</span>/".$nbElevesByClasse[$aam->getEleve()->getClasse()->getLibelleCourt()].")</h7>";
                                }
                                
                                
                                echo "<div class=\"card card-body spacing3"; echo ($aam->getestPresent() == 1)?(" bgPresent"):(($aam->getestPresent() == 0)?(" bgAbsent"):("")); echo "\">
                                <div class=\"row\">
                                    <div class=\"col-md-9\" style=\"padding-top: 6px\">
                                        <span>"; echo (substr($aam->getEleve()->getDateNais(), 5) == substr($dateJour, 5))?("<span style='padding-right: 10px;'><i class='fa-solid fa-cake-candles'></i></span>"):(""); echo strtoupper($aam->getEleve()->getNom())." ".ucfirst(strtolower($aam->getEleve()->getPrenom()))."</span>
                                    </div>
                                    <div class=\"col-md-3\" style=\"text-align: right;\">
                                        <button type=\"button\" class=\"btn btn-success btn-circle spacingL10\" onclick=\"changePresence(1, this)\" style=\"display: "; echo ($aam->getestPresent() == 1)?("none"):("inline-block"); echo ";\"><i class=\"fa-solid fa-user-check\"></i></button>
                                        <button type=\"button\" class=\"btn btn-danger btn-circle spacingL10\" onclick=\"changePresence(0, this)\" style=\"display: "; echo ($aam->getestPresent() == 0)?("none"):("inline-block"); echo ";\"><i class=\"fa-solid fa-user-slash\"></i></button>
                                    </div>
                                    <div style=\"display: none;\">
                                        <input type=\"number\" name=\"present_".$aam->getEleve()->getId()."\" value=\"".$aam->getestPresent()."\">
                                    </div>
                                </div>
                            </div>";
                            }
                        ?>
                        </div>
                        <br>
                        <div class="center">
                            <h7>Présence : <span id="total"><?= $totalPresent ?></span>/<span id="totalEleve"><?= count($mesAppelsJourAM)."</span> (<span id=\"totalPercent\">".number_format(($totalPresent/count($mesAppelsJourAM))*100, 2)."</span>%)"; ?></h7>
                            <input type="submit" class="btn btn-success" value="Enregistrer">
                        </div>
                        <input type="number" name="periode" id="periode" value="1" hidden>
                        <input type="date" name="da" id="da" value="<?= $dateJour ?>" hidden>
                    </form>
                </div>

                <div class="col-md-6">
                    <h5 class="center">Après Midi</h5>
                    <form action="index.php?action=editappel" method="post">
                        <?php
                            $classeEnCours = "";
                            $totalPresent = 0;
                            foreach($mesAppelsJourPM as $apm){
                                if($apm->getEstPresent() == 1){
                                    ++$totalPresent;
                                }
                                if($classeEnCours != $apm->getEleve()->getClasse()->getId()){
                                    if($classeEnCours != ""){
                                        echo "</div>";
                                    }
                                    $classeEnCours = $apm->getEleve()->getClasse()->getId();
                                    $nbPresent = (array_key_exists($apm->getEleve()->getClasse()->getLibelleCourt(), $nbElevesByClassePresentAP))?($nbElevesByClassePresentAP[$apm->getEleve()->getClasse()->getLibelleCourt()]):(0);
                                    echo "<div><br><h7 class=\"center\">".$apm->getEleve()->getClasse()->getLibelleCourt()." - ".$apm->getEleve()->getClasse()->getLibelle()." (<span id=\"nbClasse\">".$nbPresent."</span>/".$nbElevesByClasse[$apm->getEleve()->getClasse()->getLibelleCourt()].")</h7>";
                                }
                                
                                echo "<div class=\"card card-body spacing3"; echo ($apm->getestPresent() == 1)?(" bgPresent"):(($apm->getestPresent() == 0)?(" bgAbsent"):("")); echo "\">
                                <div class=\"row\">
                                    <div class=\"col-md-9\" style=\"padding-top: 6px\">
                                        <span>"; echo (substr($apm->getEleve()->getDateNais(), 5) == substr($dateJour, 5))?("<span style='padding-right: 10px;'><i class='fa-solid fa-cake-candles'></i></span>"):(""); echo strtoupper($apm->getEleve()->getNom())." ".ucfirst(strtolower($apm->getEleve()->getPrenom()))."</span>
                                    </div>
                                    <div class=\"col-md-3\" style=\"text-align: right;\">
                                        <button type=\"button\" class=\"btn btn-success btn-circle spacingL10\" onclick=\"changePresence(1, this)\" style=\"display: "; echo ($apm->getestPresent() == 1)?("none"):("inline-block"); echo ";\"><i class=\"fa-solid fa-user-check\"></i></button>
                                        <button type=\"button\" class=\"btn btn-danger btn-circle spacingL10\" onclick=\"changePresence(0, this)\" style=\"display: "; echo ($apm->getestPresent() == 0)?("none"):("inline-block"); echo ";\"><i class=\"fa-solid fa-user-slash\"></i></button>
                                    </div>
                                    <div style=\"display: none;\">
                                        <input type=\"number\" name=\"present_".$apm->getEleve()->getId()."\" value=\"".$apm->getestPresent()."\">
                                    </div>
                                </div>
                            </div>";
                            }
                        ?>
                        </div>
                        <br>
                        <div class="center">
                            <h7>Présence : <span id="total"><?= $totalPresent ?></span>/<span id="totalEleve"><?= count($mesAppelsJourPM)."</span> (<span id=\"totalPercent\">".number_format(($totalPresent/count($mesAppelsJourPM))*100, 2)."</span>%)"; ?></h7>
                            <input type="submit" class="btn btn-success" value="Enregistrer">
                        </div>
                        <input type="number" name="periode" id="periode" value="2" hidden>
                        <input type="date" name="da" id="da" value="<?= $dateJour ?>" hidden>
                    </form>
                </div>
                <?php 
                } else {
                    echo "<div class='center'><p>Aucun élève renseigné pour cette date</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
    

    <script>
        function changePresence(etat, obj){
            var card = obj.parentNode.parentNode.parentNode
            if(etat == 1){
                var nbPres = Number(card.parentNode.querySelector('h7>span').innerHTML)
                card.parentNode.querySelector('h7>span').innerHTML = nbPres + 1

                var form_obj = card.parentNode.parentNode.parentNode
                var nbPresTotal = Number(form_obj.querySelector('#total').innerHTML)
                nbPresTotal = nbPresTotal + 1;
                form_obj.querySelector('#total').innerHTML = nbPresTotal
                var nbPresTotalEleve = Number(form_obj.querySelector('#totalEleve').innerHTML)
                form_obj.querySelector('#totalPercent').innerHTML = ((nbPresTotal / nbPresTotalEleve)*100).toFixed(2)

                obj.style.display = "none";
                obj.parentNode.querySelector('.btn-danger').style.display = "inline-block";
                card.classList.remove("bgAbsent")
                card.classList.add("bgPresent")
                card.querySelector('input').value = 1
            } else if (etat == 0){
                var nbPres = Number(card.parentNode.querySelector('h7>span').innerHTML)
                card.parentNode.querySelector('h7>span').innerHTML = Math.max(0 ,nbPres - 1)

                var form_obj = card.parentNode.parentNode.parentNode
                var nbPresTotal = Number(form_obj.querySelector('#total').innerHTML)

                if (card.classList.contains('bgPresent')){
                    nbPresTotal = Math.max(0, nbPresTotal - 1)
                    form_obj.querySelector('#total').innerHTML = nbPresTotal
                }
                var nbPresTotalEleve = Number(form_obj.querySelector('#totalEleve').innerHTML)
                form_obj.querySelector('#totalPercent').innerHTML = ((nbPresTotal / nbPresTotalEleve)*100).toFixed(2)

                obj.style.display = "none";
                obj.parentNode.querySelector('.btn-success').style.display = "inline-block";
                card.classList.remove("bgPresent")
                card.classList.add("bgAbsent")
                card.querySelector('input').value = 0
            }
        }

        (function () {
            var move = document.getElementById('divBtnDate');
            var dt = document.getElementById('formDate');
            var btnChange = document.getElementById('btnChange');

            move.onclick = function () {

                if (dt.style.opacity === "1") {
                    dt.style.opacity = "0";
                    dt.style.width = "0px";
                    btnChange.style.opacity = "0";
                } else {
                    dt.style.opacity = "1";
                    dt.style.width = "12%";
                    btnChange.style.opacity = "1";
                }
            };
        })();
    </script>