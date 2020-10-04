<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PermissionOfAccess
 *
 * @author gaeta
 */
class PermissionOfAccess {

    public $pdo;
    public $id = 0;
    public $TypeOfAcces = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function DisplayPermissionaccess() {
        $query = 'SELECT `id`, `TypeOfAcces` FROM `0108asap_permissiontoaccess` WHERE `id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
