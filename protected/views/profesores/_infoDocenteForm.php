<?php
$form = $this->beginWidget('CActiveForm', array(
'action' => Yii::app()->createUrl('profesores/updateperfildocente', array('id' => $profesor->idProfesor)))
);
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->label($profesor, 'descripcion') ?>
            <?php echo $form->textArea($profesor, 'descripcion', array('class' => 'form-control')) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->label($profesor, 'disponibilidad') ?>
            <?php echo $form->textArea($profesor, 'disponibilidad', array('class' => 'form-control')) ?>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="form-gorup">
        <div class="col-lg-12">
            <button class="btn btn-default boton" type="submit"><i class="fa fa-save"></i> Guardar Datos</button>
            <button class="btn btn-default boton" id="btnHideInfoDocenteForm" type="button"><i class="fa fa-close"></i> Cancelar</button>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>



