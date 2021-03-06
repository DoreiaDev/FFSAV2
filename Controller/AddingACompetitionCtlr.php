<?php

$title = 'Ajouter une compétition automobille';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$AddCompetition = new Competiton();
$AddSportEvent = new SportsEventsModel();
$AddRaceOutsideRally = new RaceOutsideRally();
if (isset($_POST['BtnAddtheCompetition'])) {
    if ($_POST['OpenOrClose'] != '0') {
        if ($_POST['OpenOrClose'] == 'Open') {
            $AddCompetition->Close = 0;
            $AddCompetition->Open = 1;
        }
    } else {
        $formError['OpenOrClose'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez choisir si vous ouvrez ou non la compétition';
    }
    if ($_POST['TypeOfCompetiton'] != '0') {
        if (preg_match($RegexId, $_POST['TypeOfCompetiton'])) {
            $AddCompetition->id_0108asap_typeofcompetition = htmlspecialchars($_POST['TypeOfCompetiton']);
        }
    } else {
        $formError['TypeOfCompetiton'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . ' Merci de sélectionner le type de compétition';
    }
    if ($_POST['CategoryCompetition'] != '0') {
        if (preg_match($RegexId, $_POST['CategoryCompetition'])) {
            $AddCompetition->id_0108asap_categorycompetition = htmlspecialchars($_POST['CategoryCompetition']);
        }
    } else {
        $formError['CategoryCompetition'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . ' Merci de sélectionner le type de championnat dans le champ Catégorie de la compétition';
    }
    if (!empty($_POST['NameOfTheTest'])) {
        if (preg_match($RegexTitle, $_POST['NameOfTheTest'])) {
            $AddSportEvent->NameOfTheTest = htmlspecialchars($_POST['NameOfTheTest']);
        } else {
            $formError['NameOfTheTest'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameOfTheTest'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Nom la compétiton';
    }
    if (!empty($_POST['LocationCircuit'])) {
        if (preg_match($RegexTitle, $_POST['LocationCircuit'])) {
            $AddSportEvent->Location_Circuit = htmlspecialchars($_POST['LocationCircuit']);
        } else {
            $formError['LocationCircuit'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['LocationCircuit'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs ville départ circuit';
    }
    if (!empty($_POST['Observation'])) {
        if (preg_match($RegexTitle, $_POST['Observation'])) {
            $AddSportEvent->Observation = htmlspecialchars($_POST['Observation']);
        } else {
            $formError['Observation'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['Observation'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs observation';
    }
    if (!empty($_POST['CompetitionStarDay'])) {
        $AddSportEvent->CompetitionStarDay = htmlspecialchars($_POST['CompetitionStarDay']);
    } else {
        $formError['CompetitionStarDay'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Date de début de la compétition';
    }
    if (!empty($_POST['CompetitionEndDay'])) {
        $AddSportEvent->CompetitionEndDay = htmlspecialchars($_POST['CompetitionEndDay']);
    } else {
        $formError['CompetitionEndDay'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Date de fin de la compétition';
    }
    if (!empty($_POST['MinimumNumberOfOfficials'])) {
        if (preg_match($RegexId, $_POST['MinimumNumberOfOfficials'])) {
            $AddSportEvent->MinimumNumberOfOfficials = htmlspecialchars($_POST['MinimumNumberOfOfficials']);
        } else {
            $formError['MinimumNumberOfOfficials'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres Chiffre';
        }
    } else {
        $formError['MinimumNumberOfOfficials'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Minimun d\'officiel';
    }
    if ($_POST['id_0108asap_asa'] != '0') {
        if (preg_match($RegexId, $_POST['id_0108asap_asa'])) {
            $AddSportEvent->id_0108asap_asa = htmlspecialchars($_POST['id_0108asap_asa']);
        }
    } else {
        $formError['id_0108asap_asa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . ' Merci de sélectionner le type de compétition';
    }
    if (!empty($_POST['ObservationAccommodation'])) {
        if (preg_match($RegexTitle, $_POST['ObservationAccommodation'])) {
            $AddRaceOutsideRally->ObservationAccommodation = htmlspecialchars($_POST['ObservationAccommodation']);
        } else {
            $formError['ObservationAccommodation'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['ObservationAccommodation'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs observattion hébergement ';
    }
    if (!empty($_POST['NumberOfCompetitonDays'])) {
        if (preg_match($RegexId, $_POST['NumberOfCompetitonDays'])) {
            $AddRaceOutsideRally->NumberOfCompetitonDays = htmlspecialchars($_POST['NumberOfCompetitonDays']);
        } else {
            $formError['NumberOfCompetitonDays'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . ' Merci de metre que des chiffres dans le champs nombre de jour de compétitions';
        }
    } else {
        $formError['NumberOfCompetitonDays'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . ' Merci de remplir le champs nombre de jour de compétitions';
    }
    if (!empty($_POST['RequirementDate1'])) {
        $AddRaceOutsideRally->RequirementDate1 = htmlspecialchars($_POST['RequirementDate1']);
    } else {
        $formError['RequirementDate1'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Date Des besoins officiel 1';
    }
    if (!empty($_POST['RequirementDate2'])) {
        $AddRaceOutsideRally->RequirementDate2 = htmlspecialchars($_POST['RequirementDate2']);
    } else {
        $AddRaceOutsideRally->RequirementDate2 = '2020/01/01';
    }
    if (!empty($_POST['RequirementDate3'])) {
        $AddRaceOutsideRally->RequirementDate3 = htmlspecialchars($_POST['RequirementDate3']);
    } else {
        $AddRaceOutsideRally->RequirementDate3 = '2020/01/01';
    }
    if (!empty($_POST['RequirementDate4'])) {
        $AddRaceOutsideRally->RequirementDate4 = htmlspecialchars($_POST['RequirementDate4']);
    } else {
        $AddRaceOutsideRally->RequirementDate4 = '2020/01/01';
    }
    if (!empty($_POST['RequirementDate5'])) {
        $AddRaceOutsideRally->RequirementDate5 = htmlspecialchars($_POST['RequirementDate5']);
    } else {
        $AddRaceOutsideRally->RequirementDate5 = '2020/01/01';
    }
    if (!empty($_POST['LodgingPossible1'])) {
        $AddRaceOutsideRally->LodgingPossible1 = htmlspecialchars($_POST['LodgingPossible1']);
    } else {
        $AddRaceOutsideRally->LodgingPossible1 = '2020/01/01';
    }
    if (!empty($_POST['LodgingPossible2'])) {
        $AddRaceOutsideRally->LodgingPossible2 = htmlspecialchars($_POST['LodgingPossible2']);
    } else {
        $AddRaceOutsideRally->LodgingPossible2 = '2020/01/01';
    }
    if (!empty($_POST['LodgingPossible3'])) {
        $AddRaceOutsideRally->LodgingPossible3 = htmlspecialchars($_POST['LodgingPossible3']);
    } else {
        $AddRaceOutsideRally->LodgingPossible3 = '2020/01/01';
    }
    if (!empty($_POST['LodgingPossible4'])) {
        $AddRaceOutsideRally->LodgingPossible4 = htmlspecialchars($_POST['LodgingPossible4']);
    } else {
        $AddRaceOutsideRally->LodgingPossible4 = '2020/01/01';
    }
    if (!empty($_POST['LodgingPossible5'])) {
        $AddRaceOutsideRally->LodgingPossible5 = htmlspecialchars($_POST['LodgingPossible5']);
    } else {
        $AddRaceOutsideRally->LodgingPossible5 = '2020/01/01';
    }
    if (count($formError) == 0) {
        $LastIdSportEvent = new SportsEventsModel();
        $CheckSportEvent = $AddSportEvent->AddSportEvents();
        $CheckLastIdSportEvent = $LastIdSportEvent->lastInsertIdSportEvents();
        var_dump($CheckLastIdSportEvent);
        if ($CheckSportEvent == true) {
            if ($CheckLastIdSportEvent != null) {
                $AddCompetition->id_0108asap_sportsevents = $CheckLastIdSportEvent;
                $CheckAddCompetition = $AddCompetition->AddOutsideCompetition();
                $LastIDCompetition = new Competiton();
                $CheckLastIdCompetition = $LastIDCompetition->LastInsertIdCompetition();

                echo 'sportevent ok';
            } else {
                $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr avec le code erreur CheckLastIdSportEvent';
            }
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr avec le code erreur CheckLastIdSportEvent';
        }

        if ($CheckAddCompetition == true) {
            if ($CheckLastIdCompetition != null) {
                $AddRaceOutsideRally->IdCompetition = $CheckLastIdCompetition;
                $CheckAddRaceOutsideRally = $AddRaceOutsideRally->AddRaceOutsideRally();
                echo 'Check Competition ok ';
            } else {
                $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr avec le code erreur CheckAddCompetition';
            }
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr avec le code erreur CheckLastIdCompetition';
        }
        if ($CheckAddRaceOutsideRally == true) {
            header("Location: ChoiceOfCompetition.php");
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr avec le code erreur CheckAddRaceOutsideRally';
        }
    } else {
        $ErrorForm = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }

//    var_dump($AddCompetition);
}
//lisste des tyoe de compétitions
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
//liste des ASA
$DiplayAsa = new ASA();
$DiplayListOfAsa = $DiplayAsa->DisplayListOfAsa();
