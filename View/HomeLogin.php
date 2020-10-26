<?php
include_once '../Config.php';
include_once '../Controller/HomeLoginCtrl.php';
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
                <h1>Bonjour <?= $_SESSION['Firstname'] ?> </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <div>
                    <?php
                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                        ?>
                    <h3>Accès responsable</h3>
                        <a class="dropdown-item" href="ListOfAsa.php">Gestion des ASA/ASK</a>
                        <a class="dropdown-item" href="ChoiceOfCompetition.php">Choisir le type de compétition à ouvrir</a>
                        <?php
                    }
                    ?>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $PresidentOfAsa)) {
                        ?>
                    <h3>Accès président </h3>
                        <a class="dropdown-item"  href="ListOfLeague.php">Gestion des Ligues </a>
                        <a class="dropdown-item" href="ListOfFunction.php">Gestion des licences (fonction)</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <?php
                    foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                        $IdProfile = $PrimaryLicencesList->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p>Vous avez la fonction  <?= $PrimaryLicencesList->TypeOfLicence ?></p>
                            <?php
                        }
                    }
                    foreach ($ListLicences as $MemberDetail) {
                        $IdProfile = $MemberDetail->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p>et vos autre licences</p>
                            <p><?= $MemberDetail->TypeOfLicence ?> Avec le Numéro <?= $MemberDetail->SecondaryLicense ?></p>

                        <?php } else {
                            ?>
                            <p>Vous n'avez pas d'autres licences pour le moment </p>
                            <?php
                        }
                    }
                    ?>
                </div>  
                <div>
                    <p>Vous êtes sur le site d'inscription en ligne au compétition de la FFSA comme officiel </p>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <div>
                    <?php
                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
                        ?>
                    <h3>Partie Officiel</h3>
                    <a class="dropdown-item" href="ListOfOpenCompetition.php">Liste des compétitions </a>
                    <a class="dropdown-item" href="CompétitionWhereIAmRegistred.php">Competition Ou je suis inscrit</a>
                          <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../Include/Footer.php';
?>