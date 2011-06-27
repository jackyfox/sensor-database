<?php

/**
 * This is the model class for table "gas_alarm".
 *
 * The followings are the available columns in table 'gas_alarm':
 * @property integer $id
 * @property string $factory_number
 * @property string $manufacture_date
 * @property integer $buzzer
 * @property integer $temp_sensor
 * @property integer $explosion_safety
 * @property integer $protection_corps
 * @property integer $lcd
 * @property integer $location_id
 * @property integer $gas_alarm_type_id
 * @property integer $gas_type_id
 * @property integer $control_signals_method_id
 * @property integer $supply_voltage_id
 * @property integer $gas_sensor_type_id
 * @property integer $organization_id
 *
 * The followings are the available model relations:
 * @property Calibration[] $calibrations
 * @property Check[] $checks
 * @property ControlSignalsMethod $controlSignalsMethod
 * @property GasAlarmType $gasAlarmType
 * @property GasType $gasType
 * @property Location $location
 * @property Organization $organization
 * @property SupplyVoltage $supplyVoltage
 * @property Maintenance[] $maintenances
 * @property Test[] $tests
 */
class GasAlarm extends CActiveRecord
{
	/**
	 * Указатель того, что создается интервал ГС
	 * @var boolean
	 */
	public $interval=false;
	
	/**
	 * При вводе интервала зав. номеров, указываете его последнее значение
	 * @var integer
	 */
	
	public $interval_end=NULL;
	
	/**
	 * Дата последней замены сенсора
	 */
	public function getLastSensorChange()
	{
		if ($this->maintenanceCount > 0)
		{
			$ms = array_reverse($this->maintenances);
			foreach ($ms as $m)
			{
				if ($m->maintenance_type_id == 1)
					return date('d.m.Y', strtotime($m->date))."*";
			}
		} 
		
		return date('d.m.Y', strtotime($this->manufacture_date)); 
	}
	
	/**
	 * Корректируем дату для занесения в БД
	 */
	public function beforeSave()
	{
		/**
		 * Преобразует строку вида «15.09.2011»  к формату БД «2011-09-15»
		 */
		$this->manufacture_date = date('Y-m-d', strtotime($this->manufacture_date));
		
		return parent::beforeSave();
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @return GasAlarm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gas_alarm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('interval_end', 'numerical', 'integerOnly'=>true),
			array('factory_number, location_id, gas_alarm_type_id, gas_type_id, control_signals_method_id, supply_voltage_id, organization_id', 'required'),
			array('gas_sensor_type_id', 'in', 'range'=>array(1,2,3)),
			array('buzzer, temp_sensor, explosion_safety, protection_corps, lcd, location_id, gas_alarm_type_id, gas_type_id, control_signals_method_id, supply_voltage_id, gas_sensor_type_id, organization_id', 'numerical', 'integerOnly'=>true),
			array('factory_number', 'length', 'max'=>10),
			array('manufacture_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, factory_number, manufacture_date, buzzer, temp_sensor, explosion_safety, protection_corps, lcd, location_id, gas_alarm_type_id, gas_type_id, control_signals_method_id, supply_voltage_id, gas_sensor_type_id, organization_id', 'safe', 'on'=>'search'),
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
			'calibrations' => array(self::HAS_MANY, 'Calibration', 'gas_alarm_id'),
			'checks' => array(self::HAS_MANY, 'Check', 'gas_alarm_id'),
			'controlSignalsMethod' => array(self::BELONGS_TO, 'ControlSignalsMethod', 'control_signals_method_id'),
			'gasAlarmType' => array(self::BELONGS_TO, 'GasAlarmType', 'gas_alarm_type_id'),
			'gasType' => array(self::BELONGS_TO, 'GasType', 'gas_type_id'),
			'location' => array(self::BELONGS_TO, 'Location', 'location_id'),
			'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
			'supplyVoltage' => array(self::BELONGS_TO, 'SupplyVoltage', 'supply_voltage_id'),
			'maintenances' => array(self::HAS_MANY, 'Maintenance', 'gas_alarm_id'),
			'tests' => array(self::HAS_MANY, 'Test', 'gas_alarm_id'),
			'testCount' => array(self::STAT, 'Test', 'gas_alarm_id'),
			'checkCount' => array(self::STAT, 'Check', 'gas_alarm_id'),
			'calibrationCount' => array(self::STAT, 'Calibration', 'gas_alarm_id'),
			'maintenanceCount' => array(self::STAT, 'Maintenance', 'gas_alarm_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'factory_number' => 'Заводской номер',
			'manufacture_date' => 'Дата изготовления',
			'buzzer' => 'Звукоизвещатель',
			'temp_sensor' => 'Температурный датчик',
			'explosion_safety' => 'Взрывозащита',
			'protection_corps' => 'Защита корпуса',
			'lcd' => 'ЖКИ',
			'location_id' => 'Размещение',
			'gas_alarm_type_id' => 'Наименование',
			'gas_type_id' => 'Химческая формула',
			'control_signals_method_id' => 'Способ выдачи управляющих сигналов',
			'supply_voltage_id' => 'Напряжение питания',
			'gas_sensor_type_id' => 'Тип чувствительного элемента',
			'organization_id' => 'Организация',
			'lastSensorChange' => 'Последняя замена сенсора',
			'interval' => 'интервал',
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

		$criteria->compare('factory_number',$this->factory_number,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('organization_id',$this->organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				// Получаем длину страницы из параметров польозвателя 
				'pageSize'=> Yii::app()->user->getState('pageSize',
				// Стандартное значение defaultPageSize
				// задано ранее в main.php, в секции params
					Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * IDs of gas alarm types
	 * Enter description here ...
	 * @var integer
	 */
	const GST_SEMICOND = 1;
	const GST_TERMOCAT = 2;
	const GST_ELECTHIM = 3;
	
	/**
	 * @return array gas sensor types indexed by type IDs
	 */
	public function getGasSensorType()
	{
		return array(
			self::GST_SEMICOND => 'П',
			self::GST_TERMOCAT => 'К',
			self::GST_ELECTHIM => 'Э',
		);
	}
	
	/**
	 * @return gas sensor type by index
	 */
	public function getGasSensorTypeText()
	{
		$types = $this->getGasSensorType();
		return isset($types[$this->gas_sensor_type_id]) ? 
			$types[$this->gas_sensor_type_id] : 
			"unknown type ({$this->gas_sensor_type_id})";
	}
	
	/**
	 * @return array gas sensor types description indexed by type IDs
	 */
	public function getGasSensorTypeDesc()
	{
		return array(
			self::GST_SEMICOND => 'полупроводниковый',
			self::GST_TERMOCAT => 'термокаталитический',
			self::GST_ELECTHIM => 'электрохимический',
		);
	}
	
	/**
	 * @return gas sensor type description text
	 */
	public function getGasSensorTypeDescText()
	{
		$descs = $this->getGasSensorTypeDesc();
		return isset($descs[$this->gas_sensor_type_id]) ? 
			$descs[$this->gas_sensor_type_id] : 
			"unknown type ({$this->gas_sensor_type_id})";
	}
	
	/**
	 * Returns code name of gas alarm like "СГИТЭ-СО-3.1-24"
	 * @return string with code name of gas alarm
	 */
	public function getCodeName()
	{
		$code_name = $this->gasAlarmType->type."-";
		$code_name .= $this->gasType->type."-";
		$code_name .= $this->controlSignalsMethod->type;
		if ($this->gasAlarmType->type === "СГИТЭ")
			$code_name .= ".";
		else 
			$code_name .= "-";
		$code_name .= $this->buzzer."-";
			
		if ($this->gasAlarmType->type === "СГИТЭ")
		{
			if ($this->explosion_safety == 1)
				$code_name .= "1ExibIIAT4";
			else
				$code_name .= $this->supplyVoltage->voltage;
		}
		else 
		{
			$code_name .= $this->supplyVoltage->voltage;
			$code_name .= "-".$this->getGasSensorTypeText();
			if ($this->temp_sensor == 1 || $this->lcd == 1)
			{
				$code_name .= ($this->temp_sensor == 1) ? "Т" : "";
				$code_name .= ($this->lcd == 1) ? "И" : "";
				$code_name .= "-";
			}			
			else 
				$code_name .= "О-";
			$code_name .= ($this->protection_corps == 1) ? "53" : "20";
		}
		
		return $code_name;
	}
}