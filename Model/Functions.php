<?php

/**
 * Description of functions
 *
 * @author gaeta
 */
class functions {

    public $pdo;
    public $id = 0;
    public $TypeOfLicence = '';
    public $CompetitionManager = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
    }

//    Ajout d'une fonction
    public function AddFunction() {
        $query = 'INSERT INTO `0108asap_functions`( `TypeOfLicence`, `PermissionToAccess`) VALUES (:TypeOfLicence, :CompetitionManager)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':TypeOfLicence', $this->TypeOfLicence, PDO::PARAM_STR);
        $queryResult->bindValue(':CompetitionManager', $this->CompetitionManager, PDO::PARAM_STR);
        return $queryResult->execute();
    }

//Liste de toutes les function 
    public function ListOfFunction() {
        $query = 'SELECT `0108asap_functions`.`id`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functions`.`PermissionToAccess`, `0108asap_permissiontoaccess`.`TypeOfAcces` '
                . 'FROM `0108asap_functions` '
                . 'INNER JOIN `0108asap_permissiontoaccess` '
                . 'ON `0108asap_permissiontoaccess`.`id`=`0108asap_functions`.`PermissionToAccess` '
                . 'WHERE `0108asap_functions`.`id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    //liste des licences en fonction de l'id
    public function DisplayListOfFunctionForId() {
        $query = 'SELECT `0108asap_functions`.`id`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functions`.`PermissionToAccess`, `0108asap_permissiontoaccess`.`TypeOfAcces` '
                . 'FROM `0108asap_functions` '
                . 'INNER JOIN `0108asap_permissiontoaccess` '
                . 'ON `0108asap_permissiontoaccess`.`id`=`0108asap_functions`.`PermissionToAccess` '
                . 'WHERE `0108asap_functions`.`id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

//modification des licences fonction 
    public function ModifyFunction() {
        $query = 'UPDATE `0108asap_functions` SET `TypeOfLicence`=:TypeOfLicence, `PermissionToAccess`=:PermissionToAccess WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':TypeOfLicence', $this->TypeOfLicence, PDO::PARAM_STR);
        $queryResult->bindValue(':PermissionToAccess', $this->PermissionToAccess, PDO::PARAM_STR);
        return $queryResult->execute();
    }
//suppréssion de la licence(fonction)
    public function DeleteFunction(){
        $query='DELETE FROM `0108asap_functions` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
}
