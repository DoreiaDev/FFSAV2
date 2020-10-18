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
    if (!empty($_POST['IdMembers'])) {
        if (preg_match($RegexId, $_POST['IdMembers'])) {
            $RegistrationOfAnOfficialForACompetition->IdMembers = htmlspecialchars($_POST['IdMembers']);
        }
    }
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
//Disponible 
    if (!empty($_POST['Availability'])) {
        if (preg_match($RegexTitle, $_POST['Availability'])) {
            $RegistrationOfAnOfficialForACompetition->Aviable = htmlspecialchars($_POST['Availability']);
        }
    } else {
        $formError['Availability'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez choisir si vous étes disponible ou non durant le rallye ';
    }
//    Premier jour de competition
    if (!empty($_POST['RequirementDate1'])) {
        if (preg_match($RegexTitle, $_POST['RequirementDate1'])) {
            $RegistrationOfAnOfficialForACompetition->AviableDate1 = htmlspecialchars($_POST['RequirementDate1']);
        }
    } else {
        $formError['RequirementDate1'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
    }
//Second jour de participation 
    $CheckDDetailRally = $DetailDisplayRally->DisplayRegistrationOfficial();
    if ($CheckDDetailRally->RequirementDate2 != "01/01/2020") {
        if (!empty($_POST['RequirementDate2'])) {
            if (preg_match($RegexTitle, $_POST['RequirementDate2'])) {
                $RegistrationOfAnOfficialForACompetition->AviableDate2 = htmlspecialchars($_POST['RequirementDate2']);
            }
        } else {
            $formError['RequirementDate2'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le second  jour de competition ';
        }
    } else {
        $RegistrationOfAnOfficialForACompetition->AviableDate2 = 'Non concerné';
    }
//    3 eme jour de participation 
    if ($CheckDDetailRally->RequirementDate3 != "01/01/2020") {
        if (!empty($_POST['RequirementDate3'])) {
            if (preg_match($RegexTitle, $_POST['RequirementDate3'])) {
                $RegistrationOfAnOfficialForACompetition->AviableDate3 = htmlspecialchars($_POST['RequirementDate3']);
            }
        } else {
            $formError['RequirementDate3'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le 3 eme jour de competition ';
        }
    } else {
        $RegistrationOfAnOfficialForACompetition->AviableDate3 = 'Non concerné';
    }
//    4 eme jour de participation
    if ($CheckDDetailRally->RequirementDate4 != "01/01/2020") {
        if (!empty($_POST['RequirementDate4'])) {
            if (preg_match($RegexTitle, $_POST['RequirementDate4'])) {
                $RegistrationOfAnOfficialForACompetition->AviableDate4 = htmlspecialchars($_POST['RequirementDate4']);
            }
        } else {
            $formError['RequirementDate4'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le 4 eme  jour de competition ';
        }
    } else {
        $RegistrationOfAnOfficialForACompetition->AviableDate4 = 'Non concerné';
    }
    //5 jour De participation
    if ($CheckDDetailRally->RequirementDate5 != "01/01/2020") {
        if (!empty($_POST['RequirementDate5'])) {
            if (preg_match($RegexTitle, $_POST['RequirementDate5'])) {
                $RegistrationOfAnOfficialForACompetition->AviableDate5 = htmlspecialchars($_POST['RequirementDate5']);
            }
        } else {
            $formError['RequirementDate5'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non le 5 eme  jour de competition ';
        }
    } else {
        $RegistrationOfAnOfficialForACompetition->AviableDate5 = 'Non concerné';
    }
    //observation de l'officiel concernant sa venu si il est accompagner etc
    if (!empty($_POST['ObservationAccommodation'])) {
        if (preg_match($RegexTitle, $_POST['ObservationAccommodation'])) {
            $RegistrationOfAnOfficialForACompetition->ObservationRequestFromOfficial = htmlspecialchars($_POST['ObservationAccommodation']);
        } else {
            $formError['ObservationAccommodation'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
         $RegistrationOfAnOfficialForACompetition->ObservationRequestFromOfficial='RAS';
    }
//    hebergement 1jour
    if (!empty($_POST['LodgingPossible1'])) {
        if (preg_match($RegexTitle, $_POST['LodgingPossible1'])) {
            $RegistrationOfAnOfficialForACompetition->NeedAccomodation1 = htmlspecialchars($_POST['LodgingPossible1']);
        }
    } else {
        $formError['LodgingPossible1'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
    }
//hebergement 2
    if ($CheckDDetailRally->LodgingPossible2 != "01/01/2020") {
        if (!empty($_POST['LodgingPossible2'])) {
            if (preg_match($RegexTitle, $_POST['LodgingPossible2'])) {
                $RegistrationOfAnOfficialForACompetition->NeedAccomodation2 = htmlspecialchars($_POST['LodgingPossible2']);
            }
        } else {
            $formError['LodgingPossible2'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
        }
    }else {
        $RegistrationOfAnOfficialForACompetition->NeedAccomodation2  = 'Non concerné';
    }
//    hebergement 3
    if ($CheckDDetailRally->LodgingPossible3 != "01/01/2020") {
        if (!empty($_POST['LodgingPossible3'])) {
            if (preg_match($RegexTitle, $_POST['LodgingPossible3'])) {
                $RegistrationOfAnOfficialForACompetition->NeedAccomodation3 = htmlspecialchars($_POST['LodgingPossible3']);
            }
        } else {
            $formError['LodgingPossible3'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
        }
    }else {
        $RegistrationOfAnOfficialForACompetition->NeedAccomodation3  = 'Non concerné';
    }
//    hebergement 4
    if ($CheckDDetailRally->LodgingPossible4 != "01/01/2020") {
        if (!empty($_POST['LodgingPossible4'])) {
            if (preg_match($RegexTitle, $_POST['LodgingPossible4'])) {
                $RegistrationOfAnOfficialForACompetition->NeedAccomodation4 = htmlspecialchars($_POST['LodgingPossible4']);
            }
        } else {
            $formError['LodgingPossible4'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
        }
    }else {
        $RegistrationOfAnOfficialForACompetition->NeedAccomodation4  = 'Non concerné';
    }
//    hebergement 5
    if ($CheckDDetailRally->LodgingPossible5 != "01/01/2020") {
        if (!empty($_POST['LodgingPossible5'])) {
            if (preg_match($RegexTitle, $_POST['LodgingPossible5'])) {
                $RegistrationOfAnOfficialForACompetition->NeedAccomodation5 = htmlspecialchars($_POST['LodgingPossible5']);
            }
        } else {
            $formError['LodgingPossible5'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez choisir si vous étes disponible ou non Le premier jour de competition ';
        }
    }else {
        $RegistrationOfAnOfficialForACompetition->NeedAccomodation5  = 'Non concerné';
    }
    
     if (count($formError) == 0) {
         $CheckRegistrationOfAnOfficialForACompetition=$RegistrationOfAnOfficialForACompetition->OfficalRegistrationForCompétition();
         if( $CheckRegistrationOfAnOfficialForACompetition== true){
            header("Location: ListOfOpenCompetition.php");
            } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
     }
}
$DiplayFunction = new functions();
$DisplayListFunction = $DiplayFunction->ListOfFunction();
$CheckDDetailRally = $DetailDisplayRally->DisplayRegistrationOfficial();
var_dump($_POST['Availability']);
