<?php
$title = 'Compétition où je suis inscris';
$RegexId = '/^\d+$/';
$IdMembeForTheCompetition = new OfficialRegistrationCompetition();
if (isset($_SESSION['idUser'])) {
    if (preg_match($RegexId, $_SESSION['idUser'])) {
        $IdMember= htmlspecialchars($_SESSION['idUser']);      
    }
}
//Liste des compétition ou le membre est inscrit
 $CheckDisplayCompetitionByMember=$IdMembeForTheCompetition->ListCompetitionByOfficial();
//liste des rallye ou le membre est inscrit
$CheckDisplayRallyByMember=$IdMembeForTheCompetition->ListRalyByOfficial();
