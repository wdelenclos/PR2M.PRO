
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Entrainements</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">-</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Débuter un entrainement</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 result">
                                        <br>
                                        <p>Vous allez débuter une session d'entrainement Lexical Access:</p>
                                        <br>
                                    <label for="">Selectionnez un patient:</label>
                                    <select id="test_PatientName" name="" class="form-control">
                                        <option disabled>Selectionner un patient</option>
                                        <?php
                                        $sql = 'SELECT *
                                        FROM `patients`
                                        WHERE praticien = :identifiant';
                                        $stmt = $bdd->prepare($sql);
                                        $stmt->bindValue(':identifiant',$_GET['identifiant']);
                                        $stmt->execute();
                                        while ($row = $stmt->fetchObject()) {
                                            ?>
                                            <option value="<?= $row->id ?>"><?= $row->nom ?> <?= $row->prenom ?> | ID: <?= $row->id ?></option>
                                            <?php
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
            <div class="clearfix"></div>
            <div class="test" style="display:none; position: fixed;top: 0;z-index: 333;width: 100%;height: 100vh;background-color: #ffffff; text-align: center">
                <h1 id="vtnvTitle" style="margin-top: 350px"><p> <button>Cliquez-ici pour commencer</button>    </p></h1>
                <img id="ImageTestIMG" src="" style="display: none;margin: 35vh auto;width: 250px;height: 250px;text-align: center;" alt="Chargement du test ...">
            </div>
        <div class="clearfix"></div>
        </div>
        <!-- /page content -->
