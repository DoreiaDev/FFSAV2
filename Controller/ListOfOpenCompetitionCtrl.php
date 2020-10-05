<?php

$title = 'Choix de la compétiton';
$formError = array();
$RegexId = '/^\d+$/';
if (isset($_POST['SelectTypeAndLeague'])) {
    if (!empty($_POST['TypeOfCompetiton'])) {
        if (preg_match($RegexId, $_POST['TypeOfCompetiton'])) {
            $IdTypeOfCompetition = htmlspecialchars($_POST['TypeOfCompetiton']);
        } else {
            $IdTypeOfCompetition = '0';
        }
    } else {
        $IdTypeOfCompetition = '0';
    }
    if (!empty($_POST['League'])) {
        if (preg_match($RegexId, $_POST['League'])) {
            $IdLeague = htmlspecialchars($_POST['League']);
        } else {
            $IdLeague = '0';
        }
    } else {
        $IdLeague = '0';
    }
    if ($IdLeague != null && $IdTypeOfCompetition != null) {
        header("Location: SelectedCompetition.php?IdLeague=$IdLeague&IdTypeOfCompetiton=$IdTypeOfCompetition ");
    }
}
//Liste des type de compétitions
$DisplayTypeOfCompetition = new TypeOfCompetition();
$DiplayListOfTypeCompetiton = $DisplayTypeOfCompetition->ListTypeOfCompetiton();
// Affichage des ligues
$DisplayListLeague = new League();
$ListLeague = $DisplayListLeague->leagueList();
