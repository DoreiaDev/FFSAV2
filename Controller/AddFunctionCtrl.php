<?php
$title='ajouter une nouvelle fonction(licence';
$formError = array();
$RegexTitle = '/^[A-Za-z \-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$RegexId = '/^\d+$/';
$AddFunction= new functions();
if(isset($_POST['BtnAddLicence'])){
    if(!empty($_POST['NameFunction'])){
          if (preg_match($RegexTitle, $_POST['NameFunction'])) {
             $AddFunction->TypeOfLicence= htmlspecialchars($_POST['NameFunction']); 
          } else {
            $formError['NameFunction'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Merci de ne mettre que des caratéres alphabétiques';
        }
    } else {
        $formError['NameFunction'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le champs Nom de la function';
    }
    if(!empty($_POST['Access'])){
         if (preg_match($RegexId, $_POST['Access'])) {
           $AddFunction->CompetitionManager= htmlspecialchars($_POST['Access']);  
         }
     } else {
        $formError['League']='<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Merci de sélectionner un droit d\`accés  dans la liste suivante!';
    }
      if (count($formError) == 0) {
        $CheckAddLicence = $AddFunction->AddFunction();
        if ($CheckAddLicence == true) {
            header("Location: ListOfFunction.php");
        } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
$DIsplaylistAccess= new PermissionOfAccess();
$ListAccess=$DIsplaylistAccess->DisplayPermissionaccess();