<?php

/**
 * This is the model class for table "profesoresconocimientos".
 *
 * The followings are the available columns in table 'profesoresconocimientos':
 * @property integer $idProfesorConocimiento
 * @property integer $idProfesor
 * @property integer $idConocimiento
 *
 * The followings are the available model relations:
 * @property Conocimientos $idConocimiento0
 * @property Profesores $idProfesor0
 */
class Profesoresconocimientos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'profesoresconocimientos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idProfesor, idConocimiento', 'required'),
            array('idProfesor, idConocimiento', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProfesorConocimiento, idProfesor, idConocimiento', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'conocimientos' => array(self::BELONGS_TO, 'Conocimientos', 'idConocimiento'),
            'profesores' => array(self::BELONGS_TO, 'Profesores', 'idProfesor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProfesorConocimiento' => 'Id Profesor Conocimiento',
            'idProfesor' => 'Id Profesor',
            'idConocimiento' => 'Id Conocimiento',
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

        $criteria->compare('idProfesorConocimiento', $this->idProfesorConocimiento);
        $criteria->compare('idProfesor', $this->idProfesor);
        $criteria->compare('idConocimiento', $this->idConocimiento);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Profesoresconocimientos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
