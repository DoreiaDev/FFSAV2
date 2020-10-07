<?php

$title = 'Ajouter Une Asa/ASK';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$AddAsa = new ASA();
if (isset($_POST['BtnAddAsa'])) {
    if (!empty($_POST['NameAsa'])) {
        if (preg_match($RegexTitle, $_POST['NameAsa'])) {
            $AddAsa->AsaName = htmlspecialchars($_POST['NameAsa']);
        } else {
            $formError['NameAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Nom de l\'Asa/ASK';
    }
    if (!empty($_POST['NumberAsa'])) {
        if (preg_match($RegexId, $_POST['NumberAsa'])) {
            if (strlen($_POST['NumberAsa']) == 4) {
                $AddAsa->NumberAsa = htmlspecialchars($_POST['NumberAsa']);
            } else {
                $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'Vous devez mettre 4 chiffres';
            }
        } else {
            $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberAsa'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs numéro d\'ASA/ASK';
    }
    if(!empty($_POST['League'])){
         if (preg_match($RegexId, $_POST['League'])) {
             $AddAsa->id_0108asap_League= htmlspecialchars($_POST['League']);  
            
         }
    } else {
        $formError['League']='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de sélectionner une ligue dans la liste suivante!';
    }
    if (count($formError) == 0) {
        $CheckAddAsa = $AddAsa->AddAsa();
        if ($CheckAddAsa == true) {
            header("Location: ListOfAsa.php");
        } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
// liste des ligue
$DisplayListLeague = new League();
$ListLeague = $DisplayListLeague->leagueList();
