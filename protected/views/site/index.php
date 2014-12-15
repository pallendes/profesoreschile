<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<!-- index -->
<div class="row">            
    <div class="col-sm-12">
        <h2>Bienvenido al portal Profesores Chile</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
        </p>
    </div>
</div>
<hr>
<div class="row" id="servicios">
    <div class="col-sm-3">
        <div class="service-item">
            <a href="#" class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/buscar.jpg" alt="img" class="img-responsive">                                               
                <div class="caption">
                    <h5>Busca profesores</h5>
                    <small>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis faucibus tincidunt. 
                    </small>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="service-item">
            <a href="#" class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/ofrecer.jpg" style="height: 135px" alt="img" class="img-responsive">                                               
                <div class="caption">
                    <h5>Ofrece Clases</h5>
                    <small>
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis faucibus tincidunt. 
                    </small>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="service-item">
            <a href="#" class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/como_contratar.png"  style="height: 135px" alt="img" class="img-responsive">                                               
                <div class="caption">
                    <h5>Contrata Profesores</h5>
                    <small>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis faucibus tincidunt. 
                    </small>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="service-item">
            <a href="#" class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/public/img/registrate.png" style="height: 135px" alt="img" class="img-responsive">                                               
                <div class="caption">
                    <h5>Regístrate</h5>
                    <small>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis faucibus tincidunt. 
                    </small>
                </div>
            </a>
        </div>
    </div> 
</div>