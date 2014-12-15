<?php

/**
 * This is the model class for table "provincias".
 *
 * The followings are the available columns in table 'provincias':
 * @property integer $idProvincia
 * @property string $provincia
 * @property integer $idRegion
 *
 * The followings are the available model relations:
 * @property Comunas[] $comunases
 * @property Regiones $idRegion0
 */
class Provincias extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'provincias';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('provincia, idRegion', 'required'),
            array('idRegion', 'numerical', 'integerOnly' => true),
            array('provincia', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProvincia, provincia, idRegion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comunas' => array(self::HAS_MANY, 'Comunas', 'idProvincia'),
            'region' => array(self::BELONGS_TO, 'Regiones', 'idRegion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProvincia' => 'Id Provincia',
            'provincia' => 'Provincia',
            'idRegion' => 'Id Region',
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

        $criteria->compare('idProvincia', $this->idProvincia);
        $criteria->compare('provincia', $this->provincia, true);
        $criteria->compare('idRegion', $this->idRegion);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Provincias the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
