<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of raceoutsiderally
 *
 * @author gaeta
 */
class RaceOutsideRally {

    public $pdo;
    public $id = 0;
    public $RequirementDate1 = '';
    public $RequirementDate2 = '';
    public $RequirementDate3 = '';
    public $LodgingPossible1 = '';
    public $LodgingPossible2 = '';
    public $LodgingPossible3 = '';
    public $IdCompetition = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddRaceOutsideRally() {
        $query = 'INSERT INTO `0108asap_raceoutsiderally`'
                . '( `RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `LodgingPossible1`, `LodgingPossible2`, `LodgingPossible3`, `IdCompetition`)'
                . ' VALUES '
                . '(:RequirementDate1, :RequirementDate2, :RequirementDate3, :LodgingPossible1, :LodgingPossible2, :LodgingPossible3, :IdCompetition)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':RequirementDate1', $this->RequirementDate1, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate2', $this->RequirementDate2, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate3', $this->RequirementDate3, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible1', $this->LodgingPossible2, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible2', $this->RequirementDate1, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible3', $this->LodgingPossible3, PDO::PARAM_STR);
        $queryResult->bindValue(':IdCompetition', $this->IdCompetition, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function ListeRaceOutsideRally() {
        
    }

    public function EdditRaceOutsideRally() {
        
    }

}
