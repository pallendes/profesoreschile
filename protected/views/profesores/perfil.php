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
            <h3><?php echo $model->personas->usuario ?></h3>
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
            <h5><small>(<?php echo $model->vecesCalificado ?>) Veces Calificado </small></h5>
            <div class="informacion-perfil-contratar">
                <span>$<?php echo $model->tarifa ?></span> <small> x Hora</small>&nbsp;
                <button class="btn btn-primary"><i class="fa fa-usd"></i> Contratar</button>
            </div>
            <br>
            <strong>Disponibilidad Horaria: </strong><?php echo $model->disponibilidad ?>
        </div>
    </div>
</div>
<!--category-tab-->

<div class="row">
    <div class="col-sm-12">
        <div role="tabpanel" class="informacion-perfil-tabs">

            <!-- nav-tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#materias" data-toggle="tab">Materias</a></li>
                <li><a href="#descripcion" data-toggle="tab">Descripción</a></li>
                <li class="active"><a href="#comentarios" data-toggle="tab">Comentarios (<?php echo sizeof($model->comentarios) ?>)</a></li>
            </ul>
            <!-- nav-tabs -->

            <div class="tab-content">
                <div class="tab-pane fade" id="materias" >
                    <div class="perfil-tab-content">
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
                </div>

                <div class="tab-pane fade" id="descripcion" >
                    <div class="perfil-tab-content">
                        <p class="perfil-padding">
                            <?php echo $model->descripcion ?>
                            <br>
                            <strong>Ubicación: </strong>
                            <?php echo 'Región ' . $model->personas->comuna->provincia->region->region ?>
                        </p>
                    </div>
                </div>

                <div class="tab-pane fade active in" id="comentarios" >
                    <div class="perfil-tab-content">
                        <!-- comentarios -->
                        <?php $this->renderPartial('_comments', array('model' => $comentarios, 'pages' => $pages)) ?>
                        <!-- /comentarios -->

                        <p><b>Escribe tus comentarios</b></p>

                        <?php if (!Yii::app()->user->isGuest): ?>
                            <?php echo CHtml::beginForm(CController::createUrl('comentarios/nuevo')) ?>
                            <textarea name="comentario" required class="form-control"></textarea>
                            <input type="hidden" name="idProfesor" value="<?php echo $model->idProfesor ?>" >
                            <!-- <input type="hidden" name="usuario" value="<?php //echo $model->idProfesor            ?>" -->
                            <button type="submit" class="btn btn-primary pull-right">
                                Enviar Comentario
                            </button>
                            <?php echo CHtml::endForm() ?> 
                        <?php else: ?>
                            <a href="<?php echo Yii::app()->request->baseUrl . '/site/login' ?>" class="btn btn-primary">
                                Logéate para comentar
                            </a>
                        <?php endif ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
