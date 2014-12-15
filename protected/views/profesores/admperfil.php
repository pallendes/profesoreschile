<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */

$this->breadcrumbs = array(
    'Profesores' => array('index'),
    $model->personas->usuario,
);
?>

<div class="row">
    <div class="col-md-3">
        <div class="admperfil-sidebar border">
            <?php if (!is_null($model->personas->foto)): ?>
                <?php echo CHtml::image(CController::createUrl('displaythumb') . '/' . $model->rut, '', array('class' => 'img-responsive', 'style' => 'height:200px;width:100%')) ?>
            <?php else: ?>
                <img src="holder.js/100%x250/text:Imagen no disponible" alt="" />
            <?php endif; ?>
            <h2><?php echo $model->personas->nombres . ' ' . $model->personas->paterno ?></h2>
            <h2><small><?php echo $model->personas->usuario ?></small></h2>           
            <?php
            if ($model->vecesCalificado > 0) {
                $nota = round($model->totalCalificaciones / $model->vecesCalificado);
            } else {
                $nota = 0;
            }
            ?>
            <label>Calificación: </label> <?php echo $nota ?> (de 7)
            <hr>
            <i class="fa fa-map-marker"></i> &nbsp;Región <?php echo $model->personas->comuna->provincia->region->region ?>
            <br >
            <i class="fa fa-envelope-o"></i> &nbsp;<?php echo $model->personas->email ?> 
            <br>
            <i class="fa fa-clock-o"></i> &nbsp; Registrado el <?php echo $model->personas->registro ?>
            <hr>
            <br>
            <label>Estado Cuenta: </label> <?php echo $model->estadocuenta->estado ?>
        </div>
    </div>
    <div class="col-md-9">
        <!-- Mensajes -->
        <?php if (Yii::app()->user->hasFlash('porcCompletado')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-info"></i> <?php echo Yii::app()->user->getFlash('porcCompletado') ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('admPerfil')): ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-info"></i> <?php echo Yii::app()->user->getFlash('admPerfil') ?>
            </div>
        <?php endif; ?>
        <!-- Tabs -->
        <div class="admperfil-category-tab admperfil-detail-tabs">
            <ul class="nav nav-tabs" id="tabs-nav">
                <li class="active"><a href="#datospersonales" data-toggle="tab">Información Del Perfil</a></li>
                <li><a href="#informacionDocente" data-toggle="tab">Información Docente</a></li>
                <li><a href="#materias" data-toggle="tab">Materias</a></li>
                <li><a href="#notificaciones" data-toggle="tab">Notificaciones (<?php echo sizeof($model->comentarios) ?>)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="datospersonales">
                    <p></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">Información Personal</div>
                        <!-- informacion Personal -->
                        <div class="panel-body" id="informacionPersonal">
                            <strong>Rut: </strong><?php echo $model->rut ?>
                            <br>
                            <strong>Nombre Completo: </strong> <?php echo $model->personas->nombres . ' ' . $model->personas->paterno . ' ' . $model->personas->materno ?>
                            <br>
                            <strong>Nombre de Usuario: </strong><?php echo $model->personas->usuario ?>
                            <br>
                            <strong>Edad: </strong><?php echo 'Edad' ?>
                            <br>
                            <strong>Sexo: </strong> <?php echo 'Masculino' ?>
                            <br>
                            <strong>Email: </strong> <?php echo $model->personas->email ?>
                            <br>
                            <strong>Celular: </strong> <?php echo $model->personas->celular ?>
                            <br>
                            <strong>Dirección: </strong> <?php echo $model->personas->direccion ?>
                            <br>
                            <strong>Comuna: </strong> <?php echo $model->personas->comuna->comuna ?>
                            <br>
                            <br>
                            <a href="#" class="btn btn-default boton" id="showForm"><i class="fa fa-pencil"></i> Editar mis Datos</a>
                        </div>

                        <!-- informacion personal editable -->
                        <div class="panel-body" id="editarDatos">
                            <?php $this->renderPartial('_personalInfoForm', array('persona' => $persona)); ?>
                        </div>

                    </div>
                </div>
                <!-- tab informacion docente -->
                <div class="tab-pane fade" id="informacionDocente" >
                    <p></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">Perfil Profesional</div>
                        <!-- informacion docente solo lectura -->
                        <div class="panel-body" id="infoDocenteRead">
                            <label>Autodescripción</label>
                            <p>
                                <?php echo $model->descripcion ?>
                            </p>
                            <label>Disponibilidad horaria</label>
                            <p>
                                <?php echo $model->disponibilidad ?>
                            </p>
                            <a href="#" class="btn btn-default boton" id="btnShowInfoDocenteForm"><i class="fa fa-pencil"></i> Editar mis Datos</a>
                        </div>

                        <!-- informacion docente editable -->
                        <div class="panel-body" id="infoDocenteWrite">
                            <?php $this->renderPartial('_infoDocenteForm', array('profesor' => $model)); ?>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="materias"></div>
                <div class="tab-pane fade" id="notificaciones"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var get = getGET();

    $(document).ready(function() {

        switch (get['tab']) {
            case 'informacionpersonal':
                $('#tabs-nav a[href="#datospersonales"]').tab('show');
            case 'informaciondocente':
                $('#tabs-nav a[href="#informacionDocente"]').tab('show');
            default :
                $('#myTab a[href="#profile"]').tab('show');
        }

        if (get['mode'] === 'read') {
            $('#informacionPersonal').show();
            $('#editarDatos').hide();
            $("#infoDocenteRead").show();
            $("#infoDocenteWrite").hide();
        }

    });

    /*
     * informacion personal
     */
    $("#showForm").click(function() {
        $("#informacionPersonal").hide("slow");
        $("#editarDatos").show("slow");
    });

    $("#btnCancelar").click(function() {
        $("#editarDatos").hide("slow");
        $("#informacionPersonal").show("slow");
    });
    
    /*
     * informacion docente
     */
    $("#btnShowInfoDocenteForm").click(function() {
        $("#infoDocenteRead").hide('slow');
        $("#infoDocenteWrite").show('slow');
    });
    
    $("#btnHideInfoDocenteForm").click(function() {
        $("#infoDocenteRead").show('slow');
        $("#infoDocenteWrite").hide('slow');
    });

    function getGET() {
        var loc = document.location.href;
        var getString = loc.split('?')[1];
        var GET = getString.split('&');
        var get = {};

        for (var i = 0, l = GET.length; i < l; i++) {
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
    }

</script>
