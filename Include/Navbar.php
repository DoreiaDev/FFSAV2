<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['connect'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="HomeLogin.php"> Accueil de connexion <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://img.icons8.com/ios/50/000000/user-menu-male.png" title="Gerer mon profils"/>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="MyProfiles.php">Mon profil</a>
                        <a class="dropdown-item" href="AddALicence.php">License complémentaire</a>
                        <!--<a class="dropdown-item" href="#">Something else here</a>-->
                    </div>
                </li>
                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
                    <!--partie responsable-->
                    <div class="Management">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://img.icons8.com/ios/50/000000/add-administrator.png" title="Gestion responsable "/>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="ListOfAsa.php">Gestion des ASA/ASK</a>
                                <a class="dropdown-item"  href="ListOfLeague.php">Gestion des Ligues </a>
                                <a class="dropdown-item" href="ChoiceOfCompetition.php">Ajout d'une compétition</a>
                                <a class="dropdown-item" href="ChoiceOfCompetition.php">Choisir le type de compétition à ouvrir</a>
                                <a class="dropdown-item" href="CompetitionOfSelection.php">Gestion des postes sur la compétition</a>
                                <!--<a class="dropdown-item" href="AddingARally.php"></a>-->
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $PresidentOfAsa)) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                      <img src="https://img.icons8.com/windows/64/000000/project.png" title="Reservé au président d'ASA"/>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"  href="ListOfLeague.php">Gestion des Ligues </a>
                            <a class="dropdown-item" href="ListOfFunction.php">Gestion des licences (fonction)</a>          
                        </div>
                    </li>
                    <?php
                }
                if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
                    ?>
                    <!--Partie pour tout le monde-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://img.icons8.com/doodle/48/000000/finish-flag.png" title="Competition ouvert inscription "/>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="ListOfOpenCompetition.php">Liste des compétitions </a>
                            <a class="dropdown-item" href="CompetitionWehereIAmRegistred.php">Competition Ou je suis inscrit</a>
                        </div>
                    </li>
                <?php }
                ?>

                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"> <img src="https://img.icons8.com/metro/26/000000/logout-rounded-up.png" title="Déconnexion"/> <span class="sr-only">(current)</span></a>
                </li>
            <?php } else { ?>
                <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="Connection.php">connexion</a>
                </li>
            <?php }
            ?>
        </ul>
    </div>
</nav>
<main>