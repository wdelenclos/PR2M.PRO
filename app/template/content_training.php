
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
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <br>
                                        <p>Vous allez débuter une session d'entrainement Lexical Access:</p>
                                        <br>
                                    <label for="">Selectionnez un patient:</label>
                                    <select name="" class="form-control">
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
                                    <br>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-play"></i> Débuter l'entrainement</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /page content -->
