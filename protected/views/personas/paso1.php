<?php
/* @var $this PersonasController */
/* @var $dataProvider CActiveDataProvider */
?>

<div class="row">                 
    <!-- registro -->
    <section id="registro">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="formulario-registro">
                <h3>Paso 1. Completa tus datos personales</h3>
                <p><small>(*)Todos los campos son obligatorios</small></p>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'personas-form',
                    'enableAjaxValidation' => true,
                    'htmlOptions' => array('enctype' => 'multipart/form-data')
                ));
                CHtml::$errorContainerTag = 'p';
                //echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
                ?>

                <input type="hidden" name="tipoRegistro" value="usuario">

                <div class="row">
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'rut') ?>
                        <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control', 'placeholder' => 'Rut : ej. 12123123-1')); ?>
                        <?php echo $form->error($model, 'rut', array('class' => 'text-danger')); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'nombres') ?>
                        <?php echo $form->textField($model, 'nombres', array('size' => 60, 'maxlength' => 60, 'class' => 'form-control', 'placeholder' => 'Nombres')); ?>
                        <?php echo $form->error($model, 'nombres', array('class' => 'text-danger')); ?> 
                    </div>
                    <div class="form-group col-sm-6">    
                        <?php echo $form->labelEx($model, 'paterno') ?>
                        <?php echo $form->textField($model, 'paterno', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Apellido Paterno')); ?>
                        <?php echo $form->error($model, 'paterno', array('class' => 'text-danger')); ?>  
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'email') ?>
                        <?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
                        <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>                                      
                    </div>
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'celular') ?>
                        <?php echo $form->textField($model, 'celular', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Celular')); ?>
                        <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>                                         
                    </div>
                </div>
                <div class="row">                   
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'usuario') ?>
                        <?php echo $form->textField($model, 'usuario', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Nombre de Usuario')); ?>
                        <?php echo $form->error($model, 'usuario', array('class' => 'text-danger')); ?>                                         
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'pass') ?>
                        <?php echo $form->passwordField($model, 'pass', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                        <?php echo $form->error($model, 'pass', array('class' => 'text-danger')); ?>                                        
                    </div>
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'pass_repeat') ?>
                        <?php echo $form->passwordField($model, 'pass_repeat', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Confirma tu Contraseña')); ?>
                        <?php echo $form->error($model, 'pass_repeat', array('class' => 'text-danger')); ?>                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 pull-right">
                        <button type="submit" id="registroUsuario" class="btn btn-primary pull-right">Continuar al Paso 2 <i class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
                <div class="row">                  
                    <div class="form-group col-sm-12">
                        <small>(*) Al hacer click en "registrame" estás aceptando los <a href="">términos
                                y condiciones</a>
                        </small>
                    </div> 
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </section>
</div>
