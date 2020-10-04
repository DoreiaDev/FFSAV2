<?php
include_once '../Config.php';
include_once '../Controller/AddLeagueCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
//if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 ">
            <h1>Ajouter une ligues</h1>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 leftColumm">
            <?php
            ?>
        </div>
        <div class="col-lg-6 centralColumm">
            <div>
                <h2>Utiliser le formulaire suivant pour ajouté une ligue</h2>
            </div>
             <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
            <div>
                <form name="FormAddLeague" method="POST" id="FormAddLeague">
                    <div>
                        <label for="NameLeague">Nom de la ligue</label>
                        <input type="text" id="NameLeague" name="NameLeague" value="<?= isset($_POST['NameLeague']) ? $_POST['NameLeague'] : '' ?>"  />
                        <p class="text-danger" id="ErrorMailUserConnect"><?= isset($formError['NameLeague']) ? $formError['NameLeague'] : '' ?></p>
                    </div>
                    <div>
                        <input type="submit" id="AddLeague" name="AddLeague" value="Ajouter une ligue"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 rigthColumm">
              <div>
                <a href="ListOfLeague.php"><button>Retour</button></a>
            </div>
        </div>
    </div>
</div>
<?php
//} else {
//    include_once '../Include/RestrictedZone.php';
//}
include_once '../include/footer.php';
?>