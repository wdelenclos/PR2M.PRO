<?php


ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL & ~E_NOTICE);

require ('config.php');
require ('connect.php');
?>


<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="clearfix"></div>
    <div class="row">
		<?php
		notification();
		?>
    </div>
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Nombre de patients</span>
            <div class="count"><?=$dataPatients[3]?></div>
            <span class="count_bottom"><a href="?p=liste&identifiant=<?=$_SESSION['identifiant']?>">Voir la liste</a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-arrow-circle-right"></i> En cours</span>
            <div class="count"><?=$dataPatients[0]?></div>
            <span class="count_bottom"><a href="?p=liste&identifiant=<?=$_SESSION['identifiant']?>">Compléter</a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> En attente</span>
            <div class="count"><?=$dataPatients[1]?></div>
            <span class="count_bottom"><a href="?p=liste&identifiant=<?=$_SESSION['identifiant']?>">Compléter</a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-check"></i> Terminés</span>
            <div class="count"><?=$dataPatients[2]?></div>
            <span class="count_bottom"><a href="?p=liste&identifiant=<?=$_SESSION['identifiant']?>">Compléter</a></span>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tous les patients</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <a href="?p=nouveau&identifiant=<?=$_SESSION['identifiant']?>"> <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Nouveau patient</button>
                    </a>
                        <hr>
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Patient</th>
                            <th>Informations</th>
                            <th>Avancée</th>
                            <th>Etat</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        listAllPatient($bdd);
                        ?>


                        </tbody>
                    </table>
                    <!-- end project list -->

                </div>
            </div>
        </div>
    </div>
    <br/>
</div>
<!-- /page content -->
