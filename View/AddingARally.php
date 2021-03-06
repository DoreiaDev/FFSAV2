<?php
include_once '../Config.php';
include_once '../Controller/AddingARallyCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Ajout d'un rallye tout terrain</h1>
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
                    <h2>Pour ajouter un nouveau Rallye/ Rallye Tout Terrain utiliser le formulaire suivant</h2>
                </div>
                <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <div>
                    <form name="FormAddCompetition" id="FormAddCompetition" method="POST" >
                        <div>
                            <label for="OpenOrClose">Ouvrir la compétition: </label>
                            <select class="custom-select custom-select-sm" name="OpenOrClose" id="OpenOrClose">
                                <option selected="" value="0">Choissez si vous ouvrez la compétition à l'nscription</option>
                                <option value="Open">Ouvert</option>
                                <option value="Close">Fermé</option>
                            </select>
                            <p class="text-danger"><?= isset($formError['OpenOrClose']) ? $formError['OpenOrClose'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélection du Type de Competiton </label><br>
                            <select class="custom-select custom-select-sm" name="TypeOfCompetiton" id="TypeOfCompetiton">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DisplayListOfCompetitions as $DiplayCompetitionType) {
                                    $IdCompetitionType = $DiplayCompetitionType->id;
                                    if ($IdCompetitionType == 1 || $IdCompetitionType == 2) {
                                        ?>
                                        <option value="<?= $DiplayCompetitionType->id ?>"> <?= $DiplayCompetitionType->TypeOfCompetiton ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                            <p class="text-danger"><?= isset($formError['TypeOfCompetiton']) ? $formError['TypeOfCompetiton'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélection de la catégorie de la comptétion :*</label><br>
                            <select class="custom-select custom-select-sm" name="CategoryCompetition" id="CategoryCompetition">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DisplayCategoryCompetion as $ListCategoryCompetition) {
                                    ?>
                                    <option value="<?= $ListCategoryCompetition->id ?>"> <?= $ListCategoryCompetition->CategoryCompetition ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['CategoryCompetition']) ? $formError['CategoryCompetition'] : '' ?></p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
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
                                    <label for="Observation">Obervation  pour la compétition</label>
                                    <input type="text" name="Observation" value="<?= isset($_POST['Observation']) ? $_POST['Observation'] : '' ?>" id=""/>
                                    <p class="text-danger" id="ErrorObservation"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                            </div>
                        </div>
                        <div>
                            <label>Sélectionnez  dans l'ASA Organisatrice dans liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="id_0108asap_asa" id="id_0108asap_asa">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
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

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label for="NumberOfSteps">Nombre d'étapes</label>
                                    <input type="text" name="NumberOfSteps" value="<?= isset($_POST['NumberOfSteps']) ? $_POST['NumberOfSteps'] : '' ?>" id="NumberOfSteps"/>
                                    <p class="text-danger" id="ErrorNumberOfSteps"><?= isset($formError['NumberOfSteps']) ? $formError['NumberOfSteps'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="NumberOfEs">Nombre d'ES</label>
                                    <input type="text" name="NumberOfEs" value="<?= isset($_POST['NumberOfEs']) ? $_POST['NumberOfEs'] : '' ?>" id=""/>
                                    <p class="text-danger" id="ErrorNumberOfEs"><?= isset($formError['NumberOfEs']) ? $formError['NumberOfEs'] : '' ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="NumberOfCompetitonDays">Nombre de jour de compétition</label>
                                    <input type="text" name="NumberOfCompetitonDays" value="<?= isset($_POST['NumberOfCompetitonDays']) ? $_POST['NumberOfCompetitonDays'] : '' ?>" id="NumberOfCompetitonDays"/>
                                    <p class="text-danger" id="ErrorNumberOfCompetitonDays"><?= isset($formError['NumberOfCompetitonDays']) ? $formError['NumberOfCompetitonDays'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="ObservationAccommodation">Information sur l'hébergement</label>
                                    <input type="text" name="ObservationAccommodation" value="<?= isset($_POST['ObservationAccommodation']) ? $_POST['ObservationAccommodation'] : '' ?>" id="ObservationAccommodation"/>
                                    <p class="text-danger" id="ErrorObservationAccommodation"><?= isset($formError['ObservationAccommodation']) ? $formError['ObservationAccommodation'] : '' ?></p>
                                </div>
                            </div>
                        </div> 
                        <div>
                            <p>Date des besoin des officiels pour le rallye</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Date des besoins sur le terrain ou pc</p>
                                <div>
                                    <label for="RequirementDate1">date des besoins 1</label>
                                    <input type="date" name="RequirementDate1" value="<?= isset($_POST['RequirementDate1']) ? $_POST['RequirementDate1'] : '' ?>" id="RequirementDate1"/>
                                    <p class="text-danger" id="ErrorRequirementDate1"><?= isset($formError['RequirementDate1']) ? $formError['RequirementDate1'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="RequirementDate2">Date des besoins 2</label>
                                    <input type="date" name="RequirementDate2" value="<?= isset($_POST['RequirementDate2']) ? $_POST['RequirementDate2'] : '' ?>" id="RequirementDate2"/>
                                    <p class="text-danger" id="ErrorRequirementDate2"><?= isset($formError['RequirementDate2']) ? $formError['RequirementDate2'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="RequirementDate3">Date des besoins 3</label>
                                    <input type="date" name="RequirementDate3" value="<?= isset($_POST['RequirementDate3']) ? $_POST['RequirementDate3'] : '' ?>" id="RequirementDate3"/>
                                    <p class="text-danger" id="ErrorRequirementDate3"><?= isset($formError['RequirementDate3']) ? $formError['RequirementDate3'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="RequirementDate4">Date des besoins 4</label>
                                    <input type="date" name="RequirementDate4" value="<?= isset($_POST['RequirementDate4']) ? $_POST['RequirementDate4'] : '' ?>" id="RequirementDate4"/>
                                    <p class="text-danger" id="ErrorRequirementDate4"><?= isset($formError['RequirementDate4']) ? $formError['RequirementDate4'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="RequirementDate5">Date des besoins 5</label>
                                    <input type="date" name="RequirementDate5" value="<?= isset($_POST['RequirementDate5']) ? $_POST['RequirementDate5'] : '' ?>" id="RequirementDate5"/>
                                    <p class="text-danger" id="ErrorRequirementDate5"><?= isset($formError['RequirementDate5']) ? $formError['RequirementDate5'] : '' ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                  <p>Date des Possibilitées d'hébergement  </p>
                                <div>
                                    <label for="LodgingPossible1">date Hérgement 1</label>
                                    <input type="date" name="LodgingPossible1" value="<?= isset($_POST['LodgingPossible1']) ? $_POST['LodgingPossible1'] : '' ?>" id="LodgingPossible1"/>
                                    <p class="text-danger" id="ErrorLodgingPossible1"><?= isset($formError['LodgingPossible1']) ? $formError['LodgingPossible1'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="LodgingPossible2">date Hérgement 2</label>
                                    <input type="date" name="LodgingPossible2" value="<?= isset($_POST['LodgingPossible2']) ? $_POST['LodgingPossible2'] : '' ?>" id="LodgingPossible2"/>
                                    <p class="text-danger" id="ErrorLodgingPossible2"><?= isset($formError['LodgingPossible2']) ? $formError['LodgingPossible2'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="LodgingPossible3">date Hérgement 3</label>
                                    <input type="date" name="LodgingPossible3" value="<?= isset($_POST['LodgingPossible3']) ? $_POST['LodgingPossible3'] : '' ?>" id="LodgingPossible3"/>
                                    <p class="text-danger" id="ErrorLodgingPossible3"><?= isset($formError['LodgingPossible3']) ? $formError['LodgingPossible3'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="LodgingPossible4">date Hérgement 4</label>
                                    <input type="date" name="LodgingPossible4" value="<?= isset($_POST['LodgingPossible4']) ? $_POST['LodgingPossible4'] : '' ?>" id="LodgingPossible4"/>
                                    <p class="text-danger" id="ErrorLodgingPossible4"><?= isset($formError['LodgingPossible4']) ? $formError['LodgingPossible4'] : '' ?></p>
                                </div>
                                <div>
                                    <label for="LodgingPossible5">date Hérgement 5</label>
                                    <input type="date" name="LodgingPossible5" value="<?= isset($_POST['LodgingPossible5']) ? $_POST['LodgingPossible5'] : '' ?>" id="LodgingPossible5"/>
                                    <p class="text-danger" id="ErrorLodgingPossible5"><?= isset($formError['LodgingPossible5']) ? $formError['LodgingPossible5'] : '' ?></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input name="BtnAddingARally" id="BtnAddingARally" type="submit" value="Ajouter un Rallye" />
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