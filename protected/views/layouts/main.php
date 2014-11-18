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
        <link href="<?php //echo Yii::app()->request->baseUrl                                       ?>/public/css/font-awesome.min.css" rel="stylesheet">
        <!-- /font awesome -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>

        <!-- header -->
        <!-- topheader -->
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
        <!-- /topheader -->

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

        <!-- carrousel -->
        <?php if (Yii::app()->controller->route === 'site/index'): ?>
            <div class="container">
                <div class="row">                 
                    <div id="divCarrusel" class="col-md-12">
                        <!-- carousel -->
                        <div id="carruselPrincipal" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carruselPrincipal" data-slide-to="0" class="active"></li>
                                <li data-target="#carruselPrincipal" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/fondo-buscador.jpg" style="height: 350px;width: 100%" alt="imagen2">
                                    <div class="carousel-caption">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dictum viverra. Nulla dignissim egestas dolor, sit amet bibendum sapien egestas ac. Morbi molestie mauris laoreet libero eleifend dictum. Nullam vel velit id lacus sollicitudin ultricies sed sed nunc.
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/form-bg-3.jpg" style="height: 350px;width: 100%" alt="imagen2">
                                    <div class="carousel-caption">
                                        Quisque ut urna congue, dapibus lacus ut, bibendum tortor. Cras elit massa, ullamcorper a nisi sit amet, pulvinar hendrerit orci. Praesent gravida id tellus vitae mollis. 
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carruselPrincipal" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carruselPrincipal" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>                 
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- carousel -->

        <!-- contenido -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div id="sidebar">
                            <h2>Categorías</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <?php
                                $categorias = Categorias::model()->findAll();
                                ?>
                                <?php foreach ($categorias as $categoria): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <?php if (!empty($categoria->conocimientos)): ?>
                                                    <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo 'id' . $categoria->categoria ?>">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/profesores/find/' . $categoria->idCategoria . '?tipo=categoria' ?>">
                                                            <?php echo $categoria->categoria ?>
                                                        </a>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="<?php echo Yii::app()->request->baseUrl . '/profesores/find/' . $categoria->idCategoria . '?tipo=categoria' ?>">
                                                        <?php echo $categoria->categoria ?>
                                                    </a>
                                                <?php endif ?>
                                            </h4>
                                        </div>
                                        <div id="<?php echo 'id' . $categoria->categoria ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    <?php foreach ($categoria->conocimientos as $conocimiento): ?>
                                                        <li>
                                                            <a href="<?php echo Yii::app()->request->baseUrl . '/profesores/find/' . $conocimiento->idConocimiento . '?tipo=subcategoria' ?>">
                                                                <?php echo $conocimiento->conocimiento ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!--/category-products-->
                            </div>
                            <div id="sidebar">
                                <h2>Ubicación</h2>
                                <?php echo CHtml::beginForm(CController::createUrl('profesores/index'), 'POST') ?>
                                <div class="panel-group category-products" id="accordian">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <?php if ($this->extras): ?>
                                                <input type="hidden" name="tipo" value="<?php echo $this->extras['tipo'] ?>">
                                                <input type="hidden" name="id" value="<?php echo $this->extras['id'] ?>">
                                            <?php endif ?>
                                            <div class="form-group">
                                                <?php
                                                echo CHtml::dropDownList('region', 'region', CHtml::listData(Regiones::model()->findAll(), 'idRegion', 'region'), array(
                                                    'class' => 'form-control',
                                                    'id' => 'idRegion',
                                                    'prompt' => 'Región',
                                                    'ajax' => array(
                                                        'type' => 'POST',
                                                        'url' => CController::createUrl('personas/CargarProvincias'),
                                                        'update' => '#provincias'
                                                    ),
                                                ))
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                echo CHtml::dropDownList('provincia', 'id', array(), array(
                                                    'class' => 'form-control',
                                                    'id' => 'provincias',
                                                    'prompt' => 'Provincia',
                                                    'ajax' => array(
                                                        'type' => 'POST',
                                                        'url' => CController::createUrl('personas/CargarComunas'),
                                                        'update' => '#comunas'
                                                    )
                                                ));
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php echo CHtml::dropDownList('comuna', 'id', array(), array('class' => 'form-control', 'prompt' => 'Comuna', 'id' => 'comunas')) ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default boton pull-right"><i class="fa fa-search"></i> Filtrar Resultados</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo CHtml::endForm() ?>
                            </div>
                        </div>
                        <!--/category-products-->
                    </div>
                    <!-- Contenido -->
                    <div class="col-sm-9">
                        <!-- Breadcrumbs -->
                        <?php
                        if (Yii::app()->controller->route !== 'site/index') {

                            $this->breadcrumbs = array_merge(array(Yii::t('zii', 'Home') =>
                                Yii::app()->homeUrl), $this->breadcrumbs);

                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                                'htmlOptions' => array('class' => 'breadcrumb'),
                            ));
                        }
                        ?>
                        <!-- Fin Breadcrumbs -->

                        <?php if (Yii::app()->user->hasFlash('mensajeGlobal')): ?>
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                </button>
                                <?php echo Yii::app()->user->getFlash('mensajeGlobal') ?>
                            </div>
                        <?php endif; ?>

                        <?php echo $content ?>
                    </div>
                    <!-- /profesores -->
                </div>
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
        <script type="text/javascript">

                                                function submitForm() {
                                                    $('#searchForm').submit();
                                                }

        </script>
        <!-- /scripts -->
    </body>
</html>
