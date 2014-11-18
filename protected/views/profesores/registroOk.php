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
                    <a href="<?php echo Yii::app()->request->baseUrl ?>/site/login" class="btn btn-default boton"><i class="fa fa-user"></i> Iniciar Sesión</a> 
                    <a href="<?php echo Yii::app()->request->baseUrl ?>/" class="btn btn-default boton"><i class="fa fa-home"></i> Ir al Home</a>
                </div>
            </div>
        </div>
    </div>
</div>