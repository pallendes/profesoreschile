<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'personas-form',
    'enableAjaxValidation' => true,
    'action' => Yii::app()->createUrl('profesores/updatepersonaldata', array('id' => $persona->profesor->idProfesor)),
        ));
CHtml::$errorContainerTag = 'p';
CHtml::$errorSummaryCss = 'alert alert-warning';
?>

<?php echo $form->errorSummary($persona, 'Se han detectado los siguientes errores:', '', array()); ?>

<div class="row">
    <div class="form-gorup">
        <div class="col-md-6">
            <?php echo $form->label($persona, "nombres"); ?>
            <?php echo $form->textField($persona, "nombres", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'nombres', array('class' => 'text-danger')); ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="form-gorup">
        <div class="col-md-6">
            <?php echo $form->label($persona, "paterno"); ?>
            <?php echo $form->textField($persona, "paterno", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'paterno', array('class' => 'text-danger')); ?> 
        </div>
        <div class="col-md-6">
            <?php echo $form->label($persona, "materno"); ?>
            <?php echo $form->textField($persona, "materno", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'materno', array('class' => 'text-danger')); ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="form-gorup">
        <div class="col-md-6">
            <?php echo $form->label($persona, "email"); ?>
            <?php echo $form->textField($persona, "email", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'email', array('class' => 'text-danger')); ?> 
        </div>
        <div class="col-md-6">
            <?php echo $form->label($persona, "celular"); ?>
            <?php echo $form->textField($persona, "celular", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'celular', array('class' => 'text-danger')); ?> 
        </div>
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
            <?php echo $form->labelEx($persona, 'idComuna'); ?>
            <?php echo $form->dropDownList($persona, 'idComuna', array(), array('class' => 'form-control', 'prompt' => 'seleccione', 'id' => 'comunas', 'required' => '')) ?>
            <?php echo $form->error($persona, 'idComuna', array('class' => 'text-danger')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-gorup">
        <div class="col-md-8">
            <?php echo $form->label($persona, "direccion"); ?>
            <?php echo $form->textField($persona, "direccion", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'direccion', array('class' => 'text-danger')); ?> 
        </div>
        <div class="col-md-4">
            <?php echo $form->label($persona, "ciudad"); ?>
            <?php echo $form->textField($persona, "ciudad", array("class" => "form-control")) ?>
            <?php echo $form->error($persona, 'ciudad', array('class' => 'text-danger')); ?> 
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="form-gorup">
        <div class="col-lg-12">
            <button class="btn btn-default boton" type="submit"><i class="fa fa-save"></i> Guardar Datos</button>
            <button class="btn btn-default boton" id="btnCancelar" type="button"><i class="fa fa-close"></i> Cancelar</button>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
