<?php

$title = 'Inscritption sur un rallye';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$DetailDisplayRally = new Rally();
$RegistrationOfAnOfficialForACompetition = new OfficialRegistrationCompetition();
if (isset($_GET['IdSportEvent'])) {
    if (preg_match($RegexId, $_GET['IdSportEvent'])) {
        $IdSportEvents = htmlspecialchars($_GET['IdSportEvent']);
        $DetailDisplayRally->IdSportEvents = htmlspecialchars($_GET['IdSportEvent']);
    }
}
if (isset($_POST['BtnRegistrationOfOfficial'])) {

    if (isset($_GET['IdSportEvent'])) {
        if (preg_match($RegexId, $_GET['IdSportEvent'])) {
            $RegistrationOfAnOfficialForACompetition->IdSportEvents = htmlspecialchars($_GET['IdSportEvent']);
            $DetailDisplayRally->IdSportEvents = htmlspecialchars($_GET['IdSportEvent']);
        }
    }
    if (!empty($_POST['idUser'])) {
        if (preg_match($RegexId, $_POST['idUser'])) {
            $RegistrationOfAnOfficialForACompetition->IdMembers = htmlspecialchars($_POST['idUser']);
        }
    }
    if ($_POST['Availability'] == 'Oui') {
        if (!empty($_POST['Idfunction'])) {
            if (preg_match($RegexId, $_POST['Idfunction'])) {
                $RegistrationOfAnOfficialForACompetition->Idfunction = htmlspecialchars($_POST['Idfunction']);
            } else {
                $formError['Idfunction'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'Merci de ne mettre que des caratéres Chiffre';
            }
        } else {
            $formError['Idfunction'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir nvotre fonction pendant le rallye';
        }

        if (!empty($_POST['Availability'])) {
            if (preg_match($RegexTitle, $_POST['Availability'])) {
                $k->d = htmlspecialchars($_POST['Availability']);
            }
        } else {
            $formError['Availability'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non durant le rallye ';
        }
        
    } else {
        $CheckRegistrationOfAnOfficialForACompetition= $RegistrationOfAnOfficialForACompetition->OfficalRegistrationForCompétition();
        if($CheckRegistrationOfAnOfficialForACompetition==true){
           header("Location: ListOfAsa.php");
        } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    }
}
$DiplayFunction = new functions();
$DisplayListFunction = $DiplayFunction->ListOfFunction();
$CheckDDetailRally = $DetailDisplayRally->DisplayRegistrationOfficial();
