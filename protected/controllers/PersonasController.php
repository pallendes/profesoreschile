<?php

class PersonasController extends Controller {

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
                'actions' => array('index', 'view', 'registro', 'paso1', 'paso2', 
                    'paso3', 'cargarprovincias', 'cargarcomunas', 'update'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRegistro() {

        $this->layout = '//layouts/registro';

        $model = new Personas;

        $this->performAjaxValidation($model);

        if (isset($_POST['Personas'])) {
            $model->attributes = $_POST['Personas'];
            if ($model->save()) {
                
                $usuario = new Usuarios();
                $usuario->rut = $model->rut;
                $usuario->idEstadoCuenta = 1;
                $usuario->save(false);
             
                $this->render('registroOk');
            }
        }

        $this->render('registro', array(
            'model' => $model,
        ));
    }
    
    public function actionPaso1() {

        $this->layout = '//layouts/registro';

        $model = new Personas;

        $this->performAjaxValidation($model);

        if (isset($_POST['Personas'])) {
            $model->attributes = $_POST['Personas'];
            if ($model->save()) {

                $profesores = new Profesores;
                $profesores->rut = $model->rut;
                $profesores->idEstadoCuenta = 1;
                $profesores->save(false);
                $this->layout = '//layouts/registro-nobanner';
                $this->redirect(CController::createUrl('personas/paso2/' . $model->rut));
            }
        }

        $this->render('paso1', array(
            'model' => $model,
        ));
    }

    public function actionPaso2($id) {

        $this->layout = '//layouts/registro';

        $model = $this->loadModel($id);
      
        $this->performAjaxValidation($model);

        if (isset($_POST['Personas'])) {
            $model->attributes = $_POST['Personas'];

            if ($model->save()) {
                Yii::app()->user->setFlash('registroExitoso', $model->usuario);
                $this->redirect(CController::createUrl('profesores/paso3/' . $model->rut));
            }
        }

        $this->render('paso2', array(
            'model' => $model,
        ));
    }

    public function actionPaso3() {

        $this->layout = '//layouts/registro';

        $model = new Personas;

        $this->performAjaxValidation($model);

        if (isset($_POST['Personas'])) {
            $model->attributes = $_POST['Personas'];
            if ($model->save()) {
                Yii::app()->user->setFlash('registroExitoso', $model->usuario);
                $this->redirect('');
            }
        }

        $this->render('paso3', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Personas'])) {
            $model->attributes = $_POST['Personas'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->rut));
            }
        }

        $this->redirect(Yii::app()->createUrl('profesores/admperfil', array('id' => '1')));
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

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Personas');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Personas the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Personas::model()->findByPk($id);
        if ($model === null){
            throw new CHttpException(404, 'La página solicitado no existe.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Personas $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'personas-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    //**************************************************************************
    public function actionCargarProvincias() {

        $data = Provincias::model()->findAll('idRegion=:region', array(':region' => $_POST['region']));

        $data = CHtml::listData($data, 'idProvincia', 'provincia');

        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione...'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    //**************************************************************************
    public function actionCargarComunas() {

        $data = Comunas::model()->findAll('idProvincia=:provincia', array(':provincia' => $_POST['provincia']));

        $data = CHtml::listData($data, 'idComuna', 'comuna');

        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione...'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

}
