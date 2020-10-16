<?php

$title = 'Détaille des Rallyes ou rallyes TT ';
$formError = array();
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$DetailDisplayRally = new Rally();
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
          $DetailDisplayRally->IdSportEvents=htmlspecialchars($_GET['IdSportEvent']);
      }
}

$CheckDDetailRally=$DetailDisplayRally->DisplayRegistrationOfficial();