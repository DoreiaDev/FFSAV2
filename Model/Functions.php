<?php

/**
 * Description of functions
 *
 * @author gaeta
 */
class functions {

    public $pdo;
    public $id = 0;
    public $TypeOfLicence = '';
    public $CompetitionManager='';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }
//Liste de toutes les function 
    public function ListOfFunction() {
        $query = 'SELECT `id`, `TypeOfLicence`, `CompetitionManager` FROM `0108asap_functions` WHERE `id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//    Ajout d'une fonction
    public function AddFunction() {
        $query='INSERT INTO `0108asap_functions`( `TypeOfLicence`, `CompetitionManager`) VALUES (:TypeOfLicence, :CompetitionManager)';
         $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':TypeOfLicence', $this->TypeOfLicence, PDO::PARAM_STR);
        $queryResult->bindValue(':CompetitionManager', $this->CompetitionManager, PDO::PARAM_STR);
        return $queryResult->execute();
    }

}
