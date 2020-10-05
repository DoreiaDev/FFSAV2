<?php
$title='Compétitions Selectionnées';
$RegexId = '/^\d+$/';
if(isset($_GET['IdLeague'])){
     if (preg_match($RegexId, $_GET['IdLeague'])) {
         $IdLeague= htmlspecialchars($_GET['IdLeague']);
     }
}
if(isset($_GET['IdTypeOfCompetiton'])){
     if (preg_match($RegexId, $_GET['IdTypeOfCompetiton'])) {
         $IdTypeOfCompetiton= htmlspecialchars($_GET['IdTypeOfCompetiton']);
     }
}

//Liste des type de compétitions
$DisplayTypeOfCompetition = new TypeOfCompetition();
$DisplayTypeOfCompetition->id=$IdTypeOfCompetiton;
$DiplayListOfTypeCompetiton = $DisplayTypeOfCompetition->ListTypeOfCompetitionById();
// Affichage de la ligues choisie
$DisplayListLeague = new League();
$DisplayListLeague->id=$IdLeague;
$ListCompetitionByLeague= $DisplayListLeague->LeagueListForID();