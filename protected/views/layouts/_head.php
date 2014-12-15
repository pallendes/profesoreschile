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
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="titulo">                          
                            Profesores <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="50"> Chile
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="navegacion-header">
                            <ul class="nav navbar-nav pull-right"> 
                                <?php if (Yii::app()->user->isGuest): ?>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl ?>/site/login"><i class="fa fa-user"></i> Ingresar</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl ?>/personas/registro"><i class="fa fa-lock"></i> Registrarme</a></li>
                                <?php else: ?>
                                    <li><a href="#"><i class="fa fa-user"></i>  ¡Hola! <strong><?php echo Yii::app()->user->usuario ?></strong></a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl ?>/site/logout"><i class="fa fa-power-off"></i>  Cerrar Sesión</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- navegacion -->
        <div id="navegacion">
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li <?php echo ($this->activeItem === 'home') ? 'class="active"' : '' ?>><a href="<?php echo Yii::app()->request->baseUrl ?>/">Home</a></li>
                                <li <?php echo ($this->activeItem === 'profesores') ? 'class="active"' : '' ?>><a href="<?php echo Yii::app()->request->baseUrl ?>/profesores">Profesores</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" id="searchForm" role="search" action="<?php echo Yii::app()->request->baseUrl . '/profesores/search' ?>" method="post">
                                <div class="form-group">
                                    <div class="input-group" id="searchBox">
                                        <input class="form-control" type="text" name="keyword" placeholder="Ingresa una palabra para buscar">                               
                                        <div class="input-group-addon">
                                            <a href="#" onclick="submitForm()"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        <!-- /navegacion -->
        <!-- /header -->
        <section>
            <div class="container">