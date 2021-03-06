<?php

/**
 * This is the model class for table "vistaprecios".
 *
 * The followings are the available columns in table 'vistaprecios':
 * @property integer $id
 * @property integer $id_alimento
 * @property double $precio
 * @property string $fecha
 * @property double $cantidad
 * @property double $precio_venta
 * @property string $fecha_vencimiento
 * @property integer $id_entrada_almacen
 * @property string $descripcion
 * @property string $unidad
 * @property string $precio_venta_gramo
 */
class Vistaprecios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vistaprecios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, id_alimento, id_entrada_almacen', 'numerical', 'integerOnly'=>true),
			array('precio, cantidad, precio_venta', 'numerical'),
			array('descripcion', 'length', 'max'=>50),
			array('unidad', 'length', 'max'=>12),
			array('fecha, fecha_vencimiento, precio_venta_gramo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_alimento, precio, fecha, cantidad, precio_venta, fecha_vencimiento, id_entrada_almacen, descripcion, unidad, precio_venta_gramo', 'safe', 'on'=>'search'),
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
			'id_alimento' => 'Id Alimento',
			'precio' => 'Precio',
			'fecha' => 'Fecha',
			'cantidad' => 'Cantidad',
			'precio_venta' => 'Precio Venta',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'id_entrada_almacen' => 'Id Entrada Almacen',
			'descripcion' => 'Descripcion',
			'unidad' => 'Unidad',
			'precio_venta_gramo' => 'Precio Venta Gramo',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_alimento',$this->id_alimento);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio_venta',$this->precio_venta);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('id_entrada_almacen',$this->id_entrada_almacen);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('unidad',$this->unidad,true);
		$criteria->compare('precio_venta_gramo',$this->precio_venta_gramo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vistaprecios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
