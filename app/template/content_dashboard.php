

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
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Actualités <small>18 mai</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span>Developpement</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Mise à jour de la plateforme !</a>
                                    </h2>
                                    <div class="byline">
                                        <span>il y a 2 heures</span> par <a>Wladimir Delenclos</a>
                                    </div>
                                    <p class="excerpt">La plateforme a été mise à jour, bienvenue à la 2.1.5
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span>Chercheurs</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Lancement de la recherche </a>
                                    </h2>
                                    <div class="byline">
                                        <span>il y a 2 heures</span> par <a>Julie Nothelier</a>
                                    </div>
                                    <p class="excerpt">Nous lançons la plateforme pour le projet
                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Guide d'utilisation <small>Obtenez de l'aide facilement</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-xs-3">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a href="#home" data-toggle="tab">Home</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Profile</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">Messages</a>
                            </li>
                            <li><a href="#settings" data-toggle="tab">Settings</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <p class="lead">Home tab</p>
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                    synth. Cosby sweater eu banh mi, qui irure terr.</p>
                            </div>
                            <div class="tab-pane" id="profile">Profile Tab.</div>
                            <div class="tab-pane" id="messages">Messages Tab.</div>
                            <div class="tab-pane" id="settings">Settings Tab.</div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Patients en cours</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

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
                        listWaitingPatient($bdd);
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