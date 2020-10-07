<?php
$title='Ajouter un rallye';
//lisste des tyoe de compétitions
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
//liste des ASA
$DiplayAsa= new ASA();
$DiplayListOfAsa= $DiplayAsa->DisplayListOfAsa();