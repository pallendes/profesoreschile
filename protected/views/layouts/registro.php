<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootstrap includes -->
        <link href="<?php echo Yii::app()->request->baseUrl ?>/public/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- /bootstrap includes -->

        <!-- css -->
        <link href="<?php echo Yii::app()->request->baseUrl ?>/public/css/style.css" rel="stylesheet">
        <!-- /css -->

        <!-- fuentes -->
        <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
        <!-- /fuentes -->

        <!-- font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--
        <link href="<?php //echo Yii::app()->request->baseUrl          ?>/public/css/font-awesome.min.css" rel="stylesheet">
        <!-- /font awesome -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div id="topHeader">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="topHeaderTitle">
                            header top
                        </div>
                    </div>
                    <div class="col-md-6 socialIcons">
                        <ul class="pull-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-offset-1">
                        <div class="titulo">                          
                            Profesores <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="50"> Chile
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- contenido -->
        <section>
            <div class="container">
                <?php echo $content ?>
            </div>
        </section>
        <!-- /contenido -->

        <!-- footer -->
        <footer id="footer">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Servicios</h2>
                                <ul class="nav nav-pills nav-stacked">
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Profesores</h2>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Políticas de uso</h2>
                                <ul class="nav nav-pills nav-stacked">
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Acerca de Profesores Chile</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- /footer -->
        <!-- scripts  -->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

        <!-- bootstrap scripts -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/public/bootstrap/js/bootstrap.js"></script>
        <!-- /bootstrap scripts -->

        <!-- scripts -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/public/js/holder.js"></script>
        <!-- /scripts -->

        <!-- scripts -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/public/js/bootstrap-filestyle.min.js"></script>
        <!-- /scripts -->
    </body>
</html>
