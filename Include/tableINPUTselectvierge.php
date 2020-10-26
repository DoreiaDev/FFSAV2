<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($fc as $cf) {
            ?>
            <tr>              
                <th scope="row"></th>
                <td></td>
            </tr>
            <?php
        }
//                
        ?>
    </tbody>
</table>
<!--//---------------------------------------------------------------------------->
<!--input avec recuperation et message d'erreur-->
<div>
    <label for=""></label>
    <input type="" name="" value="<?= isset($_POST['']) ? $_POST[''] : '' ?>" id=""/>
    <p class="text-danger" id="Error"><?= isset($formError['']) ? $formError[''] : '' ?></p>
</div>
<!--Selcet ac message d'erreur et foreach-->
<div>
    <label>Sélectionnez  dans la liste suivante :*</label><br>
    <select class="custom-select custom-select-sm" name="" id="">
        <option selected="">Choissez dans la liste suivante </option>
        <?php
        foreach ($a as $b) {
            ?>
            <option value="<?= $b->id ?>"> <?= $b->c ?></option>
            <?php
        }
        ?>
    </select>
    <p class="text-danger"><?= isset($formError['']) ? $formError[''] : '' ?></p>
</div>
<div>
                            <label>Etes vous disponible pour participé au Rallye  :*</label><br>
                            <select class="custom-select custom-select-sm" name="Availability" id="Availability">
                                <option value="Oui "> Je suis disponible</option>
                                <option value="NON"> Je suis indisponible</option> </select>
                            <p class="text-danger"><?= isset($formError['Availability']) ? $formError['Availability'] : '' ?></p>
                        </div>
<!--------------------------------------------------------->
<?php
// controler avec message d'erreur vide ac regexText et icone
if (!empty($_POST[''])) {
    if (preg_match($RegexTitle, $_POST[''])) {
        $k->d = htmlspecialchars($_POST['']);
    } else {
        $formError[''] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de ne mettre que des caratéres alphabétiques';
    }
} else {
    $formError[''] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
            . 'Veuillez remplir le champs Nom la compétiton';
}
//controleur avec message d'erreur regexid
if (!empty($_POST[''])) {
    if (preg_match($RegexId, $_POST[''])) {
        $a->a = htmlspecialchars($_POST['']);
    } else {
        $formError[''] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Merci de ne mettre que des caratéres Chiffre';
    }
} else {
    $formError[''] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
            . 'Veuillez remplir le champs Minimun d\'officiel';
}
//controleur de date avec possibiliter de  vide
if (!empty($_POST[''])) {
    $Ay->a = htmlspecialchars($_POST['']);
} else {
    $Ay->a = '2020/01/01';
}
//date non vide 
   if (!empty($_POST['RequirementDate1'])) {
        $AddRaceOutsideRally->RequirementDate1 = htmlspecialchars($_POST['RequirementDate1']);
    } else {
        $formError['RequirementDate1'] = '<img src="../Assets/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />'
                . 'Veuillez remplir le champs Date Des besoins officiel 1';
    }
    
//    SELECT `0108asap_officialregistrationcompetition`.`id`
//     AS `OfficialRegistrationCompetition`, `0108asap_officialregistrationcompetition`.`Aviable`, `0108asap_officialregistrationcompetition`.`AviableDate1`, 
//     `0108asap_officialregistrationcompetition`.`AviableDate2`, `0108asap_officialregistrationcompetition`.`AviableDate3`, `0108asap_officialregistrationcompetition`.`AviableDate4`, 
//     `0108asap_officialregistrationcompetition`.`AviableDate5`, `0108asap_officialregistrationcompetition`.`NeedAccomodation1`, 
//     `0108asap_officialregistrationcompetition`.`NeedAccomodation2`, `0108asap_officialregistrationcompetition`.`NeedAccomodation3`, 
//     `0108asap_officialregistrationcompetition`.`NeedAccomodation4`, `NeedAccomodation5`, `0108asap_officialregistrationcompetition`.`Observation-RequestFromOfficial`, 
//     `RegistrationDate`, `0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents`, `0108asap_raceoutsiderally`.`ObservationAccommodation`, 
//     `0108asap_raceoutsiderally`.`NumberOfCompetitonDays`, `0108asap_raceoutsiderally`.`RequirementDate1`, `0108asap_raceoutsiderally`.`RequirementDate2`, 
//     `0108asap_raceoutsiderally`.`RequirementDate3`, `0108asap_raceoutsiderally`.`RequirementDate4`, `0108asap_raceoutsiderally`.`RequirementDate5`, 
//     `0108asap_raceoutsiderally`.`LodgingPossible1`, `0108asap_raceoutsiderally`.`LodgingPossible2`, `0108asap_raceoutsiderally`.`LodgingPossible3`, 
//     `0108asap_raceoutsiderally`.`LodgingPossible4`, `0108asap_raceoutsiderally`.`LodgingPossible5` FROM `0108asap_officialregistrationcompetition` 
//     INNER JOIN `0108asap_sportsevents` ON `0108asap_sportsevents`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents` 
//     INNER JOIN `0108asap_competiton` ON `0108asap_competiton`.`id_0108asap_sportsevents` = `0108asap_sportsevents`.`id` INNER  JOIN `0108asap_raceoutsiderally` 
//     ON `0108asap_raceoutsiderally`.`IdCompetition`=`0108asap_competiton`.`id`
    
    
//    SELECT `0108asap_officialregistrationcompetition`.`id` AS `OfficialRegistrationCompetition`, `0108asap_officialregistrationcompetition`.`Aviable`, 
//    `0108asap_officialregistrationcompetition`.`AviableDate1`, `0108asap_officialregistrationcompetition`.`AviableDate2`, 
//    `0108asap_officialregistrationcompetition`.`AviableDate3`, `0108asap_officialregistrationcompetition`.`AviableDate4`, 
//    `0108asap_officialregistrationcompetition`.`AviableDate5`, `0108asap_officialregistrationcompetition`.`NeedAccomodation1`, 
//    `0108asap_officialregistrationcompetition`.`NeedAccomodation2`, `0108asap_officialregistrationcompetition`.`NeedAccomodation3`,
//     `0108asap_officialregistrationcompetition`.`NeedAccomodation4`, `NeedAccomodation5`, 
//     `0108asap_officialregistrationcompetition`.`Observation-RequestFromOfficial`, `RegistrationDate`, 
//     `0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents`, `0108asap_raceoutsiderally`.`ObservationAccommodation`, 
//     `0108asap_raceoutsiderally`.`NumberOfCompetitonDays`, `0108asap_raceoutsiderally`.`RequirementDate1`, 
//     `0108asap_raceoutsiderally`.`RequirementDate2`, `0108asap_raceoutsiderally`.`RequirementDate3`, 
//     `0108asap_raceoutsiderally`.`RequirementDate4`, `0108asap_raceoutsiderally`.`RequirementDate5`, `0108asap_raceoutsiderally`.`LodgingPossible1`,
//      `0108asap_raceoutsiderally`.`LodgingPossible2`, `0108asap_raceoutsiderally`.`LodgingPossible3`, `0108asap_raceoutsiderally`.`LodgingPossible4`, 
//      `0108asap_raceoutsiderally`.`LodgingPossible5`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, 
//      `0108asap_sportsevents`.`Observation`,`0108asap_sportsevents`.`CompetitionStarDay`, `0108asap_sportsevents`.`CompetitionEndDay`, 
//      `0108asap_sportsevents`.`MinimumNumberOfOfficials` 
//      FROM `0108asap_officialregistrationcompetition` 
//      INNER JOIN `0108asap_sportsevents` 
//      ON `0108asap_sportsevents`.`id`=`0108asap_officialregistrationcompetition`.`id_0108asap_SportEvents` 
//      INNER JOIN `0108asap_competiton` 
//      ON `0108asap_competiton`.`id_0108asap_sportsevents` = `0108asap_sportsevents`.`id` 
//      INNER  JOIN `0108asap_raceoutsiderally` 
//      ON `0108asap_raceoutsiderally`.`IdCompetition`=`0108asap_competiton`.`id`
    
    
    
?>