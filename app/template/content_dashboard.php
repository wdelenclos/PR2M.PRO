

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
                    <h2><i class="fa fa-compass "></i>Guide d'utilisation <small>Obtenez de l'aide facilement</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">A propos</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Utilisation</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">Calendrier</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">Contact</a>
                            </li>
                        </ul>
                        <div id="myTabContent2" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                                <hr>
                                <h3>PR2M, c&rsquo;est quoi&nbsp;?</h3>
                                <hr>
                                <p>PR2M, c&rsquo;est avant tout un travail de m&eacute;moire cherchant &agrave; valider un Protocole de Rem&eacute;diation du Manque du Mot. Soutenue par Gilles Leloup (Dr. en Sciences du langage, orthophoniste) et Anne Bragard (Dr. en Sciences psychologiques et de l&rsquo;&eacute;ducation, logop&egrave;de) cette &eacute;tude a pour objectif de valider scientifiquement un protocole facilement op&eacute;rationnel en clinique.</p>
                                <p>PR2M, c&rsquo;est aussi une plateforme cr&eacute;&eacute;e dans le cadre du projet. Elle permet ainsi de diffuser le protocole et de r&eacute;colter rapidement les donn&eacute;es. Interface entre les praticiens et les organisateurs de l&rsquo;&eacute;tude, elle est un moyen de gestion &agrave; distance privil&eacute;gi&eacute; pour r&eacute;unir le maximum de collaborateurs francophones.</p>
                                <p><em>Pour en savoir plus sur l&rsquo;&eacute;tude, allez dans l&rsquo;onglet &laquo;&nbsp;Donn&eacute;es partag&eacute;es&nbsp;&raquo;. </em></p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                                <hr>
                                <h3>Comment je l'utilise ?</h3>
                                <hr>
                                <p>La plateforme se veut fonctionnelle et agr&eacute;able d&rsquo;utilisation.</p>
                                <p>Le <strong>tableau de bord</strong> vous permet de voir directement&nbsp; la liste des patients et l&rsquo;&eacute;tat&nbsp; d&rsquo;avancement&nbsp; des passations.</p>
                                <p>L&rsquo;onglet <strong>Patients</strong> vous permet&nbsp;:</p>
                                <ul>
                                    <li>de cr&eacute;er un nouveau patient</li>
                                    <li>d&rsquo;acc&eacute;der &agrave; la liste compl&egrave;te de ceux d&eacute;j&agrave; cr&eacute;es.</li>
                                </ul>
                                <p>L&rsquo;onglet <strong>Tests</strong> permet&nbsp; d&rsquo;acc&eacute;der&nbsp;:</p>
                                <ul>
                                    <li>&agrave; l&rsquo;ordre de passation</li>
                                    <li>au mat&eacute;riel</li>
                                </ul>
                                <p>L&rsquo;onglet <strong>Donn&eacute;es partag&eacute;es</strong> permet l&rsquo;acc&egrave;s &agrave; la description d&eacute;taill&eacute;e de l&rsquo;&eacute;tude&nbsp;:</p>
                                <ul>
                                    <li>justification th&eacute;orique</li>
                                    <li>questions cliniques</li>
                                    <li>objectifs</li>
                                    <li>protocole exp&eacute;rimental</li>
                                </ul>
                                <p>&nbsp;</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="profile-tab">
                                <hr>
                                <h3>Calendrier</h3>
                                <hr>
                                <p>Nous vous proposons ici un d&eacute;roulement pratique du protocole. En dehors de la p&eacute;riode d&rsquo;entra&icirc;nement, ce calendrier est bien s&ucirc;r &agrave; titre indicatif et correspond &agrave; nos propres observations lors des passations.</p>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="143">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td width="153">
                                            <p>Bilan pr&eacute;-test</p>
                                            <p><strong>T0</strong></p>
                                        </td>
                                        <td width="170">
                                            <p>Entra&icirc;nement</p>
                                        </td>
                                        <td width="153">
                                            <p>Bilan post-test</p>
                                            <p><strong>T1</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="143">
                                            <p><strong>Dur&eacute;e&nbsp;: </strong></p>
                                        </td>
                                        <td width="153">
                                            <p>1 session de 1h *</p>
                                        </td>
                                        <td width="170">
                                            <p>5 semaines</p>
                                            <p>&nbsp;</p>
                                            <p>1 session quotidienne de 5 minutes</p>
                                        </td>
                                        <td width="153">
                                            <p>1 session de 1h</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="143">
                                            <p><strong>Dur&eacute;e totale&nbsp;: </strong>&nbsp;</p>
                                        </td>
                                        <td colspan="3" width="476">
                                            <p>6 &agrave; 7 semaines selon le d&eacute;lai bilan/entra&icirc;nement</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>&nbsp;</p>
                                <p>* La passation des tests d&eacute;passant les 30 minutes imparties pour une s&eacute;ance, n&rsquo;oubliez pas de programmer une s&eacute;ance bilan plus longue&nbsp;!</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content44" aria-labelledby="profile-tab">
                                <p>Email : <a href="mailto:equipe.pr2m@gmail.com">equipe.pr2m@gmail.com</a> &nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p>Nothelier Julie : + 33 (6) 45 40 36 39 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p>Giavelly Marion : + 33 (7) 77 38 10 61 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p>N&rsquo;h&eacute;sitez pas &agrave; nous contacter pour toute question ou toute difficult&eacute;.</p>
                                <p>Nous vous r&eacute;pondrons dans les plus brefs d&eacute;lais.</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-info-circle"></i> Bienvenue sur PR2M !</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <p>Toute l’équipe vous remercie de participer à cette étude.</p>
                        <p>Suivez notre Guide d’utilisation et n’hésitez pas à nous contacter pour toute question.</p>
                        <p>Bonnes passations et à bientôt</p>
                        <small>- L’équipe PR2M</small>
                    </div>
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