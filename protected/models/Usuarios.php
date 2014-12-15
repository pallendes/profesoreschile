<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $idUsuario
 * @property string $rut
 * @property string $edited
 * @property integer $idEstadoCuenta
 *
 * The followings are the available model relations:
 * @property Comentarios[] $comentarioses
 * @property Registrocontrataciones[] $registrocontrataciones
 * @property Estadoscuentas $idEstadoCuenta0
 * @property Personas $rut0
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut, idEstadoCuenta', 'required'),
			array('idEstadoCuenta', 'numerical', 'integerOnly'=>true),
			array('rut', 'length', 'max'=>12),
			array('edited', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, rut, edited, idEstadoCuenta', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comentarioses' => array(self::HAS_MANY, 'Comentarios', 'idUsuario'),
			'registrocontrataciones' => array(self::HAS_MANY, 'Registrocontrataciones', 'idUsuario'),
			'idEstadoCuenta0' => array(self::BELONGS_TO, 'Estadoscuentas', 'idEstadoCuenta'),
			'personas' => array(self::BELONGS_TO, 'Personas', 'rut'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'rut' => 'Rut',
			'edited' => 'Edited',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('edited',$this->edited,true);
		$criteria->compare('idEstadoCuenta',$this->idEstadoCuenta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
