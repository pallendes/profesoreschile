<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profesores-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tarifa'); ?>
		<?php echo $form->textField($model,'tarifa'); ?>
		<?php echo $form->error($model,'tarifa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponibilidad'); ?>
		<?php echo $form->textField($model,'disponibilidad',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'disponibilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vecesCalificado'); ?>
		<?php echo $form->textField($model,'vecesCalificado'); ?>
		<?php echo $form->error($model,'vecesCalificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalCalificaciones'); ?>
		<?php echo $form->textField($model,'totalCalificaciones'); ?>
		<?php echo $form->error($model,'totalCalificaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastUpdate'); ?>
		<?php echo $form->textField($model,'lastUpdate'); ?>
		<?php echo $form->error($model,'lastUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idEstadoCuenta'); ?>
		<?php echo $form->textField($model,'idEstadoCuenta'); ?>
		<?php echo $form->error($model,'idEstadoCuenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->