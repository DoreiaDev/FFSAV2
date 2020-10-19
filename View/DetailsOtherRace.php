<?php
include_once '../Config.php';
include_once '../Controller/DetailsOtherRaceCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 "> 
                <h1>Détaille du <?= $TypeOfCompet ?> <?= $NameOfTheTest ?></h1>
            </div>
            <div class="col-lg-3">
                <div>
                    <a href="ListOfOpenCompetition.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 leftColumm">

            </div>
            <div class="col-lg-10 centralColumm">
                 <div class="DetailRally">
                <div class="row">
                   
                    <div class="col-lg-6">           
                        <p>Lieu de départ: <?= $CheckDetaiRaceOustidRally->Location_Circuit ?></p>
                        <p>Observation : <?= $CheckDetaiRaceOustidRally->Observation ?></p>
                        <p>Début : <?= $CheckDetaiRaceOustidRally->StartDate ?></p>
                        <p>Fin : <?= $CheckDetaiRaceOustidRally->EndDate ?></p>
                    </div>
                    <div class="col-lg-6">
                        <p>Asa organistrice : <?= $CheckDetaiRaceOustidRally->AsaName ?></p>
                        <p>Numéro de l'ASA : <?= $CheckDetaiRaceOustidRally->NumberAsa ?></p>
                        <p>Ligue : <?= $CheckDetaiRaceOustidRally->LeagueName ?></p>
                    </div>
                </div>
                <div>
                    <p>Nombre minimun d'officiel : <?= $CheckDetaiRaceOustidRally->MinimumNumberOfOfficials ?> </p>
                    <p>Nombre de jour de compétition : <?= $CheckDetaiRaceOustidRally->NumberOfCompetitonDays ?></p>
                    <p>Observation pour l'herbergement : <?= $CheckDetaiRaceOustidRally->ObservationAccommodation ?></p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                         <p>Date des besoins des OFficiels</p>
                         <?= $CheckDetaiRaceOustidRally->RequirementDate1?>
                            <?php
                            if ($CheckDetaiRaceOustidRally->RequirementDate2 != "01/01/2020") {
                                ?>
                                <p><?= $CheckDetaiRaceOustidRally->RequirementDate2 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->RequirementDate3 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->RequirementDate3 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->RequirementDate4 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->RequirementDate4 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->RequirementDate5 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->RequirementDate5 ?></p>
                                <?php
                            }
                            ?>
                    </div>
                    <div class="col-lg-6">
                         <p>Dates de possibilité d'hébergement:</p>
                            <p> <?= $CheckDetaiRaceOustidRally->LodgingPossible1 ?></p>
                            <?php
                            if ($CheckDetaiRaceOustidRally->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <p><?= $CheckDetaiRaceOustidRally->LodgingPossible2 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->LodgingPossible3 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->LodgingPossible3 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->LodgingPossible4 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->LodgingPossible4 ?></p>
                                <?php
                            }
                            if ($CheckDetaiRaceOustidRally->LodgingPossible5 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDetaiRaceOustidRally->LodgingPossible5 ?></p>
                                <?php
                            }
                            ?>
                    </div>
                    <div class="BtnRallyInscription col-lg-12">
                            <a href="RegistrationOfOfficialsOnACompetition.php?IdRaceOustideRally=<?= $CheckDetaiRaceOustidRally->IdRaceOustideRally?>&IdSportEvent=<?= $CheckDetaiRaceOustidRally->IdSportEvent?>"><button>Je m'inscrit sur cette Compétition</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 rigthColumm">

            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>