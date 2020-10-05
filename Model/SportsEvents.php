<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SportsEventsModel
 *
 * @author gaeta
 */
class SportsEventsModel {

    public $pdo;
    public $id = 0;
    public $NameOfTheTest = '';
    public $Location_Circuit = '';
    public $Observation = '';
    public $CompetitionStarDay = '';
    public $CompetitionEndDay = '';
    public $CreationDate = '';
    public $MinimumNumberOfOfficials = '';
    public $id_0108asap_asa = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

//fonction pour obtenir le dernier id inserer dans la BD
    public function lastInsertIdSportEvents() {
        return $this->pdo->db->lastInsertId();
    }

//Ajout d'un évenement sportif  
    public function AddSportEvents() {
        $query = 'INSERT INTO `0108asap_sportsevents`'
                . '( `NameOfTheTest`, `Location_Circuit`, `Observation`, `CompetitionStarDay`, `CompetitionEndDay`, `MinimumNumberOfOfficials`, '
                . ' `id_0108asap_asa`) VALUES (:NameOfTheTest, :Location_Circuit, :Observation, :CompetitionStarDay, '
                . ':CompetitionEndDay, :MinimumNumberOfOfficials, :id_0108asap_asa )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NameOfTheTest', $this->NameOfTheTest, PDO::PARAM_STR);
        $queryResult->bindValue(':Location_Circuit', $this->Location_Circuit, PDO::PARAM_STR);
        $queryResult->bindValue(':Observation', $this->Observation, PDO::PARAM_STR);
        $queryResult->bindValue(':CompetitionStarDay', $this->CompetitionStarDay, PDO::PARAM_STR);
        $queryResult->bindValue(':CompetitionEndDay', $this->CompetitionEndDay, PDO::PARAM_STR);
        $queryResult->bindValue(':MinimumNumberOfOfficials', $this->MinimumNumberOfOfficials, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_asa', $this->id_0108asap_asa, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
