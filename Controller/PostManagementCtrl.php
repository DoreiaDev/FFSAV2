<?php
$title='gestion des competition';
$RegexId = '/^\d+$/';
if(isset($_GET['IDsportEvent'])){
    if (preg_match($RegexId, $_GET['IDsportEvent'])) {
        $IdSportEvent= htmlspecialchars($_GET['IDsportEvent']);
    }
}