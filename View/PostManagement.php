<?php
include_once '../Config.php';
include_once '../Controller/PostManagementCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
              
            </div>
            <div class="col-lg-10 ">
                <h1>Gestion des postes sur les différentes compétition</h1>
            </div>
            <div class="col-lg-1">
                <div>
                    <a href="HomeLogin.php"><button>Retour</button></a>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">              
            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <a href="PositionManagement.php?idSportevents=<?=$IdSportEvent?>"><button>affecter les postes aux officiel inscrit</button></a>
                    <a href="SpecialEventsAwarded.php"><button>Ajout des Es </button></a>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>