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
    <h6 class="center"><?= $typeRepos ?></h6S>

    <script>
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
    