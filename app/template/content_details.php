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
                                            <h4 class="panel-title">Résultats pré-test</h4> <button type="button" class="btn btn-success">Exporter les données</button>
                                        </a>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                            <div class="panel-body">

                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div class="x_content">

                                                        <div class="col-xs-3">
                                                            <!-- required for floating -->
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <li class="active"><a href="#preEMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#preEVIP" data-toggle="tab">EVIP</a>
                                                                </li>
                                                                <li><a href="#preDRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#predeno" data-toggle="tab">Denomination</a>
                                                                </li>
                                                                <li><a href="#predesi" data-toggle="tab">Designation</a>
                                                                </li>
                                                                <li><a href="#preBELO" data-toggle="tab">BELO</a>
                                                                </li>
                                                                <li><a href="#prequest" data-toggle="tab">Questionnaire</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="preEMME">
                                                                    <p class="lead">Récupération du fichier EMME</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>
                                                                </div>
                                                                <div class="tab-pane" id="preEVIP">
                                                                    <p class="lead">Score EVIP</p>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Score">
                                                                        <span class="fa fa-circle-o-notch form-control-feedback right" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="preDRA">
                                                                    <p class="lead">Score DRA</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre d'erreurs </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="text" class="form-control"  placeholder="Saisir le nb d'erreurs">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Temps (/s) </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" placeholder="Temps en secondes">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="predeno">
                                                                    <p class="lead">Récupération du fichier</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
                                                                <div class="tab-pane" id="predesi">
                                                                    <p class="lead">Récupération du fichier </p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
                                                                <div class="tab-pane" id="preBELO">
                                                                    <p class="lead">Score Belo</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resultat </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" placeholder="Saisir le résultat">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="prequest">
                                                                    <p class="lead">Récupération du questionnaire</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
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
                                                <p class="lead">Résultats de l'entrainement à la maison:</p>
                                                <h4>Etat: </h4>
                                                <span class="label label-success">A jour</span>
                                                <span class="label label-warning"><1 jour de retard</span>
                                                <span class="label label-danger">Plusieurs jours de retard</span>
                                                <div class="x_content">
                                                    <div id="graph_bar" style="width: 100%; height: 280px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="280" version="1.1" width="100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël @@VERSION</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="42.515625" y="213.3026007804375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M55.015625,213.3026007804375H288" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.515625" y="166.22695058532813" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.258200585328126">750</tspan></text><path fill="none" stroke="#aaaaaa" d="M55.015625,166.22695058532813H288" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.515625" y="119.15130039021875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.260675390218751">1,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M55.015625,119.15130039021875H288" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.515625" y="72.07565019510938" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.263150195109375">2,250</tspan></text><path fill="none" stroke="#aaaaaa" d="M55.015625,72.07565019510938H288" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.515625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.25">3,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M55.015625,25H288" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="276.35078125" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-91.9662,213.7221)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">Other</tspan></text><text x="253.05234375" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-117.498,215.2815)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">iPhone 6S Plus</tspan></text><text x="206.45546875" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-122.6478,186.2621)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">iPhone 6 Plus</tspan></text><text x="159.85859375" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-123.428,154.1777)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">iPhone 5S</tspan></text><text x="113.26171875" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-135.6736,130.1323)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">iPhone 3GS</tspan></text><text x="66.66484375" y="225.8026007804375" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-136.9992,98.4243)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.255725780437501">iPhone 4</tspan></text><rect x="57.9279296875" y="189.4509380149154" width="17.473828124999997" height="23.851662765522093" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="81.2263671875" y="172.18986627670864" width="17.473828124999997" height="41.11273450372886" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="104.5248046875" y="196.04152904223074" width="17.473828124999997" height="17.261071738206766" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="127.82324218749999" y="114.69480550508173" width="17.473828124999997" height="98.60779527535577" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="151.1216796875" y="172.18986627670864" width="17.473828124999997" height="41.11273450372886" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="174.4201171875" y="78.10133342008336" width="17.473828124999997" height="135.20126736035414" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="197.7185546875" y="141.49654234949733" width="17.473828124999997" height="71.80605843094017" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="221.0169921875" y="64.4807786302984" width="17.473828124999997" height="148.8218221501391" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="244.3154296875" y="120.97155886442964" width="17.473828124999997" height="92.33104191600786" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="267.61386718750003" y="127.24831222377756" width="17.473828124999997" height="86.05428855665994" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 199px; top: 111px; display: none;"><div class="morris-hover-row-label">Other</div><div class="morris-hover-point" style="color: #26B99A">
                                                                Geekbench:
                                                                1,371
                                                            </div></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <h4 class="panel-title">Resultats post-test</h4><button type="button" class="btn btn-success">Exporter les données</button>
                                        </a>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div class="x_content">

                                                        <div class="col-xs-3">
                                                            <!-- required for floating -->
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <li class="active"><a href="#postEMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#postEVIP" data-toggle="tab">EVIP</a>
                                                                </li>
                                                                <li><a href="#postDRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#postdeno" data-toggle="tab">Denomination</a>
                                                                </li>
                                                                <li><a href="#postdesi" data-toggle="tab">Designation</a>
                                                                </li>
                                                                <li><a href="#postBELO" data-toggle="tab">BELO</a>
                                                                </li>
                                                                <li><a href="#postquest" data-toggle="tab">Questionnaire</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="postEMME">
                                                                    <p class="lead">Récupération du fichier EMME</p>

                                                                    <form action="uploadEmme.php" class="dropzone dz-clickable">
                                                                        <div class="dz-default dz-message">
                                                                            <span>Glissez vos résultats ici ou cliquez pour les envoyer</span>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane" id="postEVIP">
                                                                    <p class="lead">Score EVIP</p>
                                                                    <form action="">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <input type="text" class="form-control" id="inputSuccess3" placeholder="Score">
                                                                            <span class="fa fa-circle-o-notch form-control-feedback right" aria-hidden="true"></span>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane" id="postDRA">
                                                                    <p class="lead">Score DRA</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre d'erreurs </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="text" class="form-control"  placeholder="Saisir le nb d'erreurs">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Temps (/s) </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" placeholder="Temps en secondes">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="postdeno">
                                                                    <p class="lead">Récupération du fichier</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
                                                                <div class="tab-pane" id="postdesi">
                                                                    <p class="lead">Récupération du fichier </p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
                                                                <div class="tab-pane" id="postBELO">
                                                                    <p class="lead">Score BELO</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resultat </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" placeholder="Saisir le résultat">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="postquest">
                                                                    <p class="lead">Récupération du questionnaire</p>

                                                                    <form action="form_upload.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Glissez vos résultats ici ou cliquez pour les envoyer</span></div></form>

                                                                </div>
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