<?php

$title = 'Ajout d\'une licence';
$formError = array();
$RegexId = '/^\d+$/';
$AddingAnthoerLicense = new FunctionSummary();
if (isset($_POST['BtnAddALicence'])) {
    if (!empty($_POST['IdMembers'])) {
        if (preg_match($RegexId, $_POST['IdMembers'])) {
            $AddingAnthoerLicense->id_0108asap_member = htmlspecialchars($_POST['IdMembers']);
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Une erreur technique est survenue veuillez contacter le webMaster via l\'Adresse mail dev.gaetan.jonard@outlook.fr';
        }
    }
    if ($_POST['TypeOfLicence'] != 0) {
        if (preg_match($RegexId, $_POST['TypeOfLicence'])) {
            $AddingAnthoerLicense->id_0108asap_function = htmlspecialchars($_POST['TypeOfLicence']);
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Une erreur technique est survenue veuillez contacter le webMaster via l\'Adresse mail dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $formError['TypeOfLicence'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous avez oublier de selectionnée une licence';
    }
    if(!empty($_POST['LicenseNumber'])){
         if (preg_match($RegexId, $_POST['LicenseNumber'])) {
             if (strlen($_POST['LicenseNumber']) == 6) {
                 $AddingAnthoerLicense->LicenceNumber= htmlspecialchars($_POST['LicenseNumber']);
             } else {
                 $formError['LicenseNumber']='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                         . 'Votre numéro de licence doit contenir 6 chiffres!!';
             }
             
         } else {
             $formError['LicenseNumber']='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                     . 'Vous devez mettre que des chiffres dans le champs numéros de licence';
         }
    } else {
        $formError['LicenseNumber']='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous avez oubkuer de remplir votre numéro de licence';
    }
    $AddingAnthoerLicense->LicencePrimary=0;
     if (count($formError) == 0) {
         $CheckAddingAnthoerLicense=$AddingAnthoerLicense->AddPrimaryLicense();
         if($CheckAddingAnthoerLicense==true){
             header("Location: HomeLogin.php");
         } else {
               $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Une erreur technique est survenue veuillez contacter le webMaster via l\'Adresse mail dev.gaetan.jonard@outlook.fr';
         }
     }  $ErrorForm = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Vous avez des erreurs dans le formulaires ';
}
var_dump($AddingAnthoerLicense);
//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
