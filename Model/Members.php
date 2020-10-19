<?php

/**
 * Description of membres
 *
 * @author gaeta
 */
class membres {

    public $pdo;
    public $id = 0;
    public $Name = '';
    public $Firstname = '';
    public $Email = '';
    public $Password = '';
    public $Cle = '';
    public $Address = '';
    public $ZipCode = '0';
    public $City = '';
    public $Actif = false;
    public $id_0108asap_asa = 0;
    public $PhonNumber = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }

    public function newMember() {
        $query = 'INSERT INTO `0108asap_membres`(`Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `PhonNumber`, `id_0108asap_asa`) '
                . 'VALUES (:Name, :Firstname, :Email, :Password, :Cle, :Actif, :Address, :ZipCode, :City, :PhonNumber, :id_0108asap_asa )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Name', $this->Name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Password', $this->Password, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->bindValue(':Actif', $this->Actif, PDO::PARAM_STR);
        $queryResult->bindValue(':Address', $this->Address, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipCode', $this->ZipCode, PDO::PARAM_STR);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':PhonNumber', $this->PhonNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_asa', $this->id_0108asap_asa, PDO::PARAM_INT);
        //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
////        execution de la requette préparer:
        return $queryResult->execute();
    }

    public function ConnexionMembers() {
        $query = 'SELECT `0108asap_membres`.`id` AS `CountMembers` , `0108asap_membres`.`id`, `Name`, `Firstname`, `Email`, `Password`, `id_0108asap_asa`, '
                . '`0108asap_functionsummary`.`id_0108asap_function`, `0108asap_functions`.`PermissionToAccess` '
                . 'FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`= `0108asap_functionsummary`.`id_0108asap_function`WHERE `Email`= :Email'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function MemberExist() {
        $query = 'SELECT `Email` AS MemberExist FROM `0108asap_membres` WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        if ($queryResult->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function MemberProfile() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `id_0108asap_asa ` , '
                . '`TypeOfLicence` '
                . 'FROM `0108asap_membres '
                . '`INNER JOIN 0108asap_functionsummary '
                . 'ON`0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN  0108asap_functions '
                . 'ON `0108asap_functionsummary`.`id_0108asap_function`= `0108asap_functions`.`id`'
                . ' WHERE `LicencePrimary`=1 '
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function UserProfil() {
        $query = 'SELECT `0108asap_membres`.`id`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `0108asap_asa`.`AsaName`, `0108asap_asa`.`NumberAsa`, 
            `0108asap_league`.`LeagueName` 
            FROM `0108asap_membres` 
            LEFT JOIN `0108asap_asa` 
            ON `0108asap_asa`.`id`=`0108asap_membres`.`id_0108asap_asa` 
            LEFT JOIN `0108asap_league` 
            ON `0108asap_league`.`id`=`0108asap_asa`.`id_0108asap_League`
'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ProfilEdditing() {
        $query = 'UPDATE `0108asap_membres` '
                . 'SET`Name`= :Name, `Firstname`= :Firstname, `Email`= :Email, `Address`=:Address, `ZipCode`=:ZipCode, `City`=:City,`id_0108asap_asa`=:id_0108asap_asa '
                . 'WHERE `id`=:id'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':Name', $this->Name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Address', $this->Address, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipCode', $this->ZipCode, PDO::PARAM_INT);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_asa', $this->id_0108asap_asa, PDO::PARAM_INT);
        //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        // execution de la requette préparer:
        return $queryResult->execute();
    }

    public function DisplayPilote() {
        $query = 'SELECT `0108asap_membres`.`id`AS`CopliotID`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`,  `AsaName`,  `TypeOfLicence`, `id_0108asap_function` '
                . ' FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_member`= `0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function`'
                . ' WHERE `id_0108asap_function`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayCoPilote() {
        $query = 'SELECT  `0108asap_membres`.`id` AS `CopliotID`, `Name`, `Firstname`, `0108asap_functionsummary`.`id_0108asap_function` '
                . 'FROM `0108asap_membres` '
                . ' INNER JOIN `0108asap_functionsummary`'
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'WHERE `0108asap_functionsummary`.`id_0108asap_function`=16'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ArrayPilot() {
        $query = 'SELECT  `0108asap_membres`.`id` AS `PliotID`,  `0108asap_functionsummary`.`id_0108asap_function`  '
                . 'FROM `0108asap_membres`  '
                . 'INNER JOIN `0108asap_functionsummary` '
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id`'
                . ' ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//    Liste des membbres avec nom Prenom 
    public function AssignAManager() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id` AS `IdFunctionSummary` '
                . 'FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function` '
                . 'WHERE `0108asap_functionsummary`.`LicencePrimary`=1 ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function AssignAManagerLicense() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id` AS `IdFunctionSummary` '
                . 'FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary`'
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function` '
                . 'WHERE `0108asap_functionsummary`.`LicencePrimary`=1 && `0108asap_functionsummary`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function ModifyCle() {
        $query = 'UPDATE `0108asap_membres` SET `Cle`=:Cle WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function ModifyPassword() {
        $query = 'UPDATE `0108asap_membres` SET `Password`= :Password, `Cle`=:Cle WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->bindValue(':Password', $this->Password, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function MemberExistEmailAndCle() {
        $query = 'SELECT COUNT(`Email`) AS MemberExist, `Email`, Cle FROM `0108asap_membres` WHERE `Email`=:Email GROUP BY`Email`, `Cle`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function FunctionOfUser() {
        $query = 'SELECT `id_0108asap_functions`,`TypeOfLicence`, 0108asap_functions.`id` AS `IdFunction` FROM `0108asap_membres` INNER JOIN 0108asap_functions ON 0108asap_membres.`id_0108asap_functions`=0108asap_functions.`id` WHERE 0108asap_membres.`id`=:id GROUP BY `TypeOfLicence`, `id_0108asap_functions`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//         $queryResult->debugDumpParams();
//    die();
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

}
