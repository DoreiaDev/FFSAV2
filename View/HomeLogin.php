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