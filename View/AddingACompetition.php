<?php
include_once '../Config.php';
include_once '../Controller/AddingACompetitionCtlr.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Ajouter une nouvelle épreuve au calendrier</h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <h2>Pour ajouter une nouvelle épreuve utiliser le formulaire suivant</h2>
                </div>
                <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <div>
                    <form name="FormAddCompetition" id="FormAddCompetition" method="POST" >
                        <div>
                            <label for="NameOfTheTest">Nom de l'épreuve</label>
                            <input type="text" name="NameOfTheTest" value="<?= isset($_POST['NameOfTheTest']) ? $_POST['NameOfTheTest'] : '' ?>" id="NameOfTheTest"/>
                            <p class="text-danger" id="ErrorNameOfTheTest"><?= isset($formError['NameOfTheTest']) ? $formError['NameOfTheTest'] : '' ?></p>
                        </div> 
                        <div>
                            <label for="LocationCircuit">Ville de départ/circuit</label>
                            <input type="text" name="LocationCircuit" value="<?= isset($_POST['LocationCircuit']) ? $_POST['LocationCircuit'] : '' ?>" id="LocationCircuit"/>
                            <p class="text-danger" id="ErrorLocationCircuit"><?= isset($formError['LocationCircuit']) ? $formError['LocationCircuit'] : '' ?></p>
                        </div>
                        <div>
                            <label for="Observation">Obervation particulier pour la compétition</label>
                            <input type="text" name="Observation" value="<?= isset($_POST['Observation']) ? $_POST['Observation'] : '' ?>" id=""/>
                            <p class="text-danger" id="ErrorObservation"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                        </div>
                        <div>
                            <label for="CompetitionStarDay">Date de début de la compétion</label>
                            <input type="date" name="CompetitionStarDay" value="<?= isset($_POST['CompetitionStarDay']) ? $_POST['CompetitionStarDay'] : '' ?>" id="CompetitionStarDay"/>
                            <p class="text-danger" id="ErrorCompetitionStarDay"><?= isset($formError['CompetitionStarDay']) ? $formError['CompetitionStarDay'] : '' ?></p>
                        </div>

                        <div>
                            <label for="CompetitionEndDay">Date de fin de la compétition</label>
                            <input type="date" name="CompetitionEndDay" value="<?= isset($_POST['CompetitionEndDay']) ? $_POST['CompetitionEndDay'] : '' ?>" id=""/>
                            <p class="text-danger" id="ErrorCompetitionEndDay"><?= isset($formError['CompetitionEndDay']) ? $formError['CompetitionEndDay'] : '' ?></p>
                        </div>
                        <div>
                            <label for="MinimumNumberOfOfficials">Besoin minimun d'officiel</label>
                            <input type="MinimumNumberOfOfficials" name="MinimumNumberOfOfficials" value="<?= isset($_POST['MinimumNumberOfOfficials']) ? $_POST['MinimumNumberOfOfficials'] : '' ?>" id="MinimumNumberOfOfficials"/>
                            <p class="text-danger" id="ErrorMinimumNumberOfOfficials"><?= isset($formError['MinimumNumberOfOfficials']) ? $formError['MinimumNumberOfOfficials'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélectionnez  dans l'ASA Organisatrice dans liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="id_0108asap_asa" id="id_0108asap_asa">
                                <option selected="">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DiplayListOfAsa as $DiplayOfTheListOfAsa) {
                                    ?>
                                    <option value="<?= $DiplayOfTheListOfAsa->id ?>"> <?= $DiplayOfTheListOfAsa->AsaName ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['id_0108asap_asa']) ? $formError['id_0108asap_asa'] : '' ?></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <div>
                    <a href="ChoiceOfCompetition.php"><button>Retour</button></a>
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
