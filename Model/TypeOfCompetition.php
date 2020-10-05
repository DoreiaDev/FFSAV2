<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeOfCompetition
 *
 * @author gaeta
 */
class TypeOfCompetition {

    public $pdo;
    public $id = 0;
    public $TypeOfCompetiton = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddTypeOfCompetiton() {
        $query = 'INSERT INTO `0108asap_typeofcompetition`( `TypeOfCompetiton`) VALUES (:TypeOfCompetiton)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':TypeOfCompetiton', $this->TypeOfCompetiton, PDO::PARAM_STR);
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

//Liste de tout les type
    public function ListTypeOfCompetiton() {
        $query = 'SELECT `id`, `TypeOfCompetiton` FROM `0108asap_typeofcompetition` WHERE `id` ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    // liste en fonction de l'id du type de competition 
    public function ListTypeOfCompetitionById() {
        $query = 'SELECT `id`, `TypeOfCompetiton` FROM `0108asap_typeofcompetition` WHERE `id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

// modification des types de compétition
    public function ModifyTypeOfCompetition() {
        $query = 'UPDATE `0108asap_typeofcompetition` SET `TypeOfCompetiton`=:TypeOfCompetiton WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

//Suppression d'un type de compétition
    public function DeleteTypeOfCompetition() {
        $query = 'DELETE FROM `0108asap_typeofcompetition` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

}
