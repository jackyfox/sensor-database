<?php

/**
 * This is the model class for table "test".
 *
 * The followings are the available columns in table 'test':
 * @property integer $id
 * @property string $date
 * @property double $temperature
 * @property double $humidity
 * @property double $pgs1
 * @property double $pgs1_voltage
 * @property double $pgs1_indication
 * @property double $pgs2
 * @property double $pgs2_voltage
 * @property double $pgs2_indication
 * @property double $pgs3
 * @property double $pgs3_voltage
 * @property double $pgs3_indication
 * @property integer $gas_alarm_id
 *
 * The followings are the available model relations:
 * @property GasAlarm $gasAlarm
 */
class Test extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Test the static model class
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
		return 'test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gas_alarm_id', 'required'),
			array('gas_alarm_id', 'numerical', 'integerOnly'=>true),
			array('temperature, humidity, pgs1, pgs1_voltage, pgs1_indication, pgs2, pgs2_voltage, pgs2_indication, pgs3, pgs3_voltage, pgs3_indication', 'numerical'),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, temperature, humidity, pgs1, pgs1_voltage, pgs1_indication, pgs2, pgs2_voltage, pgs2_indication, pgs3, pgs3_voltage, pgs3_indication, gas_alarm_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'temperature' => 'Temperature',
			'humidity' => 'Humidity',
			'pgs1' => 'Pgs1',
			'pgs1_voltage' => 'Pgs1 Voltage',
			'pgs1_indication' => 'Pgs1 Indication',
			'pgs2' => 'Pgs2',
			'pgs2_voltage' => 'Pgs2 Voltage',
			'pgs2_indication' => 'Pgs2 Indication',
			'pgs3' => 'Pgs3',
			'pgs3_voltage' => 'Pgs3 Voltage',
			'pgs3_indication' => 'Pgs3 Indication',
			'gas_alarm_id' => 'Gas Alarm',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('temperature',$this->temperature);
		$criteria->compare('humidity',$this->humidity);
		$criteria->compare('pgs1',$this->pgs1);
		$criteria->compare('pgs1_voltage',$this->pgs1_voltage);
		$criteria->compare('pgs1_indication',$this->pgs1_indication);
		$criteria->compare('pgs2',$this->pgs2);
		$criteria->compare('pgs2_voltage',$this->pgs2_voltage);
		$criteria->compare('pgs2_indication',$this->pgs2_indication);
		$criteria->compare('pgs3',$this->pgs3);
		$criteria->compare('pgs3_voltage',$this->pgs3_voltage);
		$criteria->compare('pgs3_indication',$this->pgs3_indication);
		$criteria->compare('gas_alarm_id',$this->gas_alarm_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}