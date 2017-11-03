

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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-info-circle"></i>  Bienvenue sur PR2M !</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <p>Toute l’équipe vous remercie de participer à cette étude.</p>
                        <p>Suivez notre <a href="?p=guide&identifiant=<?= $_SESSION['identifiant']?>">Guide d’utilisation </a>et n’hésitez pas à nous contacter pour toute question.</p>
                        <p>Bonnes passations et à bientôt</p>
                        <small>- L’équipe PR2M</small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Vos derniers patients</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <a href="?p=nouveau&identifiant=<?=$_SESSION['identifiant']?>"> <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Nouveau patient</button>
                            <a href="?p=tests&identifiant=<?=$_SESSION['identifiant']?>"> <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Passer les test</button>
                                <a href="?p=training&identifiant=<?=$_SESSION['identifiant']?>"> <button type="submit" class="btn btn-success"><i class="fa fa-rotate-right"></i> Entrainement</button>
                                <?php if(in_array($_SESSION['identifiant'], ADMINMAIL)){?>
                                    <a href="?p=export&identifiant=<?=$_SESSION['identifiant']?>"> <button type="submit" class="btn btn-primary"><i class="fa fa-database"></i> Acceder à l'export des données</button>
                                <?php } ?>
                    </div>
                    <hr>
                    <p>Voici la liste de vos patients</p>

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