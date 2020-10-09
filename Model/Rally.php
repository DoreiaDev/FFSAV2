<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rally
 *
 * @author gaeta
 */
class Rally {

    public $pdo;
    public $id = 0;
    public $NumberOfSteps = 0;
    public $NumberOfEs = 0;
    public $NumberOfCompetitonDays = 0;
    public $ObservationAccommodation='';
    public $RequirementDate1='';
    public $RequirementDate2='';
    public $RequirementDate3='';
    public $RequirementDate4='';
    public $RequirementDate5='';
    public $LodgingPossible1='';
    public $LodgingPossible2='';
    public $LodgingPossible3='';
    public $LodgingPossible4='';
    public $LodgingPossible5='';
    public $id_0108asap_competiton = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddRaly() {
        $query = 'INSERT INTO `0108asap_rally`( `NumberOfSteps`, `NumberOfEs`, `NumberOfCompetitonDays`, `ObservationAccommodation`, '
                . '`RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `RequirementDate4`, `RequirementDate5`, '
                . '`LodgingPossible1`, `LodgingPossible2`, `LodgingPossible3`, `LodgingPossible4`, `LodgingPossible5`, '
                . '`id_0108asap_competiton`) '
                . 'VALUES '
                . '(:NumberOfSteps, :NumberOfEs, :NumberOfCompetitonDays, :ObservationAccommodation,'
                . ' :RequirementDate1, :RequirementDate2, :RequirementDate3, :RequirementDate4, :RequirementDate5, '
                . ':LodgingPossible1, :LodgingPossible2, :LodgingPossible3, :LodgingPossible4, :LodgingPossible5, '
                . ':id_0108asap_competiton)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NumberOfSteps', $this->NumberOfSteps, PDO::PARAM_INT);
        $queryResult->bindValue(':NumberOfEs', $this->NumberOfEs, PDO::PARAM_INT);
        $queryResult->bindValue(':NumberOfCompetitonDays', $this->NumberOfCompetitonDays, PDO::PARAM_INT);
        $queryResult->bindValue(':ObservationAccommodation', $this->ObservationAccommodation, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate1', $this->RequirementDate1, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate2', $this->RequirementDate2, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate3', $this->RequirementDate3, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate4', $this->RequirementDate4, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate5', $this->RequirementDate5, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible1', $this->LodgingPossible1, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible2', $this->LodgingPossible2, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible3', $this->LodgingPossible3, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible4', $this->LodgingPossible4, PDO::PARAM_STR);
        $queryResult->bindValue(':LodgingPossible5', $this->LodgingPossible5, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
//        $queryResult->debugDumpParams();
//        die();
        return $queryResult->execute();
    }

    public function DisplayRegistrationOfficial() {
      
    }

    public function EdditRally() {
     
    }

}
