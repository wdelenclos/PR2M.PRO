
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Création du profil praticien</h3>
            </div>

            <div class="title_right">

                <br>    <p></p>
                <br>    <p></p>

            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Identité du praticien <small>Les champs sont obligatoires</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left input_mask" method="post" action="function/signer.php">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="sign_Name" placeholder="Nom" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="sign_FirstName" placeholder="Prenom" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label>Email: </label>
                                <input type="email" class="form-control" name="sign_Email" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="hidden" name="sign_date" value="<?= time()?>">
                                <input type="hidden" name="sign_id" value="<?= $_SESSION['identifiant']?>">


                                <button type="reset" class="btn btn-primary">Réinitialiser</button>
                                <button type="submit" class="btn btn-success">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /page content -->