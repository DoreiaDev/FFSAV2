<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfficialRegistrationCompetition
 *
 * @author gaeta
 */
class OfficialRegistrationCompetition {

    public $pdo;
    public $id = 0;
    public $Aviable = '';
    public $AviableDate1 = '';
    public $AviableDate2 = '';
    public $AviableDate3 = '';
    public $AviableDate4 = '';
    public $AviableDate5 = '';
    public $NeedAccomodation1 = '';
    public $NeedAccomodation2 = '';
    public $NeedAccomodation3 = '';
    public $NeedAccomodation4 = '';
    public $NeedAccomodation5 = '';
    public $ObservationRequestFromOfficial = '';
    public $IdSportEvents = 0;
    public $IdMembers = 0;
    public $Idfunction = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

    public function OfficalRegistrationForCompétition() {
        $query = 'INSERT INTO `0108asap_officialregistrationcompetition`'
                . '( `Aviable`, '
                . '`AviableDate1`, `AviableDate2`, `AviableDate3`, `AviableDate4`, `AviableDate5`, '
                . '`NeedAccomodation1`, `NeedAccomodation2`, `NeedAccomodation3`, `NeedAccomodation4`, `NeedAccomodation5`, '
                . '`Observation-RequestFromOfficial`, `id_0108asap_SportEvents`, `id_0108asap_members`, `id_0108asap_function`)'
                . ' VALUES '
                . '(:Aviable,'
                . ' :AviableDate1, :AviableDate2, :AviableDate3, :AviableDate4, :AviableDate5, '
                . ':NeedAccomodation1, :NeedAccomodation2, :NeedAccomodation3, :NeedAccomodation4, :NeedAccomodation5, '
                . ':ObservationRequestFromOfficial, :IdSportEvents, :IdMembers, :Idfunction)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Aviable', $this->Aviable, PDO::PARAM_STR);
        $queryResult->bindValue(':AviableDate1', $this->AviableDate1, PDO::PARAM_STR);
        $queryResult->bindValue(':AviableDate2', $this->AviableDate2, PDO::PARAM_STR);
        $queryResult->bindValue(':AviableDate3', $this->AviableDate3, PDO::PARAM_STR);
        $queryResult->bindValue(':AviableDate4', $this->AviableDate4, PDO::PARAM_STR);
        $queryResult->bindValue(':AviableDate5', $this->AviableDate5, PDO::PARAM_STR);
        $queryResult->bindValue(':NeedAccomodation1', $this->NeedAccomodation1, PDO::PARAM_STR);
        $queryResult->bindValue(':NeedAccomodation2', $this->NeedAccomodation2, PDO::PARAM_STR);
        $queryResult->bindValue(':NeedAccomodation3', $this->NeedAccomodation3, PDO::PARAM_STR);
        $queryResult->bindValue(':NeedAccomodation4', $this->NeedAccomodation4, PDO::PARAM_STR);
        $queryResult->bindValue(':NeedAccomodation5', $this->NeedAccomodation5, PDO::PARAM_STR);
        $queryResult->bindValue(':ObservationRequestFromOfficial', $this->ObservationRequestFromOfficial, PDO::PARAM_STR);
        $queryResult->bindValue(':IdSportEvents', $this->IdSportEvents, PDO::PARAM_INT);
        $queryResult->bindValue(':IdMembers', $this->IdMembers, PDO::PARAM_INT);
        $queryResult->bindValue(':Idfunction', $this->Idfunction, PDO::PARAM_INT);
//        $queryResult->debugDumpParams();
//        die();
        return $queryResult->execute();
    }

    public function CheckMemberRegistredByCompetition() {
        $query = 'SELECT `0108asap_officialregistrationcompetition`.`id`, '
                . '`0108asap_officialregistrationcompetition`.`id_0108asap_members` '
                . 'FROM `0108asap_officialregistrationcompetition` '
                . 'WHERE `id_0108asap_members`=:IdMembers && `id_0108asap_SportEvents`=:IdSportEvents ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdMembers', $this->IdMembers, PDO::PARAM_INT);
        $queryResult->bindValue(':IdSportEvents', $this->IdSportEvents, PDO::PARAM_INT);
//        $queryResult->debugDumpParams();
//        die();
        $queryResult->execute();
        if ($queryResult->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function ListOfCompetitionByOfficials() {
        $query = ''
                . 'WHERE `id_0108asap_members`=IdMembers';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdMembers', $this->IdMembers, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function ListCompetitionByOfficial() {
        $query = 'SELECT `0108asap_officialregistrationcompetition`.`id` AS `idOfficialRegistrationCompetition`,'
                . '`0108asap_officialregistrationcompetition`.`Observation-RequestFromOfficial`, `RegistrationDate`, '
                . '`0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents`,   `0108asap_sportsevents`.`NameOfTheTest`, '
                . '`0108asap_sportsevents`.`Location_Circuit`, `0108asap_sportsevents`.`Observation`, `0108asap_sportsevents`.`CompetitionStarDay`, '
                . '`0108asap_sportsevents`.`CompetitionEndDay`, `0108asap_sportsevents`.`MinimumNumberOfOfficials`, '
                . '`0108asap_officialregistrationcompetition`.`id_0108asap_members` AS `IdMemberCompetition`, '
                . '`0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_functions`.`TypeOfLicence`, '
                . '`0108asap_officialregistrationcompetition`.`Aviable` '
                . 'FROM `0108asap_officialregistrationcompetition` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_function`'
                . 'INNER JOIN `0108asap_sportsevents`'
                . ' ON `0108asap_sportsevents`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents` '
                . 'INNER JOIN `0108asap_competiton`'
                . ' ON `0108asap_competiton`.`id_0108asap_sportsevents` = `0108asap_sportsevents`.`id`'
                . ' INNER  JOIN `0108asap_raceoutsiderally` '
                . 'ON `0108asap_raceoutsiderally`.`IdCompetition`=`0108asap_competiton`.`id`'
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition`'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListRalyByOfficial() {
        $query = 'SELECT `0108asap_officialregistrationcompetition`.`id` AS `idOfficialRegistrationCompetition`, '
                . '`0108asap_officialregistrationcompetition`.`Observation-RequestFromOfficial`, '
                . '`RegistrationDate`, `0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents`, '
                . '`0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, `0108asap_sportsevents`.`Observation`, '
                . '`0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, `0108asap_sportsevents`.`MinimumNumberOfOfficials`, '
                . '`0108asap_officialregistrationcompetition`.`Aviable`, '
                . '`0108asap_typeofcompetition`.`TypeOfCompetiton`, '
                . '`0108asap_functions`.`TypeOfLicence`, '
                . '`0108asap_officialregistrationcompetition`.`id_0108asap_members` AS `IdMemberRally`'
                . 'FROM `0108asap_officialregistrationcompetition` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_function`'
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id_0108asap_sportsevents` = `0108asap_sportsevents`.`id` '
                . 'INNER  JOIN `0108asap_rally` '
                . 'ON `0108asap_rally`.`id_0108asap_competiton`=`0108asap_competiton`.`id`'
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
