<?php
include_once '../Config.php';
include_once '../Controller/DeleteAsaCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Surpimer l'ASA ou l'ASK : <?= $ListDisplayAsa->AsaName ?></h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
            </div>
            <div class="col-lg-7 centralColumm ">
                <div>
                <img  src="../Assets/img/Icone/kisspng-warning-sign-hazard-symbol-signage-attention-5ab65eb9e38888.748570571521901241932.png" style="width: 100px;" class="images_petit" alt=""/>
                <h2 class="text-danger">Si vous validez la suppression de cette ASA ou ASK  c'est irréversible</h2>
                </div>
                <div>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
             <div>
                    <form name="FormDeleteAsa" id="FormDeleteAsa" method="POST">
                        <div>
                            <input type="hidden" name="IdAsa" id="IdAsa" value="<?= $_GET['IdAsa'] ?>"/>
                        </div>
                        <div>
                            <input type="submit" name="BtnDeleteAsa" id="BtnDeleteAsa" value="Supprimer"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 rigthColumm">
                <div>
                    <a href="ListOfAsa.php"><button>Retour</button></a>
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