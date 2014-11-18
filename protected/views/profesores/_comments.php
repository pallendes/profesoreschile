<?php
/* @var $this ComentariosController */
/* @var $model Comentarios */
?>
<div class="col-sm-12">
    <?php if (Yii::app()->user->hasFlash('resultado')): ?>
        <div class="row col-sm-12">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <?php echo Yii::app()->user->getFlash('resultado'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!is_null($model) && !empty($model)): ?>
        <div id="comments">
            <?php foreach ($model as $comentario): ?>
                <div class="un-comentario">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i><?php echo $comentario->persona->usuario ?></a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i><?php echo date('H:m:i A', strtotime($comentario->fechaComentario)) ?></a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i><?php echo date('d M Y', strtotime($comentario->fechaComentario)) ?></a></li>
                    </ul>
                    <p>
                        <?php echo $comentario->comentario ?>
                    </p>
                    <?php if ($comentario->respuesta): ?>
                        <div class="respuesta">
                            <i class="fa fa-user"></i>
                            <strong> <?php echo $comentario->profesor->personas->usuario ?>: </strong>
                            <?php echo $comentario->respuesta ?>
                            <small>
                                <i class="fa fa-clock-o"></i><?php echo date('H:m:i A', strtotime($comentario->fechaComentario)) ?>, &nbsp;<i class="fa fa-calendar-o"></i> <?php echo date('d M Y', strtotime($comentario->fechaComentario)) ?>4
                            </small>
                        </div>
                    <?php endif ?>
                    <hr>
                </div>
            <?php endforeach; ?>
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
        </div>
    <?php endif ?>
</div>


