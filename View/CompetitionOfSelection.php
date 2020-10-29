<?php
include_once '../Config.php';
include_once '../Controller/CompetitionOfSelectionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
              
            </div>
            <div class="col-lg-10 ">
                <h1>Choississez la compétition</h1>
            </div>
            <div class="col-lg-1">
                <div>
                    <a href="HomeLogin.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <?php
               
                ?>
            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <?php 
                        foreach ($ListCompetition AS $DisplayListSportEvents){
                    ?>
                    <a href=""><button><?= $DisplayListSportEvents ->NameOfTheTest?> , <?= $DisplayListSportEvents ->Location_Circuit?>, <?= $DisplayListSportEvents ->Début?></button></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>