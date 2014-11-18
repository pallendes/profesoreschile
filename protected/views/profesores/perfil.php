<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs = array(
    'Profesores' => array('index'),
    $model->personas->usuario,
);
?>

<div class="row">
    <div class="col-sm-4"> 
        <?php if (!is_null($model->personas->foto)): ?>
            <?php echo CHtml::image(CController::createUrl('displaythumb') . '/' . $model->rut, '', array('class' => 'img-responsive', 'style' => 'height:250px;width:100%')) ?>
        <?php else: ?>
            <img src="holder.js/100%x250/text:Imagen no disponible" alt="" />
        <?php endif ?>
    </div>
    <div class="col-sm-8">
        <div class="informacion-perfil">
            <div class="titulo-perfil">Información del Perfil</div>
            <h2><?php echo $model->personas->usuario ?></h2>
            <div class="perfil-stars">
                <?php
                if ($model->vecesCalificado > 0) {
                    $nota = round($model->totalCalificaciones / $model->vecesCalificado);
                } else {
                    $nota = 0;
                }
                ?>
                <div class="stars">
                    <ul>
                        <?php
                        for ($i = 1; $i <= 7; $i++):
                            ?>
                            <?php if ($i <= $nota): ?>
                                <li><i class="fa fa-star"></i></li>
                            <?php else: ?>
                                <li><i class="fa fa-star-o"></i></li>
                            <?php endif ?>
                        <?php endfor ?>
                    </ul>
                </div>
            </div>
            <h4><small>(<?php echo $model->vecesCalificado ?>) Veces Calificado </small></h4>
            <span>
                <span>$4990</span> <small>x Hora</small>
                <button class="btn btn-default contratar"><i class="fa fa-usd"></i> Contratar</button>
            </span>
            <br>
            <strong>Disponibilidad Horaria: </strong><?php echo $model->disponibilidad ?>
        </div>
    </div>
</div>
<!--category-tab-->

<div class="row">
    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#materias" data-toggle="tab">Materias</a></li>
                <li><a href="#descripcion" data-toggle="tab">Descripción</a></li>
                <li class="active"><a href="#comentarios" data-toggle="tab">Comentarios (<?php echo sizeof($model->comentarios) ?>)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="materias" >
                <?php if (!is_null($model->profesoresconocimientos)): ?>
                    <div class="contenido-tab">
                        <strong>Hago Clases de: </strong>
                        <ol>
                            <?php foreach ($model->profesoresconocimientos as $pConocimiento): ?>
                                <li><?php echo $pConocimiento->conocimientos->conocimiento ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                <?php endif ?>
            </div>

            <div class="tab-pane fade" id="descripcion" >
                <p class="perfil-padding">
                    <?php echo $model->descripcion ?>
                    <br>
                    <strong>Ubicación: </strong>
                        <?php echo 'Región '.$model->personas->comuna->provincia->region->region ?>
                </p>
            </div>

            <div class="tab-pane fade active in" id="comentarios" >

                <!-- comentarios -->
                <?php $this->renderPartial('_comments', array('model' => $comentarios, 'pages' => $pages)) ?>
                <!-- /comentarios -->

                <p><b>Escribe tus comentarios</b></p>

                <?php if (!Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::beginForm(CController::createUrl('comentarios/nuevo')) ?>
                    <textarea name="comentario" required></textarea>
                    <input type="hidden" name="idProfesor" value="<?php echo $model->idProfesor ?>" >
                    <!-- <input type="hidden" name="usuario" value="<?php //echo $model->idProfesor      ?>" -->
                    <button type="submit" class="btn btn-default pull-right">
                        Enviar Comentario
                    </button>
                    <?php echo CHtml::endForm() ?> 
                <?php else: ?>
                    <a href="<?php echo Yii::app()->request->baseUrl.'/site/login' ?>" class="btn btn-default boton">
                        Logéate para comentar
                    </a>
                <?php endif ?>
            </div>

        </div>
    </div>
</div>
