<?php
/* @var $this PersonasController */
/* @var $model Personas */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'personas-form',
        'enableAjaxValidation' => false,
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>

    <p class="note">Campos con <strong>(*)</strong> son obligatorios.</p>

    <?php
    CHtml::$errorSummaryCss = 'alert alert-warning';
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>

    <div class="row">
        <div class="col-md-3" style="padding-bottom: 20px">
            <a href="#" class="thumbnail">
                <img src="holder.js/100%x150" alt="img" id="thumb">
            </a>
            <center>
                <?php echo $form->filefield($model, 'thumb', array('class' => 'filestyle', 'data-input' => 'false', 'data-buttonText' => '&nbsp Buscar imagen', 'data-buttonName' => 'btn-primary')) ?>
            </center>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'rut'); ?>
                        <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'rut'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'nombres'); ?>
                        <?php echo $form->textField($model, 'nombres', array('size' => 60, 'maxlength' => 60, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'nombres'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'paterno'); ?>
                        <?php echo $form->textField($model, 'paterno', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'paterno'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'materno'); ?>
                        <?php echo $form->textField($model, 'materno', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'materno'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'celular'); ?>
                <?php echo $form->textField($model, 'celular', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'celular'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-gorup">
                <?php echo $form->labelEx($model, 'celular2'); ?>
                <?php echo $form->textField($model, 'celular2', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'celular2'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
                <?php echo $form->textField($model, 'fechaNacimiento', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'fechaNacimiento'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-gorup">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php
                echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 30,
                    'class' => 'form-control',
                    'id' => 'idRegion',
                    'prompt' => 'Seleccione...',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Propiedades/CargarProvincias'),
                        'update' => '#provincias'
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-gorup">
                <?php echo $form->labelEx($model, 'sexo'); ?>
                <?php echo $form->dropDownList($model, 'sexo', array('' => 'Seleccione...', 'm' => 'Masculino', 'f' => 'Femenino', 'o' => 'Otro'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'idSexo'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'direccion'); ?>
                <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 80, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'direccion'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'ciudad'); ?>
                <?php echo $form->textField($model, 'ciudad', array('size' => 60, 'maxlength' => 80, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'ciudad'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-gorup">
                <?php echo CHtml::label('Región', 'region'); ?>
                <?php echo CHtml::dropDownList('region', '', array(), array('class' => 'form-control')) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-gorup">
                <?php echo CHtml::label('Provincia', 'provincia'); ?>
                <?php echo CHtml::dropDownList('provincia', '', array(), array('class' => 'form-control')) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-gorup">
                <?php echo $form->labelEx($model, 'idComuna'); ?>
                <?php echo $form->textField($model, 'idComuna', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'idComuna'); ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php if ($model->isNewRecord): ?>
                    <button type="submit" class="btn btn-primary">Registrarme e ir al paso 2 <i class="fa fa-angle-double-right"></i></button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary">Registrarme e ir al paso 2</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

    $(document).on('load', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                && location.hostname === this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({scrollTop: targetOffset}, 1000);
                return false;
            }
        }
    });

</script>