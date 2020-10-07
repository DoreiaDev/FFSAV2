<?php

$title = 'Ajout d\'une Ligues';
$AddLeague = new League();

$formError = array();
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';

if (isset($_POST['AddLeague'])) {
    if (!empty($_POST['NameLeague'])) {
        if (preg_match($regexTitle, $_POST['NameLeague'])) {
            $AddLeague->LeagueName = htmlspecialchars($_POST['NameLeague']);
        } else {
            $formError['NameLeague'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameLeague'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le champs Nom de ligue';
    }
      var_dump($AddLeague);
    if (count($formError) == 0) {
        $CheckAddLeague = $AddLeague->AddLeague();
        var_dump($CheckAddLeague);
        if ($CheckAddLeague == true) {
            header("Location: ListOfLeague.php");
        } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}