<?php
include_once '../Config.php';
include_once '../Controller/SpecialEventsAwardedCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
              
            </div>
            <div class="col-lg-6 ">
                <h1></h1>
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

            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>