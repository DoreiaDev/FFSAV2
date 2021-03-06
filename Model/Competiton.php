<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competiton
 *
 * @author gaeta
 */
class Competiton {

    public $pdo;
    public $id = 0;
    public $id_0108asap_categorycompetition = 0;
    public $id_0108asap_sportsevents = 0;
    public $id_0108asap_typeofcompetition = 0;
    public $Open = '0';
    public $Close = '1';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

//fonction pour obtenir le dernier id inserer dans la BD
    public function LastInsertIdCompetition() {
        return $this->pdo->db->lastInsertId();
    }

    //AJout d'une competition
    public function AddOutsideCompetition() {
        $query = 'INSERT INTO `0108asap_competiton`'
                . '(  `id_0108asap_categorycompetition`,   `id_0108asap_sportsevents`, '
                . '`id_0108asap_typeofcompetition`, `Open`, `Close`) '
                . 'VALUES (:id_0108asap_categorycompetition, :id_0108asap_sportsevents, :id_0108asap_typeofcompetition, :Open, :Close)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id_0108asap_categorycompetition', $this->id_0108asap_categorycompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_sportsevents', $this->id_0108asap_sportsevents, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_typeofcompetition', $this->id_0108asap_typeofcompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':Open', $this->Open, PDO::PARAM_STR);
        $queryResult->bindValue(':Close', $this->Close, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function ListCompetitionByIdSportEvent() {
        $query = 'SELECT `id`, `id_0108asap_categorycompetition`, `id_0108asap_sportsevents`, `id_0108asap_typeofcompetition`'
                . ' FROM `0108asap_competiton` WHERE `id_0108asap_sportsevents`=:id_0108asap_sportsevents';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id_0108asap_sportsevents', $this->id_0108asap_sportsevents, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

}
