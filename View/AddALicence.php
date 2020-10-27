<?php
include_once '../Config.php';
include_once '../Controller/AddALicenceCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10 ">
                <h1>Ajouté une licence à mon profils </h1>
            </div>
            <div class="col-lg-1">
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <p>Pour ajouté une license à votre profils utilisé le formulaire suivant:</p> 
                </div>
                <div>
                    <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <div>
                    <form method="POST" name="FormAddALicence">
                        <div>
                            <input type="hidden" name="IdMembers" value="<?= $_SESSION['idUser'] ?>" id="IdMembers"/>
                        </div>
                        <div>
                            <label for="LicenseNumber"></label>
                            <input type="text" name="LicenseNumber" value="<?= isset($_POST['LicenseNumber']) ? $_POST['LicenseNumber'] : '' ?>" id="LicenseNumber"/>
                            <p class="text-danger" id="Error"><?= isset($formError['LicenseNumber']) ? $formError['LicenseNumber'] : '' ?></p>
                        </div>
                        <div>     
                            <?php
                            if (in_array($_SESSION['access'], $Official)) {
                                ?>
                                <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                                <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <?php
                                    foreach ($listerFunctions as $FunctionList) {
                                        if ($FunctionList->PermissionToAccess == 55) {
                                            ?>
                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                            <?php } ?>
                        </div>
                        <div>     
                            <?php
                            if (in_array($_SESSION['access'], $OfficialOfManager)) {
                                ?>
                                <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                                <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                    <option selected="" value="0">Choissez dans la liste suivante </option>
                                    <?php
                                    foreach ($listerFunctions as $FunctionList) {
                                        if ($FunctionList->PermissionToAccess != 259 && $FunctionList->PermissionToAccess != 405) {
                                            ?>
                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>     
                            <?php
                            if (in_array($_SESSION['access'], $President)) {
                                ?>
                                <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                                <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                    <option selected="" value="0//">Choissez dans la liste suivante </option>
                                    <?php
                                    foreach ($listerFunctions as $FunctionList) {
                                        if ($FunctionList->PermissionToAccess != 259) {
                                            ?>
                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>
                            <input type="submit" name="BtnAddALicence" value="Ajouté une autre licence" id="BtnAddALicence" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>