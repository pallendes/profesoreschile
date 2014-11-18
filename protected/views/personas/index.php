<?php
/* @var $this PersonasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registro - Paso 1',
);

?>

<h1>Registro - Paso 1</h1>

<div class="row">
    <div class="col-md-8">
        <!-- mensaje -->
        <?php if (!is_null($this->mensaje)): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <?php echo $this->mensaje ?>
            </div>
        <?php endif; ?>
        <!-- /mensaje -->
        
        
    </div>
</div>
