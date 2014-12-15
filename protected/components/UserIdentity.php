<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public $option;

    public function authenticate() {

        $condition = new CDbCriteria();
        $condition->compare('usuario', $this->username);
        $condition->compare('pass', $this->password);

        $persona = Personas::model()->find($condition);

        if ($this->option === 'usuario' && !empty($persona)) {
            $model = Usuarios::model()->findByAttributes(array('rut' => $persona->rut));
        } else if ($this->option === 'profesor' && !empty($persona)) {
            $model = Profesores::model()->findByAttributes(array('rut' => $persona->rut));
        }

        if (!empty($model) && !is_null($model)) {
            if (empty($persona) || is_null($persona)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } elseif ($persona->pass !== $this->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->setState('usuario', $persona->usuario);
                $this->setState('rutPersona', $persona->rut);
                $this->setState('perfil', $this->option);
                $this->errorCode = self::ERROR_NONE;
            }
        }else{
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        
        return !$this->errorCode;
    }

}
