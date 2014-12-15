<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs = array(
    'Profesores',
);
?>

<div class="row">
    <?php if (!empty($model)): ?>
        <div id="profesores-items">
            <?php foreach ($model as $item): ?>
                <div class="col-sm-3">
                    <div class="panel panel-default item">
                        <div class="item-content">
                            <div class="panel-body">
                                <?php if (!is_null($item->personas->foto)): ?>
                                    <?php echo CHtml::image(CController::createUrl('displaythumb') . '/' . $item->rut, '', array('class' => 'img-responsive imagen-perfil')) ?>
                                <?php else: ?>
                                    <img src="holder.js/100%x200/text:Imagen no disponible" alt="" />
                                <?php endif ?>
                            </div>
                            <div class="panel-footer">
                                <div class="contenido-item">
                                    <h4><?php echo $item->personas->usuario ?> </h4>
                                    <?php
                                    if ($item->vecesCalificado > 0) {
                                        $nota = round($item->totalCalificaciones / $item->vecesCalificado);
                                    } else {
                                        $nota = 0;
                                    }
                                    ?>
                                    <ul class="stars">
                                        <?php for ($i = 1; $i <= 7; $i++): ?>
                                            <?php if ($i <= $nota): ?>
                                                <li><i class="fa fa-star"></i></li>
                                            <?php else: ?>
                                                <li><i class="fa fa-star-o"></i></li>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </ul>
                                    <p class="center-align">
                                        <small>(<?php echo $item->vecesCalificado ?>) Veces Calificado</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item-overlay">
                            <div class="item-overlay-content">
                                <h4><?php echo $item->personas->usuario ?></h4>
                                <p>
                                    <strong>Hago Clases de:</strong>
                                    <?php foreach ($item->profesoresconocimientos as $pConocimiento) : ?>
                                        <?php echo $pConocimiento->conocimientos->conocimiento . ', ' ?>
                                    <?php endforeach; ?>
                                </p>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/profesores/perfil/' . $item->idProfesor ?>" class="btn btn-default item-overlay-button"><i class="fa fa-user"></i> Ver Perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="col-sm-12">
            <h3>No hay resultados que concuerden con el criterio de búsqueda.</h3>
        </div>
    <?php endif ?>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
            'header' => '',
            'selectedPageCssClass' => 'active',
            'hiddenPageCssClass' => 'disabled',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'htmlOptions' => array(
                'class' => 'pagination',
            )
        ))
        ?>
    </div>
</div>


