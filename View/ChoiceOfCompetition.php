<?php
include_once '../Config.php';
include_once '../Controller/ChoiceOfCompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Choix de la compétition à ouvrir:</h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <?php
                include_once '../Include/LeftColum.php';
                ?>
            </div>
            <div class="col-lg-6 centralColumm">
                <?php
                foreach ($DisplayListOfTypeOFCompetition as $DiplayyOfCompetitionType) {
                    $IdListCompetitionType = $DiplayyOfCompetitionType->id;
                    if ($IdListCompetitionType != 1 && $IdListCompetitionType != 2) {
                        ?>
                        <p>Compétition <a href="AddingACompetition.php"><?= $DiplayyOfCompetitionType->TypeOfCompetiton ?> </a> </p>
                    <?php
                    }
                    if ($IdListCompetitionType == 1 || $IdListCompetitionType == 2) {
                        ?>
                        <p>Compétition <a href="AddingARally.php"><?= $DiplayyOfCompetitionType->TypeOfCompetiton ?> </a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                include_once '../Include/RightColum.php';
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