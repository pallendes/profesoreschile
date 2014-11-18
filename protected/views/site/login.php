<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="row" id="login">               

    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="titulo">                          
                        Profesores <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="50"> Chile
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- registro -->
    <section>
        <div class="col-sm-5 col-sm-offset-1 border-line">
            <div class="formulario-registro">
                <h2>Inicio Sesión</h2>

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                CHtml::$errorContainerTag = 'p';
                //echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
                ?>

                <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

                <div class="form-gorup">
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-gorup">
                    <?php echo $form->radioButtonList($model, 'option', array('usuario' => 'Acceder como usuario', 'profesor' => 'Acceder como profesor'), array('labelOptions' => array('class' => 'radio-inline')))
                    ?>
                    <?php echo $form->error($model, 'option', array('class' => 'text-danger')); ?>
                </div>
                <br>
                <!--
                <div class="form-gorup">
                    <?php //echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php //echo $form->label($model, 'rememberMe'); ?>
                    <?php //echo $form->error($model, 'rememberMe'); ?>
                </div>
                -->
                <div class="form-gorup">
                    <?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-default boton')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
        <div class="col-sm-5">
            <h2>¿No tienes una cuenta aún?</h2>
            <div class="row">
                <div class="col-sm-2">
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="80">
                </div>
                <div class="col-sm-8">
                    <p>
                        Regístrate en nuestro sitio para poder contratar profesores o si prefieres, regístrate
                        como profesor y ofrece tus conocimientos a través de nuestra página.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <a href="<?php echo CController::createUrl('Personas/registro') ?>" id="registroProfesor" class="btn btn-default boton">Llévame al registro <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
