<?php

$title = 'Supprimer une ligue';
$RegexId = '/^\d+$/';
$DeleteLeague = new League();
if (isset($_GET['idLeague'])) {
    if (preg_match($RegexId, $_GET['idLeague'])) {
        $DeleteLeague->id = htmlspecialchars($_GET['idLeague']);
    }
}
$DeleteLeagues = new League();
if (isset($_POST['BtnDeleteLeague'])) {
    if (isset($_POST['IdLeague'])) {
        if (preg_match($RegexId, $_POST['IdLeague'])) {
            $DeleteLeagues->id = htmlspecialchars($_POST['IdLeague']);
        }
    }
    $CheckDeleteLeague = $DeleteLeagues->DeleteLeague();
    if ($CheckDeleteLeague == true) {
        header("Location: ListOfLeague.php");
    } else {
        $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" /> une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
    }
}

$DisplayLeagues = $DeleteLeague->LeagueListForID();
