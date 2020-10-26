<?php
include_once '../Config.php';
include_once '../Controller/CompétitionWhereIAmRegistredCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Liste des compétition ou je suis inscrit </h1>
            </div>
            <div class="col-lg-3">
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 leftColumm">

            </div>
            <div class="col-lg-10 centralColumm">
                <div>
                    <div>
                        <h2>Course de côte, Drift... </h2>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nom de l'épreuves </th>
                                    <th scope="col">Type de compétition </th>
                                    <th scope="col">Circuit ou ville départ </th>
                                    <th scope="col">Observation liér a la compétition </th>
                                    <th scope="col">Disponible </th>
                                    <th scope="col">Détaille</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($CheckDisplayCompetitionByMember as $CompetitionbyMembers) {
                                    if ($CompetitionbyMembers->IdMemberCompetition == $IdMember) {
                                        ?>
                                        <tr>              
                                            <th scope="row"><?= $CompetitionbyMembers->NameOfTheTest ?></th>
                                            <td><?= $CompetitionbyMembers->TypeOfCompetiton ?></td>
                                            <td><?= $CompetitionbyMembers->Location_Circuit ?></td>
                                            <td><?= $CompetitionbyMembers->Observation ?></td>
                                            <?php
                                            if ($CompetitionbyMembers->Aviable == 'Oui') {
                                                ?>
                                                <td>Disponible</td>
                                                <?php
                                            } else {
                                                ?>
                                                <td>Indisponible</td>
                                                <?php
                                            }
                                            ?>
                                            <td><a href="">ICI</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div>
                        <h2>Rallye, Rallye tout terrain </h2>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nom de l'épreuves </th>
                                    <th scope="col">Type de compétition </th>
                                    <th scope="col">Circuit ou ville départ </th>
                                    <th scope="col">Poste </th>
                                    <th scope="col">Disponible </th>
                                    <th scope="col">Détaille</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($CheckDisplayRallyByMember as $RallybyMembers) {
                                    if ($RallybyMembers->IdMemberRally == $IdMember) {
                                        ?>
                                        <tr>              
                                            <th scope="row"><?= $RallybyMembers->NameOfTheTest ?></th>
                                            <td><?= $RallybyMembers->TypeOfCompetiton ?></td>
                                            <td><?= $RallybyMembers->Location_Circuit ?></td>
                                            <td><?= $RallybyMembers->Observation ?></td>
                                            <?php
                                            if ($RallybyMembers->Aviable == 'Oui') {
                                                ?>
                                                <td>Disponible</td>
                                                <?php
                                            } else {
                                                ?>
                                                <td>Indisponible</td>
                                                <?php
                                            }
                                            ?>
                                            <td><a href="">ICI</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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