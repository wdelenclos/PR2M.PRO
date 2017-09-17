<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PR2M | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="function/logger.php" method="post">
                    <h1>Connectez-vous</h1>
                    <div>
                        <input type="text" class="form-control" name="identifiant" placeholder="identifiant" required/>
                    </div>
                    <div class="text-center">
                        <input style="float: none; margin: 0" type="submit" value="Connexion" class="btn btn-default submit" data-inputmask="'mask': '9999999999'" >
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Pas de compte ?
                            <a href="#contact" class="to_register"> Contactez-nous </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1>PR2M</h1>
                            <p>©2017 PR2M - Wladimir Delenclos</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="contact" class="animate form registration_form">
            <section class="login_content">
                <form action="function/askid.php" method="post">
                    <h1>Contact</h1>
                    <div>
                        <input type="text" name="sign_Name" class="form-control" placeholder="Nom" required="" />
                    </div>
                    <div>
                        <input type="text" name="sign_FirstName" class="form-control" placeholder="Prénom" required="" />
                    </div>
                    <div>
                        <input type="email" name="sign_Email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div class="">
                        <input style="float: none; margin: 0" type="submit" value="Demande de mot de passe" class="btn btn-default submit" >
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Déjà un identifiant ?
                            <a href="#signin" class="to_register"> Connectez-vous </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1>PR2M</h1>
                            <p>©2017 PR2M - Wladimir Delenclos</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>