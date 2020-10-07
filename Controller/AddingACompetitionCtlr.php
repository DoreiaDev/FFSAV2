<?php

$title = 'Ajouter une compétition automobille';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$AddCompetition = new Competiton();
$AddSportEvent = new SportsEventsModel();
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
        $formError['LocationCircuit'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 10px;" class="images_petit" />'
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
  if (!empty($_POST['CompetitionEndDay'])) {
            $AddSportEvent->CompetitionEndDay = htmlspecialchars($_POST['CompetitionEndDay']);
        
    } else {
        $formError['CompetitionEndDay'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Date de fin de la compétition';
    }
//    var_dump($AddCompetition);
    var_dump($AddSportEvent);
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
