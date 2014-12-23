<?php
/* @var $this ProfesoresController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="row">
    <div class="col-sm-12">
        <h2 class="color-text">Paso 3. Crea un perfil de profesor</h2>
    </div>
</div>
<hr>
<div class="row">                 
    <!-- registro -->
    <section id="registro">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'profesores-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
        CHtml::$errorContainerTag = 'p';
        //echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
        ?>
        <div class="col-sm-6">
            <div class="formulario-registro">
                <h3>Datos Profesor</h3>
                <p>Ingresa datos referentes de las clases que impartirás.</p>

                <input type="hidden" name="tipoRegistro" value="usuario">

                <div class="row">
                    <div class="form-group col-sm-6">
                        <?php echo $form->labelEx($model, 'tarifa') ?>
                        <?php echo $form->textField($model, 'tarifa', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control', 'placeholder' => 'Tarifa Horaria')); ?>
                        <?php echo $form->error($model, 'tarifa', array('class' => 'text-danger')); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo $form->labelEx($model, 'descripcion') ?>
                        <?php echo $form->textArea($model, 'descripcion', array('maxlength' => 500, 'class' => 'form-control', 'placeholder' => 'Describe tus capacidades y a ti mismo.')); ?>
                        <?php echo $form->error($model, 'descripcion', array('class' => 'text-danger')); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo $form->labelEx($model, 'disponibilidad') ?>
                        <?php echo $form->textArea($model, 'disponibilidad', array('maxlength' => 250, 'class' => 'form-control', 'placeholder' => 'Describe los horarios en los que puedes hacer tus clases.')); ?>
                        <?php echo $form->error($model, 'disponibilidad', array('class' => 'text-danger')); ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Materias</h3>
            <?php if (!is_null($this->mensaje)) : ?>
                <div class="row col-sm-12">
                    <div class="alert alert-danger">
                        <?php echo $this->mensaje ?>
                    </div>
                </div>
            <?php endif ?>
            <p>
                Selecciona las materias en las que estas capacitado para impartir clases particulares.
            </p>
            <div class="row">
                <div class="form-group col-sm-12">
                    <?php echo CHtml::label('Materias', 'materias') ?>
                    <?php
                    echo CHtml::dropDownList('materias', '', CHtml::listData(Categorias::model()->findAll(), 'idCategoria', 'categoria'), array(
                        'class' => 'form-control',
                        'prompt' => 'Seleccione...',
                        'id' => 'materias',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('Profesores/CargarConocimientos'),
                            'update' => '#conocimientos'
                        ),
                    ));
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-8">
                        <?php echo CHtml::label('Submateria', 'conocimientos') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-inline form-gorup">
                    <div class="col-sm-9">
                        <?php echo CHtml::dropDownList('conocimientos', '', array(), array('class' => 'form-control', 'prompt' => 'Seleccione...', 'style' => 'width:100%', 'id' => 'conocimientos')); ?>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-primary pull-right" id="btnAgregar"><i class="fa fa-plus"></i> Agregar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-sm-12"> 
                    <?php echo CHtml::label('Materias Seleccionadas', 'materia'); ?>
                </div>
            </div>
            <div class="row" id="materiasSeleccionadas">
                <?php if (isset($_POST['conocimientos']) && $_POST['conocimientos'] != ''): ?>
                    <?php foreach ($_POST['conocimientos'] as $dato) : ?>
                        <div class="col-md-4 item-materia" onclick="remover(this)">
                            <i class="fa fa-remove"></i>
                            <?php
                            $conocimiento = Conocimientos::model()->findByPk($dato);
                            echo $conocimiento->conocimiento;
                            ?>
                            <input type="hidden" name="conocimientos[]" value="<?php echo $dato ?>">
                        </div>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>
            <p></p>
            <div class="row form-group col-sm-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </section>
</div>

<script type="text/javascript">

    function remover(elem) {
        elem.remove();
    }

    $('#btnAgregar').on('click', function() {
        var div = $('<div onclick="remover(this)" class="col-sm-4  materias"><div class="item-materia"><i class="fa fa-remove"></i> '
                + $('#conocimientos').children('option').filter(':selected').text()
                + '</div></div>');

        var campo = $('<input>').attr('type', 'hidden')
                .attr('name', 'conocimientos[]')
                .val($('#conocimientos').children('option').filter(':selected').val());
        div.append(campo);

        $('#materiasSeleccionadas').append(div);
    });


</script>
