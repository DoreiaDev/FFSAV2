<?php

//partie inscription 
$title = 'connexions';
$Member = new membres;
$License = new FunctionSummary();
$LastId = new membres();
// liste des membre déja inscrit
$MembersExist = new membres();
$formError = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$regexId = '/^\d+$/';
$RegexTel='/^\d+$/';

//je genere une clé comprenant des caracteres aléatoire choisie parmis les caractére derteminé et comprenant un timetemps
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&#@à';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$test1 = generateRandomString();
$test = generateRandomString(40);
$time = time();
$cle = $test1 . $time . $test1;
//je verifie que le bonton inscription a été cliqué
if (isset($_POST['validate'])) {
//    je vérifier que les input ne sont pas vide
    if (!empty($_POST['NameUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $Member->Name = htmlspecialchars($_POST['NameUser']);
            $TemporaryName = htmlspecialchars($_POST['NameUser']);
        } else {
            $formError['NameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['NameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre Nom';
    }
    if (!empty($_POST['FirstnameUser'])) {
        $Member->Firstname = htmlspecialchars($_POST['FirstnameUser']);
    } else {
        $formError['FirstnameUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre Prénom';
    }
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $Member->Email = htmlspecialchars($_POST['EmailUser']);
            $TemporaryEmail = htmlspecialchars($_POST['EmailUser']);
            $MembersExist->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['EmailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez mettre un mail correcte';
        }
    } else {
        $formError['EmailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 100px;" class="images_petit" />'
                . 'Veuillez remplir le mail';
    }
    if (!empty($_POST['AddressUser'])) {
        $Member->Address = htmlspecialchars($_POST['AddressUser']);
    } else {
        $formError['AddressUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre adresse';
    }

    if (!empty($_POST['ZipCodeUser'])) {
        if (preg_match($regexId, $_POST['ZipCodeUser'])) {
            if (strlen($_POST['ZipCodeUser']) == 5) {
                $Member->ZipCode = htmlspecialchars($_POST['ZipCodeUser']);
            } else {
                $formError['ZipCodeUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'Vous devez mettre 5 chiffres a';
            }
        } else {
            $formError['ZipCodeUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Merci de mettre uniquement des chiffres ';
        }
    } else {
        $formError['ZipCodeUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre code postal';
    }
    if (!empty($_POST['City'])) {
        $Member->City = htmlspecialchars($_POST['City']);
    } else {
        $formError['City'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre ville';
    }
    if (!empty($_POST['PhonNumber'])) {
    if (preg_match($RegexTel, $_POST['PhonNumber'])) {
        $Member->PhonNumber = htmlspecialchars($_POST['PhonNumber']);
    } else {
        $formError['PhonNumber'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de ne mettre que en forma 00/00/00/00/00 votre numéro de téléphone';
    }
} else {
    $formError['PhonNumber'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
            . 'Veuillez remplir le champs Votre numéro de téléphone';
}
    if (!empty($_POST['PasswordUser'])) {
        if ($_POST['PasswordUser'] == $_POST['ConbfirmPasswordUSer']) {
            $Member->Password = password_hash($_POST['PasswordUser'], PASSWORD_BCRYPT);
        } else {
            $formError['PasswordUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['PasswordUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de remplir les champs password';
    }
    $Member->Cle = $cle;

    if (!empty($_POST['AsaName'])) {
        
        $Member->id_0108asap_asa = intval(htmlspecialchars($_POST['AsaName']));
    } else {
        $formError['AsaName'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas rempli votre Nom de votre ASA';
    }
    $Member->Actif = 'true';
    
    if (!empty($_POST['TypeOfLicence'])) {
        $LicenseTemporary = htmlspecialchars($_POST['TypeOfLicence']);
        
    } else {
        $formError['TypeOfLicence'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Vous n\'avez pas séléctionné le type de licence!';
    }
   
    $CheckMemberExist = $MembersExist->MemberExist();
    
    if ($CheckMemberExist == false) {
        if (!empty($_POST["Captcha"])) {
            if ($_SESSION["code"] == $_POST["Captcha"]) {

                if (count($formError) == 0) {
                    $Inscription = 'Inscription';
                    $Connection = 'Connection';
                    $ChekMembre = $Member->newMember();
                    $License->id_0108asap_function = $LicenseTemporary;
                    $License->LicencePrimary = 1;
                    $License->id_0108asap_member = $LastId->lastInsertId();
                    $CheckLicences = $License->AddPrimaryLicense();
                    var_dump($ChekMembre);
                    if ($ChekMembre == true) {
                        $_SESSION['TemporyloginMail'] = $TemporaryEmail;
                        $_SESSION['TemporyName'] = $TemporaryName;
                        $_SESSION['TemporyLicenceNumber'] = $LicenseTemporary;
                        $_POST['connexion'] = '';
                        $_POST['LoginNameUseer'] = $_POST['NameUser'];
                        $_POST['LoginMailUser'] = $_POST['EmailUser'];
                        $_POST['LoginPasswordUser'] = $_POST['PasswordUser'];
                        $_POST['LoginLicenceNumber'] = $_POST['LicenceNumber'];
//            header("Location: Connection.php");
                    } else {
                        $formError['Technical'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                                . 'une erreur est survenue';
                    $Inscription = 'Connection';
                    $Connection = 'Inscription';
                    }
                } else {
                    $Inscription = 'Connection';
                    $Connection = 'Inscription';
                    $formError['MeessageMemberExist'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                            . 'vous avez des erreurs dans le formulaires';
                }
            } else {
                    $Inscription = 'Connection';
                    $Connection = 'Inscription';
                $formError['Captcha'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'Le code captcha entré ne correspond pas! Veuillez réessayer.';
            }
        } else {
                    $Inscription = 'Connection';
                    $Connection = 'Inscription';
            $formError['Captcha'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Vous avez Oublier de remplir le captcha';
        }
    } else {
                    $Inscription = 'Connection';
                    $Connection = 'Inscription';
        $formError['MeessageMemberExist'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'L\'adresse mail que vous avez choisie est déja Utlisé merci d\'utiliser une autre adresse mail ou de vous connectez!';
    }
}


//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
//liste de ASA
$DiplayAsa = new ASA();
$DiplayListOfAsa = $DiplayAsa->DisplayListOfAsa();
// partie connection ----------------------------------------------------------------------------------------------
if (isset($_POST['connection'])) {
    $MembersExist = new membres();
    $IdMembers = new membres();
    $VerifMembersExist = new membres();
    $LicencePrimary = new FunctionSummary();

    $formError = array();
    if (!empty($_POST['LoginMailUser'])) {
        if (filter_var($_POST['LoginMailUser'], FILTER_VALIDATE_EMAIL)) {
            $MembersExist->Email = htmlspecialchars($_POST['LoginMailUser']);
            $VerifMembersExist->Email = htmlspecialchars($_POST['LoginMailUser']);
        } else {
            $formError['LoginMailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Veuillez mettre un mail correcte';
        }
    } else {
        $formError['LoginMailUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le mail';
    }
    if (!empty($_POST['LoginPasswordUser'])) {

        $LoginPassword = $_POST['LoginPasswordUser'];
    } else {
        $formError['LoginPasswordUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de remplir le champ password';
    }


    if (count($formError) == 0) {
        $verif = $MembersExist->ConnexionMembers();
        $CheckVerifMemberExist = $VerifMembersExist->MemberExist();
        if (!empty($_POST["Captcha"])) {
            if ($_SESSION["code"] == $_POST["Captcha"]) {

                if ($CheckVerifMemberExist == true) {
//je verifier que l'utilisateur existe bien dans la base de donnée grace a son email  
//          je verifie que le password entré par l'utilisateur et le meme que celui renseigner dans la base de donnée
                    $password = $verif->Password;
                    $validPassword = password_verify($LoginPassword, $password);
                    if ($validPassword) {
                        var_dump($verif);
                        $IDUser = $verif->id;
                        $_SESSION['idUser'] = $verif->id;
                        $_SESSION['loginMail'] = $verif->Email;
                        $_SESSION['Name'] = $verif->Name;
                        $_SESSION['Firstname'] = $verif->Firstname;
                        $_SESSION['access'] = $verif->PermissionToAccess;
                        $_SESSION['connect'] = 'OK';
                        $_SESSION['TemporyloginMail'] = '';
                        $_SESSION['TemporyName'] = '';
                        $_SESSION['TemporyLicenceNumber'] = '';
                        $LicencePrimary->id_0108asap_member = $IDUser;
                        $ListOfLicense = $LicencePrimary->VerifLicense();
                        if ($ListOfLicense == true) {
                            $CheckLicensesExist = new FunctionSummary();
                            $CheckLicensesExist->id0108asap_member = $IDUser;
                            $CheckOkLicenses = $CheckLicensesExist->DisplayPrimaryLicenses();
//                    $_SESSION['access'] = $CheckOkLicenses[0]->id_0108asap_function;
                        }
                        if (in_array($_SESSION['access'], $Function)) {
                            header("Location: HomeLogin.php");
                        } else {
//  header("Location:../index.php");
                        }
                    } else {
                        $formError['LoginPasswordUser'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                                . 'ERREUR DE MOT DE PASSE';
                    }
                } else {
                    $UserNotRegistred = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                            . 'Vous n\'avez pas de compte';
                }
            } else {
                $formError['Captcha'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                        . 'Le code captcha entré ne correspond pas! Veuillez réessayer.';
            }
        } else {
            $formError['Captcha'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                    . 'Vous avez Oublier de remplir le captcha';
        }
    }
} 