<?php

$title = 'Modifier une ASA ou ASK';
$formError = array();
$RegexTitle = '/^[A-Za-z \-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$DiplayListAsa = new ASA();
if (isset($_GET['IdAsa'])) {
    if (preg_match($RegexId, $_GET['IdAsa'])) {
        $DiplayListAsa->id = htmlspecialchars($_GET['IdAsa']);
    }
}
$ModifyAsa = new ASA();
if (isset($_POST['BtnModifyAsa'])) {
    if (isset($_POST['IdAsa'])) {
        if (preg_match($RegexId, $_POST['IdAsa'])) {
            $ModifyAsa->id = htmlspecialchars($_POST['IdAsa']);
        }
    }
    if (!empty($_POST['NameAsa'])) {
        if (preg_match($RegexTitle, $_POST['NameAsa'])) {
            $ModifyAsa->AsaName = htmlspecialchars($_POST['NameAsa']);
        } else {
            $formError['NameAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le champs Nom de l\'Asa/ASK';
    }
    if (!empty($_POST['NumberAsa'])) {
        if (preg_match($RegexId, $_POST['NumberAsa'])) {
            if (strlen($_POST['NumberAsa']) == 4) {
                $ModifyAsa->NumberAsa = htmlspecialchars($_POST['NumberAsa']);
            } else {
                $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                        . 'Vous devez mettre 4 chiffres';
            }
        } else {
            $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le champs numéro d\'ASA/ASK';
    }
    if (!empty($_POST['League'])) {
        if (preg_match($RegexId, $_POST['League'])) {
            $ModifyAsa->id_0108asap_League = htmlspecialchars($_POST['League']);
        }
    } else {
        $formError['League'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Merci de sélectionner une ligue dans la liste suivante!';
    }
    if (count($formError) == 0) {
        $CheckModifyAsa = $ModifyAsa->ModifyForAsa();
        var_dump($CheckModifyAsa);
        if ($CheckModifyAsa != true) {
            header("Location: ListOfAsa.php");
        } else {
            $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
// Affichage de l'asa a modifier
$ListDisplayAsa = $DiplayListAsa->DisplayListOfAsaForId();
// Liste des ligues
$DisplayListLeague = new League();
$ListLeague = $DisplayListLeague->leagueList();
