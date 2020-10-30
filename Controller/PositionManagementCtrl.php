<?php
$title='Gestion des postes pour les compétitions ';
$RegexId = '/^\d+$/';
$ListOfOfficialsRegistredForACompetition= new OfficialRegistrationCompetition();
$DisplayByCompetition=$ListOfOfficialsRegistredForACompetition->ListCompetitionByOfficial();
$ListOfOfficialsRegistredForARally= new OfficialRegistrationCompetition();
$DisplaylisteByRally=$ListOfOfficialsRegistredForARally->ListRalyByOfficial();
$ListCompet= new Competiton();
if(isset($_GET['idSportevents'])){
    if (preg_match($RegexId, $_GET['idSportevents'])) {
        $IdSportEvent= htmlspecialchars($_GET['idSportevents']);
        $ListCompet->id_0108asap_sportsevents=htmlspecialchars($_GET['idSportevents']);
    }
}
$CheckDisplayListCompetition=$ListCompet->ListCompetitionByIdSportEvent();
$IdTypeOfCompetition=$CheckDisplayListCompetition->id_0108asap_typeofcompetition;
var_dump($IdTypeOfCompetition);