<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property boolean $blnborrado
 * @property string $created_date
 * @property string $modified_date
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $id_perfil
 * @property string $str_nombre
 * @property string $str_apellido
 * @property integer $int_cedula
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
		    array('username', 'unique'),
			array('created_by, modified_by, id_perfil, int_cedula', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>128),
			array('str_nombre, str_apellido', 'length', 'max'=>150),
			array('blnborrado, created_date, modified_date', 'safe'),
			array('password', 'safe','on'=>'crea'),
			array('password', 'safe','on'=>'actualiza'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, blnborrado, created_date, modified_date, created_by, modified_by, id_perfil, str_nombre, str_apellido, int_cedula', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Usuario',
			'password' => 'Contaseña',
			'blnborrado' => 'Blnborrado',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'id_perfil' => 'Perfil',
			'str_nombre' => 'Nombre',
			'str_apellido' => 'Apellido',
			'int_cedula' => 'Cedula',
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
		$criteria->condition='blnborrado=false';

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('blnborrado',$this->blnborrado);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('id_perfil',$this->id_perfil);
		$criteria->compare('str_nombre',$this->str_nombre,true);
		$criteria->compare('str_apellido',$this->str_apellido,true);
		$criteria->compare('int_cedula',$this->int_cedula);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

            public function behaviors()
{
    return array(
        'CTimestampBehavior' => array(
            'class' => 'zii.behaviors.CTimestampBehavior',
            'createAttribute' => 'created_date',
            'updateAttribute' => 'modified_date',
            'setUpdateOnCreate' => true,
        ),
        'BlameableBehavior' => array(
            'class' => 'application.components.behaviors.BlameableBehavior',
            'createdByColumn' => 'created_by', 
            'updatedByColumn' => 'modified_by',  
        ),
    );
}

  public function validatePassword($password)
           {
              return $this->hashPassword($password)===$this->password;
           }
         public function hashPassword($password)
           {
              return md5($password);
           }
        
        }
