<?php
$title='Détaille des Rallyes ou rallyes TT ';
$DiplaySportEvent= new SportsEventsModel();
if(isset($_GET['NameTest'])){
    $NameOfTheTest= htmlspecialchars($_GET['NameTest']);
}
if(isset($_GET['TypeOfCompet'])){
    $TypeOfCompet= htmlspecialchars($_GET['TypeOfCompet']);
}
if(isset($_GET['IdSportEvent'])){
    $DiplaySportEvent->IdSportEvent= htmlspecialchars($_GET['IdSportEvent']);
    $CheckDisplaySportEvents= $DiplaySportEvent->CompetitionTypeByIdSportEvent();
    var_dump($CheckDisplaySportEvents);
}

