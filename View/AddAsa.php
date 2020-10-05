<?php
include_once '../Config.php';
include_once '../Controller/AddAsaCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Ajout d'une ASA</h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <h2>Pour ajouté une ASA Utilisez le formulaire suivant:</h2>
                </div>
                <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <div>
                    <form name="FormAddAsa" id="FormAddAsa" method="POST">
                        <div>
                            <label for="NameAsa">Nom de l'ASA</label>
                            <input type="text" name="NameAsa" value="<?= isset($_POST['NameAsa']) ? $_POST['NameAsa'] : '' ?>" id="NameAsa"/>
                            <p class="text-danger" id="ErrorMailUserConnect"><?= isset($formError['NameAsa']) ? $formError['NameAsa'] : '' ?></p>
                        </div>  
                        <div>
                            <label for="NumberAsa">Numéro de l'ASA</label>
                            <input type="text" name="NumberAsa" value="<?= isset($_POST['NumberAsa']) ? $_POST['NumberAsa'] : '' ?>" id="NameAsa"/>
                            <p class="text-danger" id="ErrorMailUserConnect"><?= isset($formError['NumberAsa']) ? $formError['NumberAsa'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélectionnez la ligue dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="League" id="league">
                                <option selected="">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($ListLeague as $DisplayOfLeagues) {
                                    ?>
                                    <option value="<?= $DisplayOfLeagues->id ?>"> <?= $DisplayOfLeagues->LeagueName ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['League']) ? $formError['League'] : '' ?></p>
                        </div>
                        <div>
                            <input type="submit" name="BtnAddAsa" id="BtnAddAsa" value="Ajouter une ASA/AFK" />
                        </div> 
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
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