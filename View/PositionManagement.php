<?php
include_once '../Config.php';
include_once '../Controller/PositionManagementCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10 ">
                <h1>Affecter les postes Au Officiel</h1>
            </div>
            <div class="col-lg-1">
                <a href="PostManagement.php"><button>Retour</button></a>
            </div>
        </div>
        <div class="row">
           
            <div class="col-lg-12 centralColumm">
                <div>
                    <p>Cource de cote, slalom etc</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom de la compétition </th>
                                <th scope="col">Type de compétition </th>
                                <th scope="col">Nom de l'officiel</th>
                                <th scope="col">Prénom de l'officiel</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Disponible</th>
                                <th scope="col">Affecter l'officiel</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($DisplayByCompetition as $DetailCompetition) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $DetailCompetition->NameOfTheTest ?></th>
                                    <td><?= $DetailCompetition->TypeOfCompetiton ?></td>
                                    <td><?= $DetailCompetition->Name?></td>
                                    <td><?= $DetailCompetition->Firstname?></td>
                                    <td><?= $DetailCompetition->TypeOfLicence?></td>
                                    <td><?= $DetailCompetition->Aviable?></td>
                                    <td><a href="">ICi</a></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Rallye, Rallye Tout Terrain</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom de la compétition </th>
                                <th scope="col">Type de compétition </th>
                                <th scope="col">Nom de l'officiel</th>
                                <th scope="col">Prénom de l'officiel</th>
                                <th scope="col">Poste </th>
                                <th scope="col">Disponible</th>
                                <th scope="col">Affecter l'officiel</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($DisplaylisteByRally as $DetailRally) {
                                ?>
                                <tr>              
                                    <th scope="row"><?= $DetailRally->NameOfTheTest ?></th>
                                    <td><?= $DetailRally->TypeOfCompetiton ?></td>
                                    <td><?= $DetailRally->Name ?></td>
                                    <td><?= $DetailRally->Firstname ?></td>
                                    <td><?= $DetailRally->TypeOfLicence ?></td>
                                    <td><?= $DetailRally->Aviable ?></td>
                                    <td><a href="">ICi</a></td>
                                </tr>
                                <?php
                            }
//                
                            ?>
                        </tbody>
                    </table>
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