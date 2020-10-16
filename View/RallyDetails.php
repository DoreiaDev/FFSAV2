<?php
include_once '../Config.php';
include_once '../Controller/RallyDetailsCtrl.php';
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

            <div class="col-lg-12 centralColumm">
                <div class="DetailRally">
                    <div class="row">
                        <div class="col-lg-6">           
                            <p>Lieu de départ: <?= $CheckDDetailRally->Location_Circuit ?></p>
                            <p>Observation : <?= $CheckDDetailRally->Observation ?></p>
                            <p>Début : <?= $CheckDDetailRally->StartDate ?></p>
                        </div>
                        <div class="col-lg-6">
                            <p>Asa organistrice : <?= $CheckDDetailRally->AsaName ?></p>
                            <p>Numéro de l'ASA : <?= $CheckDDetailRally->NumberAsa ?></p>
                            <p>Fin : <?= $CheckDDetailRally->EndDate ?></p>
                        </div>
                    </div>
                    <div>
                        <p>Nombre minimun d'officiel : <?= $CheckDDetailRally->MinimumNumberOfOfficials ?> </p>
                        <p>Nombre d'étapes : <?= $CheckDDetailRally->NumberOfSteps ?></p>
                        <p>Nombre d'Epreuve spécial : <?= $CheckDDetailRally->NumberOfEs ?></p>
                        <p>Nombre de jour de compétition : <?= $CheckDDetailRally->NumberOfCompetitonDays ?></p>
                    </div>
                    <div>
                        <p>Observation pour l'herbergement : <?= $CheckDDetailRally->ObservationAccommodation ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6"> 

                            <p>Date des besoins des OFficiels</p>
                            <p> <?= $CheckDDetailRally->RequirementDate1 ?></p>
                            <?php
                            if ($CheckDDetailRally->RequirementDate2 != "01/01/2020") {
                                ?>
                                <p><?= $CheckDDetailRally->RequirementDate2 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->RequirementDate3 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->RequirementDate3 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->RequirementDate4 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->RequirementDate4 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->RequirementDate5 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->RequirementDate5 ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <p>Dates de possibilité d'hébergement:</p>
                            <p> <?= $CheckDDetailRally->LodgingPossible1 ?></p>
                            <?php
                            if ($CheckDDetailRally->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <p><?= $CheckDDetailRally->LodgingPossible2 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->LodgingPossible3 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->LodgingPossible3 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->LodgingPossible4 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->LodgingPossible4 ?></p>
                                <?php
                            }
                            if ($CheckDDetailRally->LodgingPossible5 != "01/01/2020") {
                                ?>
                                <p> <?= $CheckDDetailRally->LodgingPossible5 ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="BtnRallyInscription col-lg-12">
                            <a href="RegistrationOfOfficialsOnARally.php?IdRally=<?= $CheckDDetailRally->IdRally?>&IdSportEvent=<?= $CheckDDetailRally->IdSportEvent?>"><button>Je m'inscrit sur ce rallye</button></a>
                        </div>

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