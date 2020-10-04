<?php
include_once '../Config.php';
include_once '../Controller/ModifyLeagueCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Vous souhaitez modifier le noms d'une ligue</h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <h2>Utiliser le formulaire suivant:</h2>
                </div>
                <div>
                      <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
            <div>
                <form name="FormModifyLeague" method="POST" id="FormAddLeague">
                    <div>
                        <label for="ModifyNameLeague">Nom de la ligue</label>
                        <input type="text" id="ModifyNameLeague" name="ModifyNameLeague"  value="<?= $DisplayLeagues->LeagueName ?>"  />
                        <p class="text-danger" id="ErrorLeagueName"><?= isset($FormError['ModifyNameLeague']) ? $FormError['ModifyNameLeague'] : '' ?></p>
                    </div>
                    <div>
                        <input type="submit" id="BtnModifyLeague" name="BtnModifyLeague" value="Modifier une ligue"/>
                    </div>
                </form>
            </div>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm"
                 <div>
                    <a href="ListOfLeague.php"><button>Retour</button></a>
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