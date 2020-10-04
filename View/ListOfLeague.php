<?php
include_once '../Config.php';
include_once '../Controller/ListOfLeagueCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 ">
            <h1>Gestion des Ligues</h1>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 leftColumm">
            <?php
            ?>
        </div>
        <div class="col-lg-6 centralColumm">
            <div>
                <h2>liste des Ligues </h2>>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom de la ligues</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ListeDisplayLeagues as $DiplayLeagues) {
                                ?>
                                <tr>              
                                    <th scope="row"><?= $DiplayLeagues->LeagueName ?></th>
                                    <td><a href="ModifyLeague.php?idLeague=<?= $DiplayLeagues->id ?>">ICI</a></td>
                                    <td><a href="DeleteLeague.php?idLeague=<?= $DiplayLeagues->id ?>">ICI</a></td>
                                </tr>
                                <?php
                            }
//                
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <a href="AddLeague.php"><button>Ajouter une Ligues</button></a>
            </div>

        </div>
        <div class="col-lg-3 rigthColumm">
            <div>
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>