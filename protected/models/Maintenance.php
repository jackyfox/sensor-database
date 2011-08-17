<?php

/**
 * This is the model class for table "maintenance".
 *
 * The followings are the available columns in table 'maintenance':
 * @property integer $id
 * @property string $date
 * @property string $note
 * @property integer $maintenance_type_id
 * @property integer $gas_alarm_id
 *
 * The followings are the available model relations:
 * @property GasAlarm $gasAlarm
 * @property MaintenanceType $maintenanceType
 */
class Maintenance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Maintenance the static model class
	 */
	
	/**
	 * Корректируем дату для занесения в БД
	 */
	public function beforeSave()
	{
		/**
		 * Преобразует строку вида «15.09.2011»  к формату БД «2011-09-15»
		 */
		$this->date = date('Y-m-d', strtotime($this->date));
		
		return parent::beforeSave();
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'maintenance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, maintenance_type_id, gas_alarm_id', 'required'),
			array('maintenance_type_id, gas_alarm_id', 'numerical', 'integerOnly'=>true),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('factory_number, id, date, note, maintenance_type_id, gas_alarm_id', 'safe', 'on'=>'search'),
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
			'gasAlarm' => array(self::BELONGS_TO, 'GasAlarm', 'gas_alarm_id'),
			'maintenanceType' => array(self::BELONGS_TO, 'MaintenanceType', 'maintenance_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Дата',
			'note' => 'Заметки',
			'maintenance_type_id' => 'Вид работ',
			'gas_alarm_id' => 'Газосигнализатор',
			'factory_number'=>'Зав. №',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('date',$this->date,true);
		$criteria->compare('maintenance_type_id',$this->maintenance_type_id);
		$criteria->compare('gas_alarm_id',$this->gas_alarm_id);
		
		$criteria->with = array('gasAlarm');
		
		$sort = new CSort();
		$sort->defaultOrder = 'date DESC';
		$sort->attributes = array(
			'date',
		    'factory_number'=>array(
				'asc'=>'gasAlarm.factory_number',
			    'desc'=>'gasAlarm.factory_number DESC',
			),
		    'maintenance_type_id',
		);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				// Получаем длину страницы из параметров польозвателя 
				'pageSize'=> Yii::app()->user->getState('pageSize',
				// Стандартное значение defaultPageSize
				// задано ранее в main.php, в секции params
					Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
			'sort' => $sort,
		));
	}
}