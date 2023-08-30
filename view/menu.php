
<?php
    if($action != "home"){
?>

<div style="position: relative; top: 50px; left: 50px">
    <div class="col-md-1" style="width: 3%" onclick="location.href='index.php';">
        <a class="btn btn-default" id="divBtnDate"><i class="fa-solid fa-home fa-2xl"></i></a>
    </div>
</div>

<?php
    }
?>

<div class="floating-container">
    <!--<div class="floating-button" onmouseover="changeIcone(this, 'in')" onmouseout="changeIcone(this, 'out')" onclick="location.href='index.php';" title="Home">-->
    <div class="floating-button" onclick="location.href='index.php?action=settings';" title="Paramètres">
        <span id="param">
            <i class="fa-solid fa-gear"></i>
        </span>
        <span style="display: none;" id="home">
            <i class="fa-solid fa-home"></i>
        </span>
    </div>
    <div class="element-container">

        <span class="float-element tooltip-left" onclick="location.href='index.php?action=alleleves';" title="Elèves"><i class="fa-solid fa-users"></i></span>
        <span class="float-element" onclick="location.href='index.php?action=allclasses';" title="Classes"><i class="fa-solid fa-school"></i></span>
        <span class="float-element" onclick="location.href='index.php?action=allvacances';" title="Vacances"><i class="fa-solid fa-umbrella-beach"></i></span>
    </div>
</div>

<script>
    function changeIcone(obj, mode){
        if (mode == "in"){
            obj.querySelector('#param').style.display = "none";
            obj.querySelector('#home').style.display = "inline-block";
        } else {
            obj.querySelector('#home').style.display = "none";
            obj.querySelector('#param').style.display = "inline-block";
        }
        
    }
</script>