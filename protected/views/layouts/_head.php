<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
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
        <link href="<?php //echo Yii::app()->request->baseUrl                                      ?>/public/css/font-awesome.min.css" rel="stylesheet">
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