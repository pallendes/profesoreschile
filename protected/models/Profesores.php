<?php

/**
 * This is the model class for table "profesores".
 *
 * The followings are the available columns in table 'profesores':
 * @property integer $idProfesor
 * @property string $rut
 * @property string $descripcion
 * @property integer $tarifa
 * @property string $disponibilidad
 * @property integer $vecesCalificado
 * @property integer $totalCalificaciones
 * @property string $lastUpdate
 * @property integer $idEstadoCuenta
 *
 * The followings are the available model relations:
 * @property Comentarios[] $comentarioses
 * @property Estadoscuentas $idEstadoCuenta0
 * @property Personas $rut0
 * @property Profesoresconocimientos[] $profesoresconocimientoses
 * @property Registrocontrataciones[] $registrocontrataciones
 */
class Profesores extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'profesores';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rut, idEstadoCuenta', 'required', 'message' => 'El campo {attribute} es obligatorio.'),
            array('tarifa, descripcion, disponibilidad', 'required', 'message' => 'El campo {attribute} es obligatorio.'),
            array('tarifa, vecesCalificado, totalCalificaciones, idEstadoCuenta', 'numerical', 
                'integerOnly' => true, 'message' => 'El campo {attribute} debe ser un número.'),
            array('rut', 'length', 'max' => 12),
            array('descripcion', 'length', 'max' => 500),
            array('disponibilidad', 'length', 'max' => 250),
            array('lastUpdate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProfesor, rut, descripcion, tarifa, disponibilidad, vecesCalificado, totalCalificaciones, lastUpdate, idEstadoCuenta', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comentarios' => array(self::HAS_MANY, 'Comentarios', 'idProfesor'),
            'idEstadoCuenta0' => array(self::BELONGS_TO, 'Estadoscuentas', 'idEstadoCuenta'),
            'personas' => array(self::BELONGS_TO, 'Personas', 'rut'),
            'profesoresconocimientos' => array(self::HAS_MANY, 'Profesoresconocimientos', 'idProfesor'),
            'registrocontrataciones' => array(self::HAS_MANY, 'Registrocontrataciones', 'idProfesor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProfesor' => 'Id Profesor',
            'rut' => 'Rut',
            'descripcion' => 'Auto Descripción',
            'tarifa' => 'Tarifa',
            'disponibilidad' => 'Disponibilidad Horaria',
            'vecesCalificado' => 'Veces Calificado',
            'totalCalificaciones' => 'Total Calificaciones',
            'lastUpdate' => 'Last Update',
            'idEstadoCuenta' => 'Id Estado Cuenta',
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

        $criteria->compare('idProfesor', $this->idProfesor);
        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('tarifa', $this->tarifa);
        $criteria->compare('disponibilidad', $this->disponibilidad, true);
        $criteria->compare('vecesCalificado', $this->vecesCalificado);
        $criteria->compare('totalCalificaciones', $this->totalCalificaciones);
        $criteria->compare('lastUpdate', $this->lastUpdate, true);
        $criteria->compare('idEstadoCuenta', $this->idEstadoCuenta);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Profesores the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
