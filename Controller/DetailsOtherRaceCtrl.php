<?php
$title='Detailles de la compétition';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$DetaiRaceOustidRally= new RaceOutsideRally();
if (isset($_GET['NameTest'])) {
    if (preg_match($RegexTitle, $_GET['NameTest'])) {
        $NameOfTheTest = htmlspecialchars($_GET['NameTest']);
    }
}
if (isset($_GET['TypeOfCompet'])) {
    if (preg_match($RegexTitle, $_GET['TypeOfCompet'])) {
        $TypeOfCompet = htmlspecialchars($_GET['TypeOfCompet']);
    }
    
}
if (isset($_GET['IdSportEvent'])) {
      if (preg_match($RegexId, $_GET['IdSportEvent'])) {
          $IdSportEvents= htmlspecialchars($_GET['IdSportEvent']);
         $DetaiRaceOustidRally->IdSportEvents=htmlspecialchars($_GET['IdSportEvent']);
//                 
      }
}
$CheckDetaiRaceOustidRally= $DetaiRaceOustidRally->DisplayListeRaceOutsideRally();
var_dump($DetaiRaceOustidRally);