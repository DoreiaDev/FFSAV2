<?php
$title='Suprimer une licence(fonction)';
$formError = array();
$RegexId = '/^\d+$/';
$DisplayLicense=new functions();
if (isset($_GET['IdFunction'])) {
    if (preg_match($RegexId, $_GET['IdFunction'])) {
        $DisplayLicense->id = htmlspecialchars($_GET['IdFunction']);
    }
}
$DeleteFuncion= new functions();
if (isset($_POST['BtnDeleteFunction'])) {
    if (isset($_POST['IdFunction'])) {
        if (preg_match($RegexId, $_POST['IdFunction'])) {
            $DeleteFuncion->id = htmlspecialchars($_POST['IdFunction']);
        }
    }
    $CheckDeleteFuncion = $DeleteFuncion->DeleteFunction();
    if ($CheckDeleteFuncion == true) {
            header("Location: ListOfFunction.php");
    } else {
        $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . '.une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
    }
}
//affichage de la licence correspondant à l'id transmit en get
$DiplayTheLicense=$DisplayLicense->DisplayListOfFunctionForId();
