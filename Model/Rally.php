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
    public $ObservationAccommodation = '';
    public $RequirementDate1 = '';
    public $RequirementDate2 = '';
    public $RequirementDate3 = '';
    public $RequirementDate4 = '';
    public $RequirementDate5 = '';
    public $LodgingPossible1 = '';
    public $LodgingPossible2 = '';
    public $LodgingPossible3 = '';
    public $LodgingPossible4 = '';
    public $LodgingPossible5 = '';
    public $id_0108asap_competiton = 0;
    public $IdSportEvents=0;

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
        $query = 'SELECT `0108asap_rally`.`id` AS `IdRally`, `0108asap_typeofcompetition`.`id` AS `IdTyoeCompetition`, '
                . '`0108asap_typeofcompetition`.`TypeOfCompetiton`, `0108asap_categorycompetition`.`id` AS `IdCategoryCompet` ,'
                . ' `0108asap_categorycompetition`.`CategoryCompetition`, `0108asap_league`.`LeagueName`, '
                . '`0108asap_asa`.`AsaName`, `0108asap_sportsevents`.`NameOfTheTest`, '
                . '`0108asap_sportsevents`.`id` AS `IdSportEvent`, '
                . '`0108asap_sportsevents`.`Location_Circuit`, `0108asap_sportsevents`.`Observation`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`.`CompetitionStarDay`,\'%d/%m/%Y\') AS `StartDate`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`.`CompetitionEndDay`,\'%d/%m/%Y\') AS `EndDate`,  '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, '
                . '`0108asap_sportsevents`.`CreationDate`, '
                . '`0108asap_asa`.`NumberAsa`, `0108asap_rally`.`NumberOfSteps`, `0108asap_rally`.`NumberOfEs`, `0108asap_rally`.`NumberOfCompetitonDays`, '
                . '`0108asap_rally`.`ObservationAccommodation`, '
                . 'DATE_FORMAT(`0108asap_rally`.`RequirementDate1`,\'%d/%m/%Y\') AS `RequirementDate1`, '
                . 'DATE_FORMAT(`0108asap_rally`.`RequirementDate2`,\'%d/%m/%Y\') AS `RequirementDate2`, '
                . 'DATE_FORMAT(`0108asap_rally`.`RequirementDate3`,\'%d/%m/%Y\') AS `RequirementDate3`, '
                . 'DATE_FORMAT(`0108asap_rally`.`RequirementDate4`,\'%d/%m/%Y\') AS `RequirementDate4`, '
                . 'DATE_FORMAT(`0108asap_rally`.`RequirementDate5`,\'%d/%m/%Y\') AS `RequirementDate5`, '
                . 'DATE_FORMAT(`0108asap_rally`.`LodgingPossible1`,\'%d/%m/%Y\') AS `LodgingPossible1`, '
                . 'DATE_FORMAT(`0108asap_rally`.`LodgingPossible2`,\'%d/%m/%Y\') AS `LodgingPossible2`, '
                . 'DATE_FORMAT(`0108asap_rally`.`LodgingPossible3`,\'%d/%m/%Y\') AS `LodgingPossible3`, '
                . 'DATE_FORMAT(`0108asap_rally`.`LodgingPossible4`,\'%d/%m/%Y\') AS `LodgingPossible4`, '
                . 'DATE_FORMAT(`0108asap_rally`.`LodgingPossible5`,\'%d/%m/%Y\') AS `LodgingPossible5` '
                . 'FROM `0108asap_rally`'
                . ' INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_rally`.`id_0108asap_competiton` '
                . 'INNER JOIN  `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id` = `0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`= `0108asap_competiton`.`id_0108asap_categorycompetition`'
                . ' INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`= `0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa` '
                . 'INNER JOIN `0108asap_league` '
                . 'ON `0108asap_league`.`id`= `0108asap_asa`.`id_0108asap_League`'
                . 'WHERE `0108asap_sportsevents`.`id`=:IdSportEvents && `0108asap_competiton`.`Open`=1';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdSportEvents', $this->IdSportEvents, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function EdditRally() {
        
    }

}
