<?php
$title='Modification d\'une ligue';
$RegexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$FormError = array();
$RegexId = '/^\d+$/';
$ListModifyLeague= new League();
if(isset($_GET['idLeague'])){
    if (preg_match($RegexId, $_GET['idLeague'])) {
        $ListModifyLeague->id= htmlspecialchars($_GET['idLeague']);
        
    }
}
$ModifyTheLeague= new League();
if (isset($_POST['BtnModifyLeague'])) {
    if (!empty($_POST['ModifyNameLeague'])) {
        if (preg_match($RegexTitle, $_POST['ModifyNameLeague'])) {
            $ModifyTheLeague->LeagueName = htmlspecialchars($_POST['ModifyNameLeague']);
        } else {
            $FormError['ModifyNameLeague'] = 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $FormError['ModifyNameLeague'] = 'Veuillez remplir le champs Nom de ligue';
    }
    if(isset($_GET['idLeague'])){
    if (preg_match($RegexId, $_GET['idLeague'])) {
        $ModifyTheLeague->id= htmlspecialchars($_GET['idLeague']);
        
    }
}
    
    if (count($FormError) == 0) {
        $CheckModifyLeague = $ModifyTheLeague->ModifyLeague();
        var_dump($CheckModifyLeague);
        if ($CheckModifyLeague == true) {
            header("Location: ListOfLeague.php");
        } else {
          $formError['Technical'] = 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
$DisplayLeagues= $ListModifyLeague->LeagueListForID();