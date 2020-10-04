<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ASA
 *
 * @author gaeta
 */
class ASA {

    public $pdo;
    public $id = 0;
    public $AsaName = '';
    public $NumberAsa = '';
    public $id_0108asap_League = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    // Ajout d'une ASA
    public function AddAsa() {
        $query = 'INSERT INTO `0108asap_asa`( `AsaName`, `NumberAsa`, `id_0108asap_League`) '
                . 'VALUES '
                . '(:AsaName, :NumberAsa, :id_0108asap_League) ';

        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':AsaName', $this->AsaName, PDO::PARAM_STR);
        $queryResult->bindValue(':NumberAsa', $this->NumberAsa, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_League', $this->id_0108asap_League, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//    Affichage de la liste des asa
    public function DisplayListOfAsa() {
        $query = 'SELECT `0108asap_asa`.`id`, `AsaName`, `NumberAsa`, `id_0108asap_League`, `0108asap_league`.`LeagueName`, `0108asap_league`.`id` AS `IDLeague` '
                . 'FROM `0108asap_asa` '
                . 'INNER JOIN `0108asap_league` '
                . 'ON `0108asap_league`.`id`=`0108asap_asa`.`id_0108asap_League` '
                . 'WHERE `0108asap_asa`.`id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//Affichage d'une ASA ^par son ID
    public function DisplayListOfAsaForId() {
        $query = 'SELECT `0108asap_asa`.`id`, `AsaName`, `NumberAsa`, `id_0108asap_League`, `0108asap_league`.`LeagueName`, `0108asap_league`.`id` AS `League` FROM `0108asap_asa` INNER JOIN `0108asap_league` '
                . 'ON `0108asap_league`.`id`=`0108asap_asa`.`id_0108asap_League` '
                . 'WHERE `0108asap_asa`. `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    // Modification d'une ASA
    public function ModifyForAsa() {
        $query = 'UPDATE `0108asap_asa` SET `AsaName`=:AsaName, `NumberAsa`=:NumberAsa, `id_0108asap_League`=:id_0108asap_League WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':AsaName', $this->AsaName, PDO::PARAM_STR);
        $queryResult->bindValue(':NumberAsa', $this->NumberAsa, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_League', $this->id_0108asap_League, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
    //Supretion d'une asa
    public function DeleteAsa(){
        $query='DELETE FROM `0108asap_asa` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);   
        return $queryResult->execute();     
    }

}
