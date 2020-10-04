<?php
$title='Modifier une fonction(licence)';
$formError = array();
$RegexTitle = '/^[A-Za-z \-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$DisplayLicense=new functions();
if (isset($_GET['IdFunction'])) {
    if (preg_match($RegexId, $_GET['IdFunction'])) {
        $DisplayLicense->id = htmlspecialchars($_GET['IdFunction']);
    }
}
$ModifyFunction = new functions();
if(isset($_POST['BtnModifyFunction'])){
    if(!empty($_POST['NameFunction'])){
          if (preg_match($RegexTitle, $_POST['NameFunction'])) {
             $ModifyFunction->TypeOfLicence= htmlspecialchars($_POST['NameFunction']); 
          } else {
            $formError['NameFunction'] = 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameFunction'] = 'Veuillez remplir le champs Nom de la function';
    }
    if(!empty($_POST['Access'])){
         if (preg_match($RegexId, $_POST['Access'])) {
           $ModifyFunction->CompetitionManager= htmlspecialchars($_POST['Access']);  
         }
     } else {
        $formError['League']='Merci de sélectionner un droit d\`accés  dans la liste suivante!';
    }
      if (count($formError) == 0) {
        $CheckModifyFunction = $ModifyFunction->ModifyFunction();
        if ($CheckModifyFunction == true) {
            header("Location: ListOfFunction.php");
        } else {
          $formError['Technical'] = 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
//affichage de la licence correspondant à l'id transmit en get
$DiplayTheLicense=$DisplayLicense->DisplayListOfFunctionForId();
// affichage de la liste des droits
$DIsplaylistAccess= new PermissionOfAccess();
$ListAccess=$DIsplaylistAccess->DisplayPermissionaccess();
