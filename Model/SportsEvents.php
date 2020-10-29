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
    public $IdTypeCompetition = 0;
    public $IdLeague = 0;
    public $IdSportEvent=0;

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

    public function DiplayAllCompetitionAndLeague() {
        $query = 'SELECT `0108asap_sportsevents`.`id` AS `IdSportEvents`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, '
                . '`0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, `0108asap_sportsevents`.`CreationDate`, `0108asap_asa`.`id` AS `IdAsa`, '
                . '`0108asap_asa`.`AsaName`, `0108asap_asa`.`NumberAsa`, `0108asap_league`.`LeagueName`, `0108asap_competiton`.`Open`, `0108asap_competiton`.`Close`, '
                . '`0108asap_typeofcompetition`.`id` AS `IdTypeCompetition`,  `0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_categorycompetition`.`id` AS `IdCategoryCompetion`, `0108asap_categorycompetition`.`CategoryCompetition` '
                . 'FROM `0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa`  '
                . 'INNER JOIN  `0108asap_league` '
                . 'ON `0108asap_league`.`id` = `0108asap_asa`.`id_0108asap_League` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id_0108asap_sportsevents`=`0108asap_sportsevents`.`id` '
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`= `0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition`'
                . 'WHERE `0108asap_typeofcompetition`.`id`= :IdTypeCompetition && `0108asap_league`.`id`= :IdLeague && `CompetitionStarDay`>=CURRENT_DATE'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdTypeCompetition', $this->IdTypeCompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':IdLeague', $this->IdLeague, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayAnyCompetitionAndLegueSelected() {
        $query = 'SELECT `0108asap_sportsevents`.`id` AS `IdSportEvents`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, '
                . '`0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, `0108asap_sportsevents`.`CreationDate`, `0108asap_asa`.`id` AS `IdAsa`, '
                . '`0108asap_asa`.`AsaName`, `0108asap_asa`.`NumberAsa`, `0108asap_league`.`LeagueName`, `0108asap_competiton`.`Open`, `0108asap_competiton`.`Close`, '
                . '`0108asap_typeofcompetition`.`id` AS `IdTypeCompetition`,  `0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_categorycompetition`.`id` AS `IdCategoryCompetion`, `0108asap_categorycompetition`.`CategoryCompetition` '
                . 'FROM `0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa`  '
                . 'INNER JOIN  `0108asap_league` '
                . 'ON `0108asap_league`.`id` = `0108asap_asa`.`id_0108asap_League` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id_0108asap_sportsevents`=`0108asap_sportsevents`.`id` '
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`= `0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition`'
                . 'WHERE `0108asap_league`.`id`= :IdLeague && `CompetitionStarDay`>=CURRENT_DATE';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdLeague', $this->IdLeague, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayAnyLeagueAndCompetitionSelect() {
        $query = 'SELECT `0108asap_sportsevents`.`id` AS `IdSportEvents`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, '
                . '`0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, `0108asap_sportsevents`.`CreationDate`, `0108asap_asa`.`id` AS `IdAsa`, '
                . '`0108asap_asa`.`AsaName`, `0108asap_asa`.`NumberAsa`, `0108asap_league`.`LeagueName`, `0108asap_competiton`.`Open`, `0108asap_competiton`.`Close`, '
                . '`0108asap_typeofcompetition`.`id` AS `IdTypeCompetition`,  `0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_categorycompetition`.`id` AS `IdCategoryCompetion`, `0108asap_categorycompetition`.`CategoryCompetition` '
                . 'FROM `0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa`  '
                . 'INNER JOIN  `0108asap_league` '
                . 'ON `0108asap_league`.`id` = `0108asap_asa`.`id_0108asap_League` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id_0108asap_sportsevents`=`0108asap_sportsevents`.`id` '
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`= `0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition`'
                . 'WHERE `0108asap_typeofcompetition`.`id`= :IdTypeCompetition && `CompetitionStarDay`>=CURRENT_DATE';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdTypeCompetition', $this->IdTypeCompetition, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
//affichage de toutes les compettion et toutes les ligues 
    public function DisplayAllLeaguesAndCompetitions() {
        $query = 'SELECT `0108asap_sportsevents`.`id` AS `IdSportEvents`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, '
                . '`0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, '
                . '`0108asap_sportsevents`.`MinimumNumberOfOfficials`, `0108asap_sportsevents`.`CreationDate`, `0108asap_asa`.`id` AS `IdAsa`, '
                . '`0108asap_asa`.`AsaName`, `0108asap_asa`.`NumberAsa`, `0108asap_league`.`LeagueName`, `0108asap_competiton`.`Open`, `0108asap_competiton`.`Close`,'
                . ' `0108asap_typeofcompetition`.`id` AS `IdTypeCompetition`,  `0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_categorycompetition`.`id` AS `IdCategoryCompetion`, `0108asap_categorycompetition`.`CategoryCompetition` '
                . 'FROM `0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_asa` '
                . 'ON `0108asap_asa`.`id`= `0108asap_sportsevents`.`id_0108asap_asa`  '
                . 'INNER JOIN  `0108asap_league` '
                . 'ON `0108asap_league`.`id` = `0108asap_asa`.`id_0108asap_League` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id_0108asap_sportsevents`=`0108asap_sportsevents`.`id` '
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`= `0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition` && `CompetitionStarDay`>=CURRENT_DATE'
                . ' ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function DisplaySportEvent(){
        $query='SELECT `id`, `NameOfTheTest`, `Location_Circuit`, `CompetitionStarDay`, '
                . ' DATE_FORMAT(CompetitionStarDay,\'%d/%m/%Y\') AS `Début` '
                . ' FROM `0108asap_sportsevents` ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
}
