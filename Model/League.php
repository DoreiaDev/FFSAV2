<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of League
 *
 * @author gaeta
 */
class League {

    public $pdo;
    public $id = 0;
    public $LeagueName = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

//Ajout d'une ligue
    public function AddLeague() {
        $query = 'INSERT INTO `0108asap_league`( `LeagueName`) VALUES (:LeagueName)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LeagueName', $this->LeagueName, PDO::PARAM_STR);
        return $queryResult->execute();
    }

//Liste compléte des ligues 
    public function leagueList() {
        $query = 'SELECT `id`, `LeagueName` FROM `0108asap_league` WHERE `id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//    affichage du nom de la ligue par l'id
    public function LeagueListForID() {
        $query = 'SELECT `id`, `LeagueName` FROM `0108asap_league` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

//Modification d'une ligue
    public function ModifyLeague() {
        $query = 'UPDATE `0108asap_league` SET `LeagueName`=:LeagueName WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LeagueName', $this->LeagueName, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//Suppression d'une ligue
    public function DeleteLeague() {
        $query = 'DELETE FROM `0108asap_league` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
