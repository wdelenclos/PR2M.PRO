<?php


// BDD INFO
define("DNS", 'mysql:host=localhost;');
define("DBNAME",'dbname=pr2m'  );
define('USERNAME','root');
define('PASSWD', 'root');


try {
    $bdd = new PDO(DNS. DBNAME , USERNAME , PASSWD );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (PDOException $e) {
    $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PR2M | Famille</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"> <span>PR2M | Famille</span></a>
                    </div>

                    <div class="clearfix"></div>



                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>


                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Entrainement journalier</h3>
                        </div>

                        <div class="title_right">

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Session du <?php echo date('d M Y');?> <small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li></li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <!-- Smart Wizard -->
                                    <p>Vous allez démarrer une session d'entrainement</p>
                                    <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom du patient <span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                    <select class="form-control" name="test_PatientName" id="test_PatientName">
                                                     <?php
                                                          try {
                                                            $sql = 'SELECT *
                                                            FROM `patients`';
                                                            $stmt = $bdd->prepare($sql);
                                                            $stmt->execute();
                                                            $array = [];
                                                            while ($row = $stmt->fetchObject()) {?>
                                                    
                                                                <option value=" <?= $row->id ?> "> <?= $row->nom.' '.str_split($row->prenom, 1)[0].'.';?></option>
                                                    
                                                          <?php
                                                            };
                                                           
                                                        } catch (PDOException $e) {
                                                    
                                                            echo $e->getMessage();
                                                        }
                                                        ?>
                                                        </select>
                                                        <input type="hidden" value="train" id ="testtype">
                                                        <br>
                                                        <button type="submit" id="test_starter" class="btn btn-success"><i class="fa fa-play"></i> Débuter l'entrainement</button>
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="test" style="display:none; position: fixed;top: 0;z-index: 333;width: 100%;height: 100vh;background-color: #ffffff; text-align: center">
                <h1 id="vtnvTitle" style="margin-top: 350px"><p> <button>Cliquez-ici pour commencer</button>    </p></h1>
                <img id="ImageTestIMG" src="" style="display: none;margin: 35vh auto;width: 250px;height: 250px;text-align: center;" alt="Chargement du test ...">
            </div>
            <!-- /page content -->

<?php 
include_once('../app/template/footer.php');
