<?php
include_once '../Config.php';
include_once '../Controller/ListOfFunctionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
              
            </div>
            <div class="col-lg-6 ">
                <h1>Liste des fonction(licences) disponible</h1>
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
                         <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom de la licence</th>
                            <th scope="col">License de responsable</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimze</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($DisplayListFunction as $ListFunction) {
                            ?>
                            <tr>              
                                <th scope="row"><?= $ListFunction->TypeOfLicence ?></th>
                                <td><?= $ListFunction->CompetitionManager ?></td>
                                <td><a href="">ICI</a></td>
                                <td><a href="">ICI</a></td>
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
                    <a href="AddFunction.php"><button>Ajouter une fonction</button></a>
                </div>
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