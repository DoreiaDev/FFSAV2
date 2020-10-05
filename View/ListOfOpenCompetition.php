<?php
include_once '../Config.php';
include_once '../Controller/ListOfOpenCompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Compétition ouverte </h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <h2>Séléctionner  le type de compétition, la ligue dans le formulaire suivant: </h2>
                </div>
                <div>
                    <form name="TypeAndLeague" id="TypeAndLeague" method="POST">
                        <div>
                            <label>Sélectionnez le type de compétition dans la liste suivante :</label><br>
                            <select class="custom-select custom-select-sm" name="TypeOfCompetiton" id="TypeOfCompetiton">
                                <option selected=""value="0">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DiplayListOfTypeCompetiton as $TypeOfCompetiton) {
                                    ?>
                                    <option value="<?= $TypeOfCompetiton->id ?>"> <?= $TypeOfCompetiton->TypeOfCompetiton ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                              <label>Sélectionnez la ligue dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="League" id="league">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($ListLeague as $DisplayOfLeagues) {
                                    ?>
                                    <option value="<?= $DisplayOfLeagues->id ?>"> <?= $DisplayOfLeagues->LeagueName ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </select>
                        </div>
                        <div>
                            <input type="submit"  name="SelectTypeAndLeague" id="SelectTypeAndLeague" value="Selectionner" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
               <div>
                   <a href="HomeLogin.php"><button>Retour</button></a>
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