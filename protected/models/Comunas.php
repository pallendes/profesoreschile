<?php

/**
 * This is the model class for table "comunas".
 *
 * The followings are the available columns in table 'comunas':
 * @property integer $idComuna
 * @property string $comuna
 * @property integer $idProvincia
 *
 * The followings are the available model relations:
 * @property Admins[] $admins
 * @property Provincias $idProvincia0
 * @property Personas[] $personases
 */
class Comunas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comunas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idComuna, comuna, idProvincia', 'required'),
            array('idComuna, idProvincia', 'numerical', 'integerOnly' => true),
            array('comuna', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idComuna, comuna, idProvincia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'admins' => array(self::HAS_MANY, 'Admins', 'idComuna'),
            'provincia' => array(self::BELONGS_TO, 'Provincias', 'idProvincia'),
            'personas' => array(self::HAS_MANY, 'Personas', 'idComuna'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idComuna' => 'Id Comuna',
            'comuna' => 'Comuna',
            'idProvincia' => 'Id Provincia',
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

        $criteria->compare('idComuna', $this->idComuna);
        $criteria->compare('comuna', $this->comuna, true);
        $criteria->compare('idProvincia', $this->idProvincia);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comunas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
