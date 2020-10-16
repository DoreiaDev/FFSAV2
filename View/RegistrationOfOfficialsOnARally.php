<?php
include_once '../Config.php';
include_once '../Controller/RegistrationOfOfficialsOnARallyCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                <h1>Vous souhaitez vous inscrire sur le <?= $CheckDDetailRally->TypeOfCompetiton ?> <?= $CheckDDetailRally->NameOfTheTest ?>  </h1>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
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
                                <option value="Oui "> Je suis disponible</option>
                                <option value="NON"> Je suis indisponible</option> </select>
                            <p class="text-danger"><?= isset($formError['Availability']) ? $formError['Availability'] : '' ?></p>
                        </div>
                        <div>
                            <label>Etes vous disponible le <?= $CheckDDetailRally->RequirementDate1 ?>  :*</label><br>
                            <select class="custom-select custom-select-sm" name="RequirementDate1" id="RequirementDate1">
                                <option value="Oui "> Je suis disponible</option>
                                <option value="NON"> Je suis indisponible</option> </select>
                            <p class="text-danger"><?= isset($formError['RequirementDate1']) ? $formError['RequirementDate1'] : '' ?></p>
                        </div>
                        <div>  
                            <?php
                            if ($CheckDDetailRally->RequirementDate2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDDetailRally->RequirementDate2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate2" id="RequirementDate2">
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate2']) ? $formError['RequirementDate2'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>  
                            <?php
                            if ($CheckDDetailRally->RequirementDate3 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDDetailRally->RequirementDate3 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate3" id="RequirementDate3">
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate3']) ? $formError['RequirementDate3'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>   
                            <?php
                            if ($CheckDDetailRally->RequirementDate4 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le <?= $CheckDDetailRally->RequirementDate4 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate4" id="RequirementDate4">
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate4']) ? $formError['RequirementDate4'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDDetailRally->RequirementDate5 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDDetailRally->RequirementDate5 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="RequirementDate5" id="RequirementDate5">
                                    <option value="Oui "> Je suis disponible</option>
                                    <option value="NON"> Je suis indisponible</option> </select>
                                <p class="text-danger"><?= isset($formError['RequirementDate5']) ? $formError['RequirementDate5'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div> <?= $CheckDDetailRally->ObservationAccommodation ?></div>
                        <div>   
                            <label>Avez vous besoin d'un hébergement le  <?= $CheckDDetailRally->LodgingPossible1 ?>  :*</label><br>
                            <select class="custom-select custom-select-sm" name="LodgingPossible1" id="LodgingPossible1">
                                <option value="Oui "> Oui Il me faut un hébergement</option>
                                <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                            </select>
                            <p class="text-danger"><?= isset($formError['LodgingPossible1']) ? $formError['LodgingPossible1'] : '' ?></p>
                        </div>
                        <div> 
                            <?php
                            if ($CheckDDetailRally->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDDetailRally->LodgingPossible2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible2" id="LodgingPossible2">
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
                            if ($CheckDDetailRally->LodgingPossible3 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDDetailRally->LodgingPossible3 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible3" id="LodgingPossible3">
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
                            if ($CheckDDetailRally->LodgingPossible4 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDDetailRally->LodgingPossible4 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible4" id="LodgingPossible4">
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
                            if ($CheckDDetailRally->LodgingPossible2 != "01/01/2020") {
                                ?>
                                <label>Etes vous disponible le  <?= $CheckDDetailRally->LodgingPossible2 ?>  :*</label><br>
                                <select class="custom-select custom-select-sm" name="LodgingPossible2" id="LodgingPossible2">
                                    <option value="Oui "> Oui Il me faut un hébergement</option>
                                    <option value="NON"> Je n'ai pas besoin d'hébergement </option>
                                </select>
                                <p class="text-danger"><?= isset($formError['LodgingPossible2']) ? $formError['LodgingPossible2'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>
                            <label for="Observation-RequestFromOfficial">Demande concernant  les poste occupé ou  l'hébergement:</label><br>
                            <input type="text" name="Observation-RequestFromOfficial" value="<?= isset($_POST['Observation-RequestFromOfficial']) ? $_POST['Observation-RequestFromOfficial'] : '' ?>" id="Observation-RequestFromOfficial"/>
                            <p class="text-danger" id="Error"><?= isset($formError['Observation-RequestFromOfficial']) ? $formError['Observation-RequestFromOfficial'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélectionnez votre fonction dans la liste suivante  dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="Idfunction" id="Idfunction">
                                <option selected="">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DisplayListFunction as $Function) {
                                    if ($Function->PermissionToAccess != 259) {
                                        ?>
                                        <option value="<?= $Function->id ?>"> <?= $Function->TypeOfLicence ?></option>
                                        <?php
                                    }
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