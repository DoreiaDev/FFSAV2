<?php
include_once '../Config.php';
include_once '../Controller/ModifyFunctionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
              
            </div>
            <div class="col-lg-6 ">
                <h1>Modification de la licence(fonction) :<?= $DiplayTheLicense->TypeOfLicence?></h1>
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
                    <div>
                        <p class="text-danger"><?= isset($ErrorForm) ? $ErrorForm : '' ?></p>
                        <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                    </div>
                    <form name="FormModifyFunction" id="FormModifyFunction" method="POST" >
                       <div>
                            <label for="NameFunction">Nom de la Licence/fonction</label>
                            <input type="text" name="NameFunction" value="<?= $DiplayTheLicense->TypeOfLicence?>" id="NameFunction"/>
                            <p class="text-danger" id="ErrorMailUserConnect"><?= isset($formError['NameFunction']) ? $formError['NameFunction'] : '' ?></p>
                        </div>
                        <div>
                            <label>Sélectionnez la ligue dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="Access" id="Access">
                                <option selected="">Droit actuelle (a reselectioner);<?= $DiplayTheLicense->TypeOfAcces?>  </option>
                                <?php
                                foreach ($ListAccess as $DisplayPermissionOfAccess) {
                                    ?>
                                    <option value="<?= $DisplayPermissionOfAccess->id ?>"> <?= $DisplayPermissionOfAccess->TypeOfAcces ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['League']) ? $formError['League'] : '' ?></p>
                        </div>
                        <div>
                            <input type="submit" name="BtnModifyFunction" id="BtnModifyFunction" value="Modifier la Licence/fonction" />
                        </div> 
                    </form>            
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <div>
                    <a href="ListOfFunction.php"><button>Retour</button></a>
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