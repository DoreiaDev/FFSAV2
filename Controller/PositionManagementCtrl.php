<?php
$title='Gestion des postes pour les compétitions ';
$ListOfOfficialsRegistredForACompetition= new OfficialRegistrationCompetition();
$DisplayByCompetition=$ListOfOfficialsRegistredForACompetition->ListCompetitionByOfficial();
$ListOfOfficialsRegistredForARally= new OfficialRegistrationCompetition();
$DisplaylisteByRally=$ListOfOfficialsRegistredForARally->ListRalyByOfficial();