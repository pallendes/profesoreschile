<?php
/* @var $this PersonasController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php if (Yii::app()->user->hasFlash('registroExitoso')): ?>
    <div class="row col-sm-8 col-sm-offset-2">
        <div class="registro-exitoso">
            <h2>¡Felicidades <?php echo Yii::app()->user->getFlash('registroExitoso'); ?>!</h2>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="200">
                </div>
                <div class="col-sm-9">
                    <p>
                        Ya estás registrado en el portal "Profesores Chile", te recomendamos iniciar sesión y completar tu perfil
                        antes de contratar clases particulares, o si prefieres, regresa al inicio para navegar en nuestra web. 
                    </p>
                    <div class="pull-right">
                        <a href="" class="btn btn-default boton"><i class="fa fa-user"></i> Iniciar Sesión</a> 
                        <a href="<?php echo Yii::app()->request->baseUrl ?>/" class="btn btn-default boton"><i class="fa fa-home"></i> Ir al Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
            <p><i class="fa fa-info-circle"></i> &nbsp;Si ya posees una cuenta de <span style="color:#e05f03">profesor</span> o de <span style="color:#e05f03">usuario</span> regístrate con otro rol aquí</p>
        </div>
    </div>
    <div class="row">                 
        <!-- registro -->
        <section id="registro">
            <div class="col-sm-5 col-sm-offset-1">
                <div class="formulario-registro">
                    <h3>Regístrate como usuario</h3>
                    <p><small>(*)Todos los campos son obligatorios</small></p>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'personas-form',
                        'enableAjaxValidation' => false,
                        'enableAjaxValidation' => true,
                        'htmlOptions' => array('enctype' => 'multipart/form-data')
                    ));
                    CHtml::$errorContainerTag = 'p';
                    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
                    ?>
                    
                    <input type="hidden" name="tipoRegistro" value="usuario">
                    
                    <div class="form-group">
                        <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control', 'placeholder' => 'Rut : ej. 12123123-1')); ?>
                        <?php echo $form->error($model, 'rut', array('class' => 'text-danger')); ?> 
                    </div>
                    <div class="form-group">
                        <?php echo $form->textField($model, 'nombres', array('size' => 60, 'maxlength' => 60, 'class' => 'form-control', 'placeholder' => 'Nombres')); ?>
                        <?php echo $form->error($model, 'nombres', array('class' => 'text-danger')); ?> 
                    </div>
                    <div class="form-group">                                       
                        <?php echo $form->textField($model, 'paterno', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Apellido Paterno')); ?>
                        <?php echo $form->error($model, 'paterno'); ?>  
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>                                      
                        </div>
                        <div class="form-group col-sm-6">
                            <?php echo $form->textField($model, 'usuario', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Nombre de Usuario')); ?>
                            <?php echo $form->error($model, 'usuario', array('class' => 'text-danger')); ?>                                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <?php echo $form->passwordField($model, 'pass', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                            <?php echo $form->error($model, 'pass', array('class' => 'text-danger')); ?>                                        
                        </div>
                        <div class="form-group col-sm-6">
                            <?php echo $form->passwordField($model, 'pass_repeat', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Confirma tu Contraseña')); ?>
                            <?php echo $form->error($model, 'pass_repeat', array('class' => 'text-danger')); ?>                                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <button type="button" id="registroUsuario" class="btn btn-primary">Registrarme como Usuario</button>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <small>(*) Al hacer click en "registrame" estás aceptando los <a href="">términos
                                        y condiciones</a>
                                </small>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-sm-1"> 
                <h2 class="registro-o">Ó</h2>
            </div>
            <div class="col-sm-5">
                <h3>¡Regístrate como profesor e imparte Clases Particulares!</h3>
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/icono.png" alt="icono" height="80">
                    </div>
                    <div class="col-sm-8">
                        <p>
                            Registrate como profesor y ofrece clases particulares, pare esto 
                            debes iniciar el proceso de registro ingresando tus datos y nosotros 
                            te guiarermos. Sólo tomará un par de minutos.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <a href="<?php echo CController::createUrl('Personas/Paso1') ?>" id="registroProfesor" class="btn btn-primary">Comenzar proceso de registro <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </section>
    </div>
<?php endif ?>

<script type="text/javascript">
    $('#registroProfesor').on('click', function(){
       $('input[name = tipoRegistro]') .val('profesor');
       $('#personas-form').submit();
    });
    $('#registroUsuario').on('click', function(){
       $('input[name = tipoRegistro]') .val('usuario');
       $('#personas-form').submit();
    });
</script>