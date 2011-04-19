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
			array('factory_number, location_id, gas_alarm_type_id, gas_type_id, control_signals_method_id, supply_voltage_id, organization_id', 'required'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'factory_number' => 'Factory Number',
			'manufacture_date' => 'Manufacture Date',
			'buzzer' => 'Buzzer',
			'temp_sensor' => 'Temp Sensor',
			'explosion_safety' => 'Explosion Safety',
			'protection_corps' => 'Protection Corps',
			'lcd' => 'Lcd',
			'location_id' => 'Location',
			'gas_alarm_type_id' => 'Gas Alarm Type',
			'gas_type_id' => 'Gas Type',
			'control_signals_method_id' => 'Control Signals Method',
			'supply_voltage_id' => 'Supply Voltage',
			'gas_sensor_type_id' => 'Gas Sensor Type',
			'organization_id' => 'Organization',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('factory_number',$this->factory_number,true);
		$criteria->compare('manufacture_date',$this->manufacture_date,true);
		$criteria->compare('buzzer',$this->buzzer);
		$criteria->compare('temp_sensor',$this->temp_sensor);
		$criteria->compare('explosion_safety',$this->explosion_safety);
		$criteria->compare('protection_corps',$this->protection_corps);
		$criteria->compare('lcd',$this->lcd);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('gas_alarm_type_id',$this->gas_alarm_type_id);
		$criteria->compare('gas_type_id',$this->gas_type_id);
		$criteria->compare('control_signals_method_id',$this->control_signals_method_id);
		$criteria->compare('supply_voltage_id',$this->supply_voltage_id);
		$criteria->compare('gas_sensor_type_id',$this->gas_sensor_type_id);
		$criteria->compare('organization_id',$this->organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}