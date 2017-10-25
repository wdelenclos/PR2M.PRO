
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="?p=dashboard&identifiant=<?= $_SESSION['identifiant']?>" class="site_title"><span>PR2M</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                     <div class="profile_pic">
                        <img src="images/user.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span><?= $_SESSION['identifiant']?></span>
                        <h2><?= $_SESSION['prenom'].' '. $_SESSION['nom']?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="?p=dashboard&identifiant=<?= $_SESSION['identifiant']?>"><i class="fa fa-tachometer"></i> Tableau de bord </a></li>
                             <li><a><i class="fa fa-compass"></i> Guide d'utilisation <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="?p=shared1&identifiant=<?= $_SESSION['identifiant']?>">La plateforme</a></li>
                                    <li><a href="?p=shared2&identifiant=<?= $_SESSION['identifiant']?>">Le protocole</a></li>
                                    <li><a href="?p=shared3&identifiant=<?= $_SESSION['identifiant']?>">A propos</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-users"></i> Patients <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="?p=liste&identifiant=<?= $_SESSION['identifiant']?>">Liste des patients</a></li>
                                    <li><a href="?p=nouveau&identifiant=<?= $_SESSION['identifiant']?>">Nouveau patient</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-check"></i> Tests <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="?p=order&identifiant=<?= $_SESSION['identifiant']?>">Ordre de passation</a></li>
                                    <li><a href="?p=tests&identifiant=<?= $_SESSION['identifiant']?>">Matériel</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-rotate-left"></i> Entrainements <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="?p=training&identifiant=<?= $_SESSION['identifiant']?>">Nouvel entrainement</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <ul class="nav side-menu">
	                        <?php if(in_array($_SESSION['identifiant'], ADMINMAIL)){?>
                                <li><a><i class="fa fa-user-md"></i>Praticiens<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="?p=listeP&identifiant=<?= $_SESSION['identifiant']?>">Liste des praticiens</a></li>
                                        </li>
                                        <li><a href="?p=nouveauP&identifiant=<?= $_SESSION['identifiant']?>">Ajouter un praticiens</a></li>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-database"></i> Données récoltées<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="?p=export&identifiant=<?=$_SESSION['identifiant']?>">Tableau GoogleSheet</a></li>
                                        <li><a href="?p=files&identifiant=<?=$_SESSION['identifiant']?>">Fichiers importés (EMME)</a></li>
                                    </ul>
                                </li>

	                        <?php } ?>

                        </ul>

                    </div>

                </div>
                <!-- /sidebar menu -->
                <script>
                    function requestFullScreen() {

                        var el = document.body;

                        // Supports most browsers and their versions.
                        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen
                            || el.mozRequestFullScreen || el.msRequestFullScreen;

                        if (requestMethod) {

                            // Native full screen.
                            requestMethod.call(el);

                        } else if (typeof window.ActiveXObject !== "undefined") {

                            // Older IE.
                            var wscript = new ActiveXObject("WScript.Shell");

                            if (wscript !== null) {
                                wscript.SendKeys("{F11}");
                            }
                        }
                    }</script>
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Auteurs">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    <a onclick="requestFullScreen();" data-toggle="tooltip" data-placement="top" title="Plein écran">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Verrouiller">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Déconnecter" href="?p=logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/user.png" alt=""><?= $_SESSION['prenom'].' '. $_SESSION['nom']?> <?php if(in_array($_SESSION['identifiant'], ADMINMAIL)){?>
                                    <span> (Administrateur)</span>
	                            <?php } ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">Mon compte</a></li>
                                <li><a href="javascript:;">Aide</a></li>
                                <li><a href="?p=logout"><i class="fa fa-sign-out pull-right"></i> Deconnexion</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="badge bg-green" id="clock">00:00</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <i class="fa fa-calendar"></i>
                                        <span>
                          <span>    Calendrier</span>
                        </span>
                                        <br>
                                        <br>
                                        <span class="message">
                         <?php
                         $date = date("d/m/Y");
                         Print("Nous sommes le $date");

                         ?>
                        </span>

                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>

        <!-- /top navigation -->
