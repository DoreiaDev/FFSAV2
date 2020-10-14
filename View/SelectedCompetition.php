<?php
include_once '../Config.php';
include_once '../Controller/SelectedCompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10 ">
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
                    <?php
                }

                if ($IdLeague == 0 && $IdTypeOfCompetiton == 0) {
                    ?>
                    <h1>Liste des compétition pour Toutes les ligues et de tous les types de compétitions</h1>
                <?php }
                ?>
            </div>
            <div class="col-lg-1">
                <div>
                    <a href="ListOfOpenCompetition.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 centralColumm">
                <div>  
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nom de l'épreuve</th>
                                <th scope="col">Type d'épreuve</th>
                                <th scope="col">Localisation</th>
                                <th scope="col">Observation </th>
                                <th scope="col">Date de début </th>
                                <th scope="col">Date de fin </th>
                                <th scope="col">Detaille</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($IdLeague != 0 && $IdTypeOfCompetiton != 0) {
                                foreach ($CheckDisplaySportEvent AS $DisplayRally) {
                                    ?>
                                    <tr>           
                                        <th scope="row"><?= $DisplayRally->NameOfTheTest ?></th>
                                        <td><?= $DisplayRally->TypeOfCompetiton ?></td>
                                        <td><?= $DisplayRally->Location_Circuit ?></td>
                                        <td><?= $DisplayRally->Observation ?></td>
                                        <td><?= $DisplayRally->CompetitionStarDay ?></td>
                                        <td><?= $DisplayRally->CompetitionEndDay ?></td> 
                                        <?php
                                        if ($IdTypeOfCompetiton == 1 || $IdTypeOfCompetiton == 2) {
                                            ?>
                                            <td><a href="RallyDetails.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?>">ICI</a></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a href="DetailsOtherRace.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?><">ICI</a></td>
                                            <?php
                                        }
                                        ?>

                                    </tr>
                                    <?php
                                }
                            }
                            if ($IdLeague != 0 && $IdTypeOfCompetiton == 0) {
                                foreach ($CheckDisplaySportEvent AS $DisplayRally) {
                                    ?>
                                    <tr>           
                                        <th scope="row"><?= $DisplayRally->NameOfTheTest ?></th>
                                        <td><?= $DisplayRally->TypeOfCompetiton ?></td>
                                        <td><?= $DisplayRally->Location_Circuit ?></td>
                                        <td><?= $DisplayRally->Observation ?></td>
                                        <td><?= $DisplayRally->CompetitionStarDay ?></td>
                                        <td><?= $DisplayRally->CompetitionEndDay ?></td>  <?php
                                        if ($IdTypeOfCompetiton == 1 || $IdTypeOfCompetiton == 2) {
                                            ?>
                                            <td><a href="RallyDetails.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?>">ICI</a></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a href="DetailsOtherRace.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?><">ICI</a></td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                            }
                            if ($IdLeague == 0 && $IdTypeOfCompetiton != 0) {
                                foreach ($CheckDisplaySportEvent AS $DisplayRally) {
                                    ?>
                                    <tr>  <p>I</p>           
                                <th scope="row"><?= $DisplayRally->NameOfTheTest ?></th>
                                <td><?= $DisplayRally->TypeOfCompetiton ?></td>
                                <td><?= $DisplayRally->Location_Circuit ?></td>
                                <td><?= $DisplayRally->Observation ?></td>
                                <td><?= $DisplayRally->CompetitionStarDay ?></td>
                                <td><?= $DisplayRally->CompetitionEndDay ?></td>
                                <?php
                                if ($IdTypeOfCompetiton == 1 || $IdTypeOfCompetiton == 2) {
                                    ?>
                                    <td><a href="RallyDetails.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?>">ICI</a></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><a href="DetailsOtherRace?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?><">ICI</a></td>
                                    <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($IdLeague == 0 && $IdTypeOfCompetiton == 0) {
                            foreach ($CheckDisplaySportEvent AS $DisplayRally) {
                                ?>
                                <tr>             
                                    <th scope="row"><?= $DisplayRally->NameOfTheTest ?></th>
                                    <td><?= $DisplayRally->TypeOfCompetiton ?></td>
                                    <td><?= $DisplayRally->Location_Circuit ?></td>
                                    <td><?= $DisplayRally->Observation ?></td>
                                    <td><?= $DisplayRally->CompetitionStarDay ?></td>
                                    <td><?= $DisplayRally->CompetitionEndDay ?></td>  <?php
                                        if ($DisplayRally->TypeOfCompetiton == 'Rallye' || $DisplayRally->TypeOfCompetiton == 'Rallye tout terrain') {
                                            ?>
                                            <td><a href="RallyDetails.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?>">ICI</a></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a href="DetailsOtherRace.php?IdSportEvent=<?= $DisplayRally->IdSportEvents ?>&NameTest=<?= $DisplayRally->NameOfTheTest ?>&TypeOfCompet=<?= $DisplayRally->TypeOfCompetiton ?><">ICI</a></td>
                                            <?php
                                        }
                                        ?>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-2 rigthColumm">

                </div>
            </div>
        </div>
        <?php
    } else {
        include_once '../Include/RestrictedZone.php';
    }
    include_once '../include/footer.php';
    ?>