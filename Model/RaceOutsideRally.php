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
    public $IdSportEvents=0;

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

    public function DIsplayListeRaceOutsideRally() {
        $query = 'SELECT `0108asap_raceoutsiderally`.`id` AS `IdRaceOustideRally`, `0108asap_raceoutsiderally`.`ObservationAccommodation`, '
                . '`0108asap_typeofcompetition`.`id` AS `IdTyoeCompetition`, `0108asap_asa`.`NumberAsa`, `0108asap_raceoutsiderally`.`NumberOfCompetitonDays`, '
                . '`0108asap_typeofcompetition`.`TypeOfCompetiton`, `0108asap_categorycompetition`.`id` AS `IdCategoryCompet` ,'
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`RequirementDate1`,\'%d/%m/%Y\') AS `RequirementDate1`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`RequirementDate2`,\'%d/%m/%Y\') AS `RequirementDate2`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`RequirementDate3`,\'%d/%m/%Y\') AS `RequirementDate3`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`RequirementDate4`,\'%d/%m/%Y\') AS `RequirementDate4`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`RequirementDate5`,\'%d/%m/%Y\') AS `RequirementDate5`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`LodgingPossible1`,\'%d/%m/%Y\') AS `LodgingPossible1`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`LodgingPossible2`,\'%d/%m/%Y\') AS `LodgingPossible2`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`LodgingPossible3`,\'%d/%m/%Y\') AS `LodgingPossible3`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`LodgingPossible4`,\'%d/%m/%Y\') AS `LodgingPossible4`, '
                . 'DATE_FORMAT(`0108asap_raceoutsiderally`.`LodgingPossible5`,\'%d/%m/%Y\') AS `LodgingPossible5`, '
                . ' `0108asap_typeofcompetition`.`id` AS `IdTyoeCompetition`, `0108asap_categorycompetition`.`CategoryCompetition`, `0108asap_league`.`LeagueName`,'
                . ' `0108asap_asa`.`AsaName`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`id` AS `IdSportEvent`, '
                . '`0108asap_sportsevents`.`Location_Circuit`, `0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`MinimumNumberOfOfficials`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`.`CompetitionStarDay`,\'%d/%m/%Y\') AS `StartDate`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`.`CompetitionEndDay`,\'%d/%m/%Y\') AS `EndDate`,  '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, `0108asap_sportsevents`.`CreationDate`'
                . 'FROM `0108asap_raceoutsiderally`  '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_raceoutsiderally`.`IdCompetition`  '
                . 'INNER JOIN  `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id` = `0108asap_competiton`.`id_0108asap_typeofcompetition`  '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`= `0108asap_competiton`.`id_0108asap_categorycompetition` '
                . 'INNER JOIN `0108asap_sportsevents`  '
                . 'ON `0108asap_sportsevents`.`id`= `0108asap_competiton`.`id_0108asap_sportsevents`  '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa`  '
                . 'INNER JOIN `0108asap_league` '
                . 'ON `0108asap_league`.`id`= `0108asap_asa`.`id_0108asap_League` '
                . 'WHERE `0108asap_sportsevents`.`id`=:IdSportEvents && `0108asap_competiton`.`Open`=1';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdSportEvents', $this->IdSportEvents, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function EdditRaceOutsideRally() {
        
    }

}
