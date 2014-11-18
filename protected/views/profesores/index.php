<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs = array(
    'Profesores',
);
?>
<div class="row">
    <?php if (!empty($model)): ?>
        <div class="features_items">
            <?php foreach ($model as $item): ?>
                <?php //$itemPersona = $item->personas ?>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?php if (!is_null($item->personas->foto)): ?>
                                    <?php echo CHtml::image(CController::createUrl('displaythumb') . '/' . $item->rut, '', array('class' => 'img-responsive')) ?>
                                <?php else: ?>
                                    <img src="holder.js/100%x200/text:Imagen no disponible" alt="" />
                                <?php endif ?>
                                <h2><?php echo $item->personas->usuario ?> </h2>
                                <?php
                                if ($item->vecesCalificado > 0) {
                                    $nota = round($item->totalCalificaciones / $item->vecesCalificado);
                                } else {
                                    $nota = 0;
                                }
                                ?>
                                <div class="stars">
                                    <ul class="text-center">
                                        <?php for ($i = 1; $i <= 7; $i++): ?>
                                            <?php if ($i <= $nota): ?>
                                                <li><i class="fa fa-star"></i></li>
                                            <?php else: ?>
                                                <li><i class="fa fa-star-o"></i></li>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </ul>
                                </div>
                                <span class="small-text">(<?php echo $item->vecesCalificado ?>) Veces Calificado</span>
                                <p><strong>Hago Clases de:</strong>
                                    <?php foreach ($item->profesoresconocimientos as $pConocimiento) : ?>
                                        <?php echo $pConocimiento->conocimientos->conocimiento . ', ' ?>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2><?php echo $item->personas->usuario ?></h2>
                                    <p><strong>Hago Clases de:</strong>
                                        <?php foreach ($item->profesoresconocimientos as $pConocimiento) : ?>
                                            <?php echo $pConocimiento->conocimientos->conocimiento . ', ' ?>
                                        <?php endforeach; ?>
                                    </p>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/profesores/perfil/' . $item->idProfesor ?>" class="btn btn-default button"><i class="fa fa-user"></i> Ver Perfil</a>
                                </div>
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


