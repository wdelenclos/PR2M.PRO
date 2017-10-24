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
$testData = getTestData($data->id, $bdd);
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
                        <form class="formTest">
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
                                    <i class="fa fa-key user-profile-icon"></i> ID:  <span id="usrId"><?= $id?></span>
                                </li>
                            </ul>
<!--
                            <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Modifier</a>
                            <a class="btn btn-warning" href="function/delete.php?id=<?= $id ?>&identifiant=<?=$_GET['identifiant']?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer <?= $nom ?> ?')" ><i class="fa fa-trash-o m-right-xs"></i> Supprmier</a>
                            <br />
-->
                            <hr>
                            <?php
                            if($testData->lastupdate !== null){?>
                                <p>Date des données actuelles: <br/><?php echo date('d/m/Y H:i:s', $testData->lastupdate); ?></p>
                             <?php    
                            }
                            else{ ?>
                                 <p>Date des données actuelles: <br/>Aucune données</p>
                           
                            <?php 
                            }
                            ?>
                           <br />
                            <div >
                                <input type="submit" class="btn btn-success warn" id="upd" disabled value="Aucune modifications"></input>
                                <br/>
                            </div>




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
                                                                    <li class="active"><a href="#preEMME" data-toggle="tab">EMME</a>
                                                                    </li>
                                                                    <li><a href="#preEDA" data-toggle="tab">EDA</a>
                                                                    </li>
                                                                    <li><a href="#preDRA" data-toggle="tab">DRA</a>
                                                                    </li>
                                                                    <li><a href="#preVTNV" data-toggle="tab">VTNV</a>
                                                                    </li>
                                                                    <li><a href="#preLA" data-toggle="tab">Lexical Access</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="col-xs-9">
                                                                <!-- Tab panes -->
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="preEMME">
                                                                        <p class="lead">Epreuve EMME</p>
                                                                        <div class="form-group">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                                            <label>Dénomination:</label>
                                                                                <br>
                                                                        <small>Selectionnez l'export excel : <?= $testData->pre_deno_excel ?? 'Aucun fichier actuellement'?></small>
                                                                        <input type="file" name="pre_deno_excel" id="pre_deno_excel">
                                                                        <small>Fiche de suivi (PDF ou JPG) : <?= $testData->pre_deno_pdf ?? 'Aucune fiche'?></small>
                                                                        <input type="file" name="pre_deno_pdf" id="pre_deno_pdf">
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        <div class="form-group">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Désignation:</label>
                                                                                <br>
                                                                        <small>Selectionnez l'export excel : <?= $testData->pre_desi_excel ?? 'Aucun fichier actuellement'?></small>
                                                                        <input type="file" name="pre_desi_excel" id="pre_desi_excel">
                                                                        <br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="preEDA">
                                                                        <p class="lead">Epreuve EDA</p>
                                                                        <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Dénomination :</label>
                                                                            <input type="number" class="form-control" id="pre_deno_score" name="pre_deno_score" min ="0" max="60" placeholder="Précision /60" value="<?= $testData->pre_deno_score ?>">
                                                                            <span class="fa fa-tachometer form-control-feedback right" aria-hidden="true"></span>
                                                                        </div>
                                                                        </div>
                                                                        <div class="form-group">

                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Désignation :</label>
                                                                            <input type="number" class="form-control" id="pre_desi_score" name="pre_desi_score"  min ="0" max="34" placeholder="Précision /34"  value="<?= $testData->pre_desi_score ?>">
                                                                            <span class="fa fa-tachometer form-control-feedback right" aria-hidden="true"></span>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="preDRA">
                                                                        <p class="lead">Epreuve DRA</p>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre d'erreurs</label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="number" class="form-control" id="pre_nb_erreur" name="pre_nb_erreur" min="0" placeholder="Saisir le nb d'erreurs" value="<?= $testData->pre_nb_erreur ?>">
                                                                            </div>
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Temps (/s) </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="number" class="form-control" id="pre_time" name="pre_time" mi="0" placeholder="Temps en secondes "value="<?= $testData->pre_time ?>">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="tab-pane" id="preVTNV">
                                                                        <p class="lead">Vitesse traitement non-verbal</p>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Les résultats sont automatiquement enregistrés lors de la passation </label>
                                                                            <p><?= $testData->pre_json ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="preLA">
                                                                        <p class="lead">Lexical access</p>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Les résultats sont automatiquement enregistrés lors de la passation </label>
                                                                            <p><?= $testData->pre_la ?></p>
                                                                        </div>
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
                                            <h4 class="panel-title">Résultats des entrainement</h4>
                                        </a>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Jour</th>
                                                    <th>Heure de session</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>18 oct</td>
                                                    <td>17:44:30</td>
                                                    <td> <span class="badge bg-green">Terminé</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>19 oct</td>
                                                    <td>17:44:30</td>
                                                    <td> <span class="badge bg-orange">En attente</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>20 oct</td>
                                                    <td>17:44:30</td>
                                                    <td><span class="badge bg-red">Non effectué</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
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
                                                                <li class="active"><a href="#postEMME" data-toggle="tab">EMME</a>
                                                                </li>
                                                                <li><a href="#postEDA" data-toggle="tab">EDA</a>
                                                                </li>
                                                                <li><a href="#postDRA" data-toggle="tab">DRA</a>
                                                                </li>
                                                                <li><a href="#postVTNV" data-toggle="tab">VTNV</a>
                                                                </li>
                                                                <li><a href="#postLA" data-toggle="tab">Lexical Access</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-9">
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="postEMME">
                                                                    <p class="lead">Epreuve EMME</p>
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                                            <label>Dénomination:</label>
                                                                            <br>
                                                                            <small>Selectionnez l'export excel : <?= $testData->post_deno_excel ?? 'Aucun fichier actuellement'?></small>
                                                                            <input type="file" name="post_deno_excel" id="post_deno_excel">
                                                                            <small>Fiche de suivi (PDF ou JPG) : <?= $testData->post_deno_pdf ?? 'Aucune fiche'?></small>
                                                                            <input type="file" name="post_deno_pdf" id="post_deno_pdf">
                                                                        </div>
                                                                    </div>
                                                                    <br>

                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Désignation:</label>
                                                                            <br>
                                                                            <small>Selectionnez l'export excel : <?= $testData->post_desi_excel ?? 'Aucun fichier actuellement'?></small>
                                                                            <input type="file" name="post_desi_excel" id="post_desi_excel">
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="postEDA">
                                                                    <p class="lead">Epreuve EDA</p>
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Dénomination :</label>
                                                                            <input type="number" class="form-control" id="post_deno_score" name="post_deno_score" min ="0" max="60" placeholder="Précision /60" value="<?= $testData->post_deno_score ?>">
                                                                            <span class="fa fa-tachometer form-control-feedback right" aria-hidden="true"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label>Désignation :</label>
                                                                            <input type="number" class="form-control" id="post_desi_score" name="post_desi_score"  min ="0" max="34" placeholder="Précision /34"  value="<?= $testData->post_desi_score ?>">
                                                                            <span class="fa fa-tachometer form-control-feedback right" aria-hidden="true"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="postDRA">
                                                                    <p class="lead">Epreuve DRA</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre d'erreurs</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" id="post_nb_erreur" name="post_nb_erreur" min="0" placeholder="Saisir le nb d'erreurs" value="<?= $testData->post_nb_erreur ?>">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Temps (/s) </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input type="number" class="form-control" id="post_time" name="post_time" mi="0" placeholder="Temps en secondes "value="<?= $testData->post_time ?>">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="postVTNV">
                                                                    <p class="lead">Vitesse traitement non-verbal</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Les résultats sont automatiquement enregistrés lors de la passation </label>
                                                                        <p><?= $testData->post_json ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="postLA">
                                                                    <p class="lead">Lexical access</p>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Les résultats sont automatiquement enregistrés lors de la passation </label>
                                                                        <p><?= $testData->post_la ?></p>
                                                                    </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script>
    (function(){

        function showBtnUpdate(){
            document.getElementsByClassName('warn')[0].removeAttribute("disabled");
            document.getElementsByClassName('warn')[0].value = 'Mettre à jour';
        }
        console.log( document.getElementsByClassName('formTest')[0]);

        document.getElementsByClassName('formTest')[0].addEventListener("change", function () {
            console.log('Donnée modifiées');
            showBtnUpdate();
        });
        function showUpdateDone(){
            document.getElementById('upd').value = 'A jour !';
        }
        document.getElementsByClassName('formTest')[0].addEventListener("submit", function (e) {
            e.preventDefault();
            var target = document.getElementsByClassName('formTest')[0];
            var form_data = new FormData(target);
            form_data.append('id', document.getElementById('usrId').textContent);
            form_data.append('identifiantusr', <?= $_SESSION['identifiant']?>);
            $.ajax({
                url: "./function/sendData.php",
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
                complete: function(data) {
                    if(data.status !== 200){
                        console.log('Erreur: ' + data.statusText);
                    }
                    else{
                        console.log(data);
                        showUpdateDone();

                    }
                }
            });


        }, false);
    })();
</script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Dropzone.js -->
<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>