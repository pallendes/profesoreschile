Pe<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property string $rut
 * @property string $nombres
 * @property string $paterno
 * @property string $materno
 * @property string $usuario
 * @property string $pass
 * @property string $celular
 * @property string $celular2
 * @property string $direccion
 * @property string $sexo
 * @property string $ciudad
 * @property integer $idComuna
 * @property string $email
 * @property string $fechaNacimiento
 * @property string $foto
 * @property string $registro
 * @property string $lastUpdate
 *
 * The followings are the available model relations:
 * @property Comunas $idComuna0
 * @property Profesores[] $profesores
 * @property Usuarios[] $usuarioses
 */
class Personas extends CActiveRecord {

    public $pass_repeat;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'personas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rut, nombres, paterno, usuario, pass, email', 'required', 'message' => 'El campo {attribute} es obligatorio.'),
            array('idComuna', 'numerical', 'integerOnly' => true),
            array('idComuna', 'required', 'message' => 'El campo {attribute} es obligatorio.', 'on' => 'update'),
            array('email', 'email', 'message' => 'El email ingresado no es válido.'),
            array('rut', 'length', 'max' => 12, 'message' => 'El número ingresado es demasiado largo.'),
            array('rut', 'validateRut'),
            array('rut', 'match', 'pattern' => '/^[0-9-]{9,10}$/', 'message' => 'Ingrese un rut válido.'),
            array('usuario', 'validateUsuario'),
            array('email', 'validateEmail'),
            array('direccion, ciudad, idComuna', 'required', 'message' => 'El campo {attribute} es obligatorio.', 'on' => 'update'),
            array('pass_repeat', 'compare', 'compareAttribute' => 'pass', 
                'message' => 'Las contraseñas no coinciden!.', 'on' => 'insert'),
            array('nombres', 'length', 'max' => 60, 'message' => 'El número ingresado es demasiado largo.'),
            array('paterno, materno, usuario, ciudad, email', 'length', 'max' => 30),
            array('pass', 'length', 'max' => 45, 'message' => 'El número ingresado es demasiado largo.'),
            array('celular, celular2', 'length', 'max' => 9, 'message' => 'El número ingresado es demasiado largo.'),
            array('celular, celular2', 'numerical', 'message' => 'No se admiten letras.'),
            array('direccion', 'length', 'max' => 80, 'message' => 'El número ingresado es demasiado largo.'),
            array('sexo', 'length', 'max' => 1),
            array('fechaNacimiento, foto, registro, lastUpdate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rut, nombres, paterno, materno, usuario, pass, celular, celular2, direccion, sexo, ciudad, idComuna, email, fechaNacimiento, foto, registro, lastUpdate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comuna' => array(self::BELONGS_TO, 'Comunas', 'idComuna'),
            'profesor' => array(self::HAS_ONE, 'Profesores', 'rut'),
            'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'rut'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rut' => 'Rut',
            'nombres' => 'Nombre',
            'paterno' => 'Apellido Paterno',
            'materno' => 'Apellido Materno',
            'usuario' => 'Nombre de Usuario',
            'pass' => 'Contraseña:',
            'celular' => 'Teléfono Celular',
            'celular2' => 'Celular2',
            'direccion' => 'Dirección',
            'sexo' => 'Sexo',
            'ciudad' => 'Ciudad',
            'idComuna' => 'Comuna',
            'email' => 'Email',
            'fechaNacimiento' => 'Fecha de Nacimiento',
            'foto' => 'Foto',
            'pass_repeat' => 'Confirmar Contraseña',
            'registro' => 'Registro',
            'lastUpdate' => 'Last Update',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('paterno', $this->paterno, true);
        $criteria->compare('materno', $this->materno, true);
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('celular2', $this->celular2, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('sexo', $this->sexo, true);
        $criteria->compare('ciudad', $this->ciudad, true);
        $criteria->compare('idComuna', $this->idComuna);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fechaNacimiento', $this->fechaNacimiento, true);
        $criteria->compare('foto', $this->foto, true);
        $criteria->compare('registro', $this->registro, true);
        $criteria->compare('lastUpdate', $this->lastUpdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Personas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function validateEmail($attribute, $params){
        
        $persona = Personas::model()->findByAttributes(array('email' => $this->email));
        
        if(!is_null($persona) && $this->isNewRecord){
            $this->addError($attribute, 'El email ingresado ya se encuentra registrado.');
        }
        
    }
    
    public function validateUsuario($attribute, $params){
        
        $persona = Personas::model()->findByAttributes(array('usuario' => $this->usuario));
        
        if(!is_null($persona) && $this->isNewRecord){
            $this->addError($attribute, 'El nombre de usuario ingresado ya se encuentra registrado.');
        }
        
    }
    
    public function validateRut($attribute, $params) {
        $data = explode('-', $this->rut);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10) {
            $result = 'k';
        }
        if ($result == 11) {
            $result = 0;
        }
        if ($verifyCode != $result) {
            $this->addError('rut', 'El rut ingresado no es válido.');
        }

        $rut = Personas::model()->findByPk($this->rut);

        if (!is_null($rut) && $this->isNewRecord) {
            $this->addError($attribute, 'El rut ingresado ya se encuentra registrado.');
        }
    }

}
