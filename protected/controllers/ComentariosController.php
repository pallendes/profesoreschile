<?php

class ComentariosController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionNuevo() {

        if (isset($_POST["idProfesor"]) && isset($_POST["comentario"])) {
            $comentario = new Comentarios;
            $comentario->rutPersona = Yii::app()->user->rutPersona;
            $comentario->comentario = $_POST["comentario"];
            $comentario->idProfesor = $_POST["idProfesor"];
            $comentario->fechaComentario = date('Y-m-d h:i:s');
            var_dump($comentario->hasErrors());
            if ($comentario->save()) {
                Yii::app()->user->setFlash('resultado', 'Tu comentario ha sido publicado.');
                $this->redirect(CController::createUrl('profesores/perfil/'.$comentario->idProfesor));
            }
        }
    }

}
