<?php
$title='Modification de votre profiles';
$ModfifyOfProfil = new membres;
$formError = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$regexId = '/^\d+$/';
if (isset($_POST['Edditing'])) {
//    je vérifier que les input ne sont pas vide
    if (!empty($_POST['NameUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $ModfifyOfProfil->Name = htmlspecialchars($_POST['NameUser']);
        } else {
            $formError['NameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Veuiller mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['NameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre Nom';
    }
    if (!empty($_POST['FirstnameUser'])) {
        if (preg_match($regexTitle, $_POST['FirstnameUser'])) {
            $ModfifyOfProfil->Firstname = htmlspecialchars($_POST['FirstnameUser']);
        } else {
            $formError['FirstnameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'merci de mettre que des carracteres ALPHABETIQUE !!!!!!';
        }
    } else {
        $formError['FirstnameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre prénom';
    }
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $ModfifyOfProfil->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['EmailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                    . 'Veuillez mettre un mail correcte';
        }
    } else {
        $formError['EmailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le mail';
    }
    if (!empty($_POST['AddressUser'])) {
        $ModfifyOfProfil->Address = htmlspecialchars($_POST['AddressUser']);
    } else {
        $formError['AddressUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre adresse';
    }
    if (!empty($_POST['ZipCodeUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $ModfifyOfProfil->ZipCode = htmlspecialchars($_POST['ZipCodeUser']);
        }
    } else {
        $formError['ZipCodeUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre code postal';
    }
    if (!empty($_POST['City'])) {
        $ModfifyOfProfil->City = htmlspecialchars($_POST['City']);
    } else {
        $ModfifyOfProfil['City'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre ville';
    }
  
    if (!empty($_POST['AsaName'])) {
        $ModfifyOfProfil->id_0108asap_asa = htmlspecialchars($_POST['AsaName']);
    } else {
        $formError['AsaName'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Vous n\'avez pas remplie votre Nom de votre ASA';
    }
    if(isset($_SESSION['idUser'])){
        $ModfifyOfProfil->id= htmlspecialchars($_SESSION['idUser']);  
    }
    
    if (count($formError) == 0) {
       
      $ModfifyOfProfil->Actif='true';
      
      $ChekEditingProfil=$ModfifyOfProfil->ProfilEdditing();
      if($ChekEditingProfil==true){
             $_SESSION['loginMail'] =$_POST['EmailUser'] ;
                $_SESSION['Name'] = $_POST['NameUser'];
                $_SESSION['Firstname'] = $_POST['FirstnameUser'];
                
            header("Location:MyProfiles.php ");
       } else {
          $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                  . 'une erreur est survenue, conctater par mail le web master du site dev.gaetan.jonard@outlook.fr';
        }
    } else {
        $ErrorForm='<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Une erreur dans le formulaire est survenue merci de vous référez au(x) champ(s)en rouge';
    }
}
var_dump($ModfifyOfProfil);
$ProfilUser=new membres();
$UserProfil=$ProfilUser->UserProfil();
if(isset($_SESSION['idUser'])){
$RegisteredId = $_SESSION['idUser'];
}

//liste de ASA
$DiplayAsa= new ASA();
$DiplayListOfAsa= $DiplayAsa->DisplayListOfAsa();