<?php
$title='Suprimer une ASA/ASK';

$formError = array();
$RegexId = '/^\d+$/';
$DiplayListAsa = new ASA();
if (isset($_GET['IdAsa'])) {
    if (preg_match($RegexId, $_GET['IdAsa'])) {
        $DiplayListAsa->id = htmlspecialchars($_GET['IdAsa']);
    }
}
$DeleteAsa= new ASA();
if (isset($_POST['BtnDeleteAsa'])) {
    if (isset($_POST['IdAsa'])) {
        if (preg_match($RegexId, $_POST['IdAsa'])) {
            $DeleteAsa->id = htmlspecialchars($_POST['IdAsa']);
        }
    }
    $CheckDeleteAsa = $DeleteAsa->DeleteAsa();
    if ($CheckDeleteAsa == true) {
        header("Location: ListOfAsa.php");
    } else {
        $formError['Technical'] = 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
    }
}
// Affichage de l'asa a modifier
$ListDisplayAsa = $DiplayListAsa->DisplayListOfAsaForId();

