<?php

/**
 * This is the model class for table "regiones".
 *
 * The followings are the available columns in table 'regiones':
 * @property integer $idRegion
 * @property string $region
 * @property string $numero
 *
 * The followings are the available model relations:
 * @property Provincias[] $provinciases
 */
class Regiones extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'regiones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idRegion, region', 'required'),
            array('idRegion', 'numerical', 'integerOnly' => true),
            array('region', 'length', 'max' => 30),
            array('numero', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idRegion, region, numero', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'provincias' => array(self::HAS_MANY, 'Provincias', 'idRegion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idRegion' => 'Id Region',
            'region' => 'Region',
            'numero' => 'Numero',
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

        $criteria->compare('idRegion', $this->idRegion);
        $criteria->compare('region', $this->region, true);
        $criteria->compare('numero', $this->numero, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Regiones the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
