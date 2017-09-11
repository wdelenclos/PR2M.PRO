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
$data = searchOnePatient($bdd);
$id = $data->id;
$nom = $data->nom;
$prenom = $data->prenom;
$lateralite = $data->lateralite;
$date = $data->date_naissance;
$niveau = $data->niveau;
?>
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Dropzone.js -->
<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Détails du patient</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <?php
            notification();
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Fiche de suivi<!--<small>Dernière modification: </small>--></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3><?= $prenom. ' '.$nom?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-hand-paper-o user-profile-icon"></i> <?= $lateralite?>
                                </li>

                                <li>
                                    <i class="fa fa-birthday-cake user-profile-icon"></i> <?= $date?>
                                </li>

                                <li>
                                    <i class="fa fa-graduation-cap user-profile-icon"></i> <?= $niveau?>
                                </li>

                                <li>
                                    <i class="fa fa-key user-profile-icon"></i> ID:  <?= $id?>
                                </li>
                            </ul>

                            <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Modifier</a>
                            <br />



                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="x_content">

                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel">
                                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-title">Résultats pré-test</h4>
                                        </a>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                            <div class="panel-body">

                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div class="x_content">

                                                        <div class="col-xs-3">
                                                            <!-- required for floating -->
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <li class="active"><a href="#EMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#EVIP" data-toggle="tab">EVIP</a>
                                                                </li>
                                                                <li><a href="#DRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#deno" data-toggle="tab">Denomination</a>
                                                                </li>
                                                                <li><a href="#desi" data-toggle="tab">Designation</a>
                                                                </li>
                                                                <li><a href="#BELO" data-toggle="tab">BELO</a>
                                                                </li>
                                                                <li><a href="#quest" data-toggle="tab">Questionnaire</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="EMME">
                                                                    <p class="lead">Récupération du fichier EMME</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>
                                                                </div>
                                                                <div class="tab-pane" id="EVIP">Profile Tab.</div>
                                                                <div class="tab-pane" id="DRA">Messages Tab.</div>
                                                                <div class="tab-pane" id="deno">Settings Tab.</div>
                                                                <div class="tab-pane" id="desi">Settings Tab.</div>
                                                                <div class="tab-pane" id="BELO">Settings Tab.</div>
                                                                <div class="tab-pane" id="quest">Settings Tab.</div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <h4 class="panel-title">Entrainement</h4>
                                        </a>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div class="x_content">

                                                        <div class="col-xs-3">
                                                            <!-- required for floating -->
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <li class="active"><a href="#EMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#EVIP" data-toggle="tab">EVIP</a>
                                                                </li>
                                                                <li><a href="#DRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#deno" data-toggle="tab">Denomination</a>
                                                                </li>
                                                                <li><a href="#desi" data-toggle="tab">Designation</a>
                                                                </li>
                                                                <li><a href="#BELO" data-toggle="tab">BELO</a>
                                                                </li>
                                                                <li><a href="#quest" data-toggle="tab">Questionnaire</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="EMME">
                                                                    <p class="lead">Récupération du fichier EMME</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>
                                                                </div>
                                                                <div class="tab-pane" id="EVIP">Profile Tab.</div>
                                                                <div class="tab-pane" id="DRA">Messages Tab.</div>
                                                                <div class="tab-pane" id="deno">Settings Tab.</div>
                                                                <div class="tab-pane" id="desi">Settings Tab.</div>
                                                                <div class="tab-pane" id="BELO">Settings Tab.</div>
                                                                <div class="tab-pane" id="quest">Settings Tab.</div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                                 </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <h4 class="panel-title">Resultats post-test</h4>
                                        </a>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div class="x_content">

                                                        <div class="col-xs-3">
                                                            <!-- required for floating -->
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <li class="active"><a href="#EMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#EVIP" data-toggle="tab">EVIP</a>
                                                                </li>
                                                                <li><a href="#DRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#deno" data-toggle="tab">Denomination</a>
                                                                </li>
                                                                <li><a href="#desi" data-toggle="tab">Designation</a>
                                                                </li>
                                                                <li><a href="#BELO" data-toggle="tab">BELO</a>
                                                                </li>
                                                                <li><a href="#quest" data-toggle="tab">Questionnaire</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="EMME">
                                                                    <p class="lead">Récupération du fichier EMME</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>
                                                                </div>
                                                                <div class="tab-pane" id="EVIP">Profile Tab.</div>
                                                                <div class="tab-pane" id="DRA">Messages Tab.</div>
                                                                <div class="tab-pane" id="deno">Settings Tab.</div>
                                                                <div class="tab-pane" id="desi">Settings Tab.</div>
                                                                <div class="tab-pane" id="BELO">Settings Tab.</div>
                                                                <div class="tab-pane" id="quest">Settings Tab.</div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of accordion -->


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Dropzone.js -->
<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>