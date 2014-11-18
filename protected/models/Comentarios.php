<?php

/**
 * This is the model class for table "comentarios".
 *
 * The followings are the available columns in table 'comentarios':
 * @property integer $idComentario
 * @property integer $idProfesor
 * @property string $rutPersona
 * @property string $comentario
 * @property string $fechaComentario
 * @property string $respuesta
 * @property string $fechaRespuesta
 *
 * The followings are the available model relations:
 * @property Profesores $idProfesor0
 */
class Comentarios extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comentarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idProfesor, rutPersona, comentario, fechaComentario', 'required'),
            array('idProfesor', 'numerical', 'integerOnly' => true),
            array('rutPersona', 'length', 'max' => 12),
            array('comentario, respuesta', 'length', 'max' => 500),
            array('fechaRespuesta', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idComentario, idProfesor, rutPersona, comentario, fechaComentario, respuesta, fechaRespuesta', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'profesor' => array(self::BELONGS_TO, 'Profesores', 'idProfesor'),
            'persona' => array(self::BELONGS_TO, 'Personas', 'rutPersona')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idComentario' => 'Id Comentario',
            'idProfesor' => 'Id Profesor',
            'rutPersona' => 'Rut Persona',
            'comentario' => 'Comentario',
            'fechaComentario' => 'Fecha Comentario',
            'respuesta' => 'Respuesta',
            'fechaRespuesta' => 'Fecha Respuesta',
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

        $criteria->compare('idComentario', $this->idComentario);
        $criteria->compare('idProfesor', $this->idProfesor);
        $criteria->compare('rutPersona', $this->rutPersona, true);
        $criteria->compare('comentario', $this->comentario, true);
        $criteria->compare('fechaComentario', $this->fechaComentario, true);
        $criteria->compare('respuesta', $this->respuesta, true);
        $criteria->compare('fechaRespuesta', $this->fechaRespuesta, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comentarios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
