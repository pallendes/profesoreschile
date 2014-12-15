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

        <!-- font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- /font awesome -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <!-- main header -->
        <header id="main-header">
            <div id="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-6" style="text-align: right">                        
                            Conéctate con nosotros
                        </div>
                        <div class="col-md-2 socialIcons pull-right">      
                            <ul class="pull-right">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contenido-login">
                <!-- contenido -->
                <section id="login">
                    <div class="container">
                        <?php echo $content ?>
                    </div>
                </section>
                <!-- /contenido -->
            </div>

            <!-- footer -->
            <footer id="main-footer">
                <div class="container">
                    
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

