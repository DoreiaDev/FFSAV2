<?php
include_once '../Config.php';
include_once '../Controller/ListOfAsaCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
//if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 ">
            <h1>Gestion des ASA</h1>
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
                <h2>Liste des ASA </h2>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom de L'ASA/ASK</th>
                            <th scope="col">Numéro de L'ASA/ASK</th>
                            <th scope="col">Ligue de L'ASA/ASK</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($DiplayListOfAsa as $ListDisplayForAsa) {
                            ?>
                            <tr>              
                                <th scope="row"><?= $ListDisplayForAsa->AsaName ?></th>
                                <td><?= $ListDisplayForAsa->NumberAsa ?></td>
                                <td><?= $ListDisplayForAsa->LeagueName ?></td>
                                <td><a href="ModifyAsa.php?IdAsa=<?= $ListDisplayForAsa->id ?> ">ICI</a></td>
                                <td><a href="DeleteAsa.php?IdAsa=<?= $ListDisplayForAsa->id ?>">ICI</a></td>
                            </tr>
                            <?php
                        }
//                
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3 rigthColumm">
            <div>
                <a href="AddAsa.php"><button>Ajouter une ASA</button></a>
            </div>  
            <div>
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>

        </div>
    </div>
</div>
<?php
//} else {
//    include_once '../Include/RestrictedZone.php';
//}
include_once '../include/footer.php';
?>