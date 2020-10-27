<?php
include_once '../Config.php';
include_once '../Controller/RegistrationOfOfficialsOnACompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Vous souhaitez vous inscrire sur le <?= $CheckDetailDisplyCompetition->TypeOfCompetiton ?> <?= $CheckDetailDisplyCompetition->NameOfTheTest ?>  </h1>
            </div>
            <div class="col-lg-3">
                <div>
                    <a href="ListOfOpenCompetition.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <?php
                ?>
            </div>
            <div class="col-lg-6 centralColumm">
  <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <div>
                    <form name="FormRegistrationOfOfficialsOnARally" method="POST" >
                        <div>
                            <label>Etes vous disponible pour participé au Rallye  :*</label><br>
                            <select class="custom-select custom-select-sm" name="Availability" id="Availability">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <option value="Oui "> Je suis disponible</option>
                                <option value="NON"> Je suis indisponible</option> </select>
                            <p class="text-danger"><?= isset($formError['Availability']) ? $formError['Availability'] : '' ?></p>
                        </div>
                        <div>
                            <label>Etes vous disponible le <?= $CheckDetailDisplyCompetition->RequirementDate1 ?>  :*</label><br>
                            <select class="custom-select custom-select-sm" name="RequirementDate1" id="RequirementDate1">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <option value="Oui "> Je suis disponible</option>
                                <option value="NON"> Je suis indisponible</option> </select>
                            <p class="text-danger"><?= isset($formError['RequirementDate1']) ? $formError['RequirementDate1'] : '' ?></p>
                        </div>
                        <div>  
                            <?php
                            if ($CheckDetailDisplyCompetition->RequirementDate2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDetailDisplyCompetition->RequirementDate2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate2" id="RequirementDate2">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate2']) ? $formError['RequirementDate2'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>  
                            <?php
                            if ($CheckDetailDisplyCompetition->RequirementDate3 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDetailDisplyCompetition->RequirementDate3 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate3" id="RequirementDate3">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate3']) ? $formError['RequirementDate3'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>   
                            <?php
                            if ($CheckDetailDisplyCompetition->RequirementDate4 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDetailDisplyCompetition->RequirementDate4 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate4" id="RequirementDate4">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate4']) ? $formError['RequirementDate4'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDetailDisplyCompetition->RequirementDate5 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDetailDisplyCompetition->RequirementDate5 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate5" id="RequirementDate5">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate5']) ? $formError['RequirementDate5'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> <?= $CheckDetailDisplyCompetition->ObservationAccommodation ?></div>
                        <div>   
                            <label>Avez vous besoin d'un hébergement le  <?= $CheckDetailDisplyCompetition->LodgingPossible1 ?>  :*</label><br>
                            <select class="custom-select custom-select-sm" name="LodgingPossible1" id="LodgingPossible1">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <option value="Oui "> Oui Il me faut un hébergement</option>
                                <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                            </select>
                            <p class="text-danger"><?= isset($formError['LodgingPossible1']) ? $formError['LodgingPossible1'] : '' ?></p>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDetailDisplyCompetition->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDetailDisplyCompetition->LodgingPossible2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible2" id="LodgingPossible2">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Oui Il me faut un hébergement</option>
                                    <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                                </select>
                                <p class="text-danger"><?= isset($formError['LodgingPossible2']) ? $formError['LodgingPossible2'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDetailDisplyCompetition->LodgingPossible3 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDetailDisplyCompetition->LodgingPossible3 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible3" id="LodgingPossible3">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Oui Il me faut un hébergement</option>
                                    <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                                </select>
                                <p class="text-danger"><?= isset($formError['LodgingPossible3']) ? $formError['LodgingPossible3'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDetailDisplyCompetition->LodgingPossible4 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDetailDisplyCompetition->LodgingPossible4 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible4" id="LodgingPossible4">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Oui Il me faut un hébergement</option>
                                    <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                                </select>
                                <p class="text-danger"><?= isset($formError['LodgingPossible4']) ? $formError['LodgingPossible4'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDetailDisplyCompetition->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDetailDisplyCompetition->LodgingPossible2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible2" id="LodgingPossible2">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <option value="Oui "> Oui Il me faut un hébergement</option>
                                    <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                                </select>
                                <p class="text-danger"><?= isset($formError['LodgingPossible2']) ? $formError['LodgingPossible2'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>
                            <label for="ObservationAccommodation">Demande concernant  les poste occupé ou  l'hébergement:</label><br>
                            <input type="text" name="ObservationAccommodation" value="<?= isset($_POST['ObservationAccommodation']) ? $_POST['ObservationAccommodation'] : '' ?>" id="Observation-RequestFromOfficial"/>
                            <p class="text-danger" id="Error"><?= isset($formError['ObservationAccommodation']) ? $formError['ObservationAccommodation'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélectionnez votre fonction dans la liste suivante  dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="Idfunction" id="Idfunction">
                                <option selected="">Choissez dans la liste suivante </option>
                                <?php
                                    foreach ($CheckFunctionByMember as $Function) {
                                        ?>
                                        <option value="<?= $Function->id ?>"> <?= $Function->TypeOfLicence ?></option>
                                        <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['Idfunction']) ? $formError['Idfunction'] : '' ?></p>
                        </div>
                        <div>
                            <label for="IdMembers"></label>
                            <input type="hidden" name="IdMembers" value="<?= $_SESSION['idUser'] ?>" id="IdMembers"/>
                            <p class="text-danger" id="ErrorIdMembers"><?= isset($formError['IdMembers']) ? $formError['IdMembers'] : '' ?></p>
                        </div>
                        <div>
                            <input type="submit" name="BtnRegistrationOfOfficial" id="BtnRegistrationOfOfficial" value="Validé mon inscription" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>