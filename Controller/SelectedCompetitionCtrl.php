<?php

$title = 'Compétitions Selectionnées';
$RegexId = '/^\d+$/';
$DisplaySportEvent = new SportsEventsModel();
$DisplayCompetition = new SportsEventsModel();
if (isset($_GET['IdLeague'])) {
    if (preg_match($RegexId, $_GET['IdLeague'])) {
        $IdLeague = htmlspecialchars($_GET['IdLeague']);
    }
}
if (isset($_GET['IdTypeOfCompetiton'])) {
    if (preg_match($RegexId, $_GET['IdTypeOfCompetiton'])) {
        $IdTypeOfCompetiton = htmlspecialchars($_GET['IdTypeOfCompetiton']);
    }
}
//si une ligue et un type de competition est choisie
if($IdLeague!=0 && $IdTypeOfCompetiton!=0){
    $DisplaySportEvent->IdLeague= htmlspecialchars($_GET['IdLeague']);
    $DisplaySportEvent->IdTypeCompetition = htmlspecialchars($_GET['IdTypeOfCompetiton']);
    $CheckDisplaySportEvent= $DisplaySportEvent->DiplayAllCompetitionAndLeague();
}
//Selection pour par tout les compétition et avec une ligue
if($IdLeague!=0 && $IdTypeOfCompetiton==0){
    $DisplaySportEvent->IdLeague= htmlspecialchars($_GET['IdLeague']);
    $CheckDisplaySportEvent= $DisplaySportEvent->DisplayAnyCompetitionAndLegueSelected();
    
}
//Affichage d'une competition pour toute les ligues 
if($IdLeague==0 && $IdTypeOfCompetiton!=0){
    $DisplaySportEvent->IdTypeCompetition = htmlspecialchars($_GET['IdTypeOfCompetiton']);
    $CheckDisplaySportEvent= $DisplaySportEvent->DisplayAnyLeagueAndCompetitionSelect();
}
// Affichage de toutes les competition et toutes les ligues 
if($IdLeague==0 && $IdTypeOfCompetiton==0){
    $CheckDisplaySportEvent=$DisplaySportEvent->DisplayAllLeaguesAndCompetitions();
}

//var_dump($CheckDisplayCompetition);
//Liste des type de compétitions
$DisplayTypeOfCompetition = new TypeOfCompetition();
$DisplayTypeOfCompetition->id = $IdTypeOfCompetiton;
$DiplayListOfTypeCompetiton = $DisplayTypeOfCompetition->ListTypeOfCompetitionById();
// Affichage de la ligues choisie
$DisplayListLeague = new League();
$DisplayListLeague->id = $IdLeague;
$ListCompetitionByLeague = $DisplayListLeague->LeagueListForID();
