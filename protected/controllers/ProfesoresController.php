action<?php

class ProfesoresController extends Controller {

    public $mensaje;
    public $activeItem = 'profesores';
    const TOTAL_CAMPOS_PERSONAS = 17;
    const TOTAL_CAMPOS_PROFESORES = 9;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'DisplayThumb', 'paso3', 'cargarconocimientos',
                    'perfil', 'find', 'nuevocomentario', 'search', 'admPerfil', 'updatepersonaldata', 'UpdatePerfilDocente'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSearch() {

        $criteria = new CDbCriteria();
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $criteria->with = array('personas');
            $criteria->compare('personas.Nombres', $keyword, true, 'OR');
            $criteria->compare('personas.Paterno', $keyword, true, 'OR');
            $criteria->compare('personas.Materno', $keyword, true, 'OR');
            $criteria->compare('personas.Ciudad', $keyword, true, 'OR');
            $criteria->compare('personas.usuario', $keyword, true, 'OR');
            $criteria->compare('personas.direccion', $keyword, true, 'OR');
            $criteria->order = '(totalCalificaciones/vecescalificado) DESC';
            $criteria->distinct = true;
            if ($keyword !== '')
                Yii::app()->user->setFlash('mensajeGlobal', 'Mostrando resultados que coincidan con la palabra "' . $keyword . '"');
        }

        $count = Profesores::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 8;
        $pages->applyLimit($criteria);
        $model = Profesores::model()->findAll($criteria);

        $this->render('index', array(
            'model' => $model,
            'pages' => $pages,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionPerfil($id) {

        $model = $this->loadModel($id);
        $criterio = new CDbCriteria();

        $criterio->compare('idProfesor', $model->idProfesor);
        $criterio->order = 'fechaComentario DESC';

        $count = Comentarios::model()->count($criterio);
        $pages = new CPagination($count);
        $pages->pageSize = 4;
        $pages->applyLimit($criterio);

        $comentarios = Comentarios::model()->findAll($criterio);

        $this->render('perfil', array(
            'model' => $model,
            'comentarios' => $comentarios,
            'pages' => $pages
        ));
    }

    /*
     * Muestra la vista de administracion del perfil
     */
    public function actionAdmPerfil($id) {
        $this->layout = '//layouts/admPerfil';

        $model = $this->loadModel($id);
        $persona = Personas::model()->findByPk($model->rut); 
       
        Yii::app()->user->setFlash('porcCompletado',
                'Tienes un '.$this->porcPerfilCompletado(sizeof($persona->getAttributes()), sizeof($model->getAttributes())).'% de tu perfil Completado.');
        $this->render('admperfil', array('model' => $model, 'persona' => $persona));
        
    }
    
    /*
     * Actualiza los datos en el modelo Profesores
     */
    public function actionUpdatePerfilDocente($id){
        $this->layout = '//layouts/admPerfil';
        
        $model = $this->loadModel($id);
        
        if(isset($_POST['Profesores'])){
            $model->attributes = $_POST['Profesores'];
            if($model->save(false)){
                Yii::app()->user->setFlash('admPerfil', 'Los cambios de tu información personal han sido almacenados.');
                $this->redirect(array('admPerfil', 'id' => $id));
            }
        }
    }

    /*
     * Actualiza los datos en el modelo Personas puesto que el dicha tabla residen 
     * los datos personales del profesor
     */
    public function actionUpdatePersonalData($id) {
        $this->layout = '//layouts/admPerfil';

        $model = $this->loadModel($id);
        $personaModel = Personas::model()->findByPk($model->rut);

        $this->performAjaxValidation($personaModel);

        if (isset($_POST['Personas'])) {
            $personaModel->attributes = $_POST['Personas'];
            if ($personaModel->save()) {
                Yii::app()->user->setFlash('admPerfil', 'Los cambios de tu información personal han sido almacenados.');
                $this->redirect(array('admPerfil', 'id' => $id));
            }
        }

        $this->render('admperfil', array('model' => $model, 'persona' => $personaModel));
    }

    public function actionPaso3($id) {

        $this->layout = '//layouts/registro';
        $model = Profesores::model()->findByAttributes(array('rut' => $id));

        $this->performAjaxValidation($model);

        if (isset($_POST['Profesores'])) {
            $model->attributes = $_POST['Profesores'];
            $model->rut = $id;
            $model->idEstadoCuenta = 1;

            $saved = false;

            if ($model->save()) {
                $saved = true;
            }

            if (isset($_POST['conocimientos']) && $_POST['conocimientos'] != '') {
                foreach ($_POST['conocimientos'] as $conocimiento) {
                    $profesoresconocimientos = new Profesoresconocimientos;
                    $profesoresconocimientos->idProfesor = $model->idProfesor;
                    $profesoresconocimientos->idConocimiento = $conocimiento;
                    $profesoresconocimientos->save();
                }
                $saved = true;
            } else {
                $this->mensaje = 'Debe seleccionar al menos una materia.';
                $saved = false;
            }

            if ($saved) {
                $this->render('registroOk');
            }
        }

        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }

        $this->render('paso3', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionFind($id) {

        $criterio = new CDbCriteria();

        if (isset($_GET['tipo']) && $_GET['tipo'] === 'categoria') {
            $item = Categorias::model()->findByPk($id);
            Yii::app()->user->setFlash('mensajeGlobal', 'Mostrando profesores hagan clases de "' . $item->categoria . '"');
            $criterio->with = array('profesoresconocimientos.conocimientos.categoria');
            $criterio->compare('categoria.idCategoria', $id);
        } else if (isset($_GET['tipo']) && $_GET['tipo'] === 'subcategoria') {
            $item = Conocimientos::model()->findByPk($id);
            Yii::app()->user->setFlash('mensajeGlobal', 'Mostrando profesores hagan clases de "' . $item->conocimiento . '"');
            $criterio->with = array('profesoresconocimientos.conocimientos');
            $criterio->compare('conocimientos.idConocimiento', $id);
        }

        $this->extras = array('tipo' => $_GET['tipo'], 'id' => $id);
        $criterio->order = '(totalCalificaciones/vecescalificado) DESC';

        $count = Profesores::model()->count($criterio);
        $pages = new CPagination($count);
        $pages->pageSize = 8;
        $pages->applyLimit($criterio);
        $criterio->together = true;
        $model = Profesores::model()->findAll($criterio);

        $this->render('index', array(
            'model' => $model,
            'pages' => $pages,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $criterio = new CDbCriteria();
        $mensaje = null;
        $with = array();

        if (isset($_POST['comuna']) && !empty($_POST['comuna'])) {
            $comuna = Comunas::model()->findByPk($_POST['comuna']);
            $mensaje = 'Mostrando profesores en la comuna de "' . $comuna->comuna . '"';
            $with = $this->filterLocation('comuna', $_POST['comuna']);
            $criterio->compare('comuna.idComuna', $_POST['comuna']);
        } else if (isset($_POST['provincia']) && !empty($_POST['provincia'])) {
            $provincia = Provincias::model()->findByPk($_POST['provincia']);
            $mensaje = 'Mostrando profesores en la provincia de "' . $provincia->provincia . '"';
            $with = $this->filterLocation('provincia', $_POST['provincia']);
            $criterio->compare('provincia.idProvincia', $_POST['provincia']);
        } else if (isset($_POST['region']) && !empty($_POST['region'])) {
            $region = Regiones::model()->findByPk($_POST['region']);
            $mensaje = 'Mostrando profesores en la Región "' . $region->region . '"';
            $with = $this->filterLocation('region', $_POST['region']);
            $criterio->compare('region.idRegion', $_POST['region']);
        }

        if (isset($_POST['tipo']) && $_POST['tipo'] === 'categoria') {
            $item = Categorias::model()->findByPk($_POST['id']);
            $mensaje .= ' que hagan clases de "' . $item->categoria . '"';
            $criterio->with = array_merge($with, $this->filterCategory('categoria', $_POST['id']));
            $criterio->compare('categoria.idCategoria', $_POST['id']);
        } else if (isset($_POST['tipo']) && $_POST['tipo'] === 'subcategoria') {
            $item = Conocimientos::model()->findByPk($_POST['id']);
            $mensaje .= ' que hagan clases de "' . $item->conocimiento . '"';
            $criterio->with = array_merge($with, $this->filterCategory('subcategoria', $_POST['id']));
            $criterio->compare('conocimientos.idConocimiento', $_POST['id']);
        } else {
            $criterio->with = $with;
        }

        $criterio->together = true;
        $criterio->distinct = true;
        $criterio->order = '(totalCalificaciones/vecescalificado) DESC';

        if ($mensaje) {
            Yii::app()->user->setFlash('mensajeGlobal', $mensaje);
        }

        $count = Profesores::model()->count($criterio);
        $pages = new CPagination($count);
        $pages->pageSize = 8;
        $pages->applyLimit($criterio);

        $model = Profesores::model()->findAll($criterio);

        $this->render('index', array(
            'model' => $model,
            'pages' => $pages
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Profesores the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Profesores::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La página solicitada no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Profesores $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax'])) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCargarConocimientos() {
        $data = Conocimientos::model()->findAll('idCategoria=:idCategoria', array(':idCategoria' => $_POST['materias']));

        $data = CHtml::listData($data, 'idConocimiento', 'conocimiento');

        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    private function filterLocation($type) {
        switch ($type) {
            case 'region':
                return array('personas.comuna.provincia.region');
            case 'provincia':
                return array('personas.comuna.provincia');
            case 'comuna':
                return array('personas.comuna');
        }
    }

    private function filterCategory($type) {
        switch ($type) {
            case 'categoria':
                return array('profesoresconocimientos.conocimientos.categoria');
            case 'subcategoria':
                return array('profesoresconocimientos.conocimientos');
        }
    }

    /**
     * Muestra una imagen en una etiqueta <img> desde la base de datos
     * @id int $id
     */
    public function actionDisplayThumb($id) {

        $model = Personas::model()->findByPk($id);

        header('Content-Type: jpg');
        echo $model->foto;
    }

    private function porcPerfilCompletado($countPersona, $countProfesor){
        return round((($countPersona + $countProfesor) * 100)/(self::TOTAL_CAMPOS_PERSONAS + self::TOTAL_CAMPOS_PROFESORES)); 
    }
    
}
