<?php
/* @var $this PersonasController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="row">                 
    <!-- registro -->
    <section id="registro">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="formulario-registro">
                <h2>Paso 2. Datos de ubicación</h2>
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
                    <div class="form-group col-sm-8">
                        <?php echo $form->labelEx($model, 'direccion') ?>
                        <?php echo $form->textField($model, 'direccion', array('size' => 80, 'maxlength' => 80, 'class' => 'form-control', 'placeholder' => 'Dirección', 'required' => '')); ?>
                        <?php echo $form->error($model, 'direccion', array('class' => 'text-danger')); ?> 
                    </div>
                    <div class="form-group col-sm-4">
                        <?php echo $form->labelEx($model, 'ciudad') ?>
                        <?php echo $form->textField($model, 'ciudad', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Ciudad', 'required' => '')); ?>
                        <?php echo $form->error($model, 'ciudad', array('class' => 'text-danger')); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label('Región', 'idRegion'); ?>
                            <?php
                            echo CHtml::dropDownList('region', 'region', CHtml::listData(Regiones::model()->findAll(), 'idRegion', 'region'), array(
                                'class' => 'form-control',
                                'id' => 'idRegion',
                                'prompt' => 'Seleccione...',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => CController::createUrl('Personas/CargarProvincias'),
                                    'update' => '#provincias'
                                ),
                            ))
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label('Provincia', 'provincias'); ?>
                            <?php
                            echo CHtml::dropDownList('provincia', 'idProvincia', array(), array(
                                'class' => 'form-control',
                                'id' => 'provincias',
                                'prompt' => 'Seleccione...',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => CController::createUrl('personas/CargarComunas'),
                                    'update' => '#comunas'
                                )
                            ));
                            ?>                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'idComuna'); ?>
                            <?php echo $form->dropDownList($model, 'idComuna', array(), array('class' => 'form-control', 'prompt' => 'seleccione', 'id' => 'comunas', 'required' => '')) ?>
                            <?php echo $form->error($model, 'idComuna', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 pull-right">
                        <button type="submit" id="registroUsuario" class="btn btn-primary pull-right">Continuar al Paso 3 <i class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </section>
</div>