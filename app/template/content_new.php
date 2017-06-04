
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Création du profil d'un patient</h3>
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
                        <h2>Identité du patient <small>Les champs sont obligatoires</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left input_mask" method="post" action="function/adderPa.php">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="nom" placeholder="Nom" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="prenom" placeholder="Prenom" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label>Date de naissance: </label>
                                <input type="date" class="form-control" name="date" required>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label>Niveau scolaire </label>
                                <input type="text" class="form-control" placeholder="Saisissez les niveau scolaire" name="level" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label>Latéralité :</label>
                                    <select name="lateralite">
                                        <option value="Droitier">Droitier</option>
                                        <option value="Gaucher">Gaucher</option>
                                    </select>

                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <label for="commentaire">Commentaire (20 caract. min, 100 max) :</label>
                            <textarea id="commentaire" required="required" class="form-control" name="commentaire" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                      data-parsley-validation-threshold="10"></textarea>

                            <br/>

                                <input type="hidden" name="identifiant" value="<?= $_SESSION['identifiant']?>">


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