<?php
include_once '../Config.php';
include_once '../Controller/SelectedCompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <?php
                if ($IdLeague != 0 && $IdTypeOfCompetiton != 0) {
                    ?>
                    <h1>Liste des compétition pour la ligue <?= $ListCompetitionByLeague->LeagueName ?> et du type de compétition: <?= $DiplayListOfTypeCompetiton->TypeOfCompetiton ?></h1>
                    <?php
                }
                if ($IdLeague == 0 && $IdTypeOfCompetiton != 0) {
                    ?>
                    <h1>Liste des compétition pour toutes les ligues  et du type de compétition : <?= $DiplayListOfTypeCompetiton->TypeOfCompetiton ?></h1>
                    <?php
                }
                if ($IdLeague != 0 && $IdTypeOfCompetiton == 0) {
                    ?>
                    <h1>Liste des compétition pour la ligue <?= $ListCompetitionByLeague->LeagueName ?> et de tous les types de compétitions</h1>
                <?php }
                
                if ($IdLeague == 0 && $IdTypeOfCompetiton == 0) {
                    ?>
                    <h1>Liste des compétition pour Toutes les ligues et de tous les types de compétitions</h1>
                <?php }
                ?>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <?php
                ?>
            </div>
            <div class="col-lg-6 centralColumm">

            </div>
            <div class="col-lg-3 rigthColumm">
                <div>
                    <a href="ListOfOpenCompetition.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>