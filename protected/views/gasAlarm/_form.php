<div class="form">

<?php if(!$model->isNewRecord)
    Yii::app()->clientScript->registerScript('new_ga_form','
        $.ajax(
			{ 
				type: "POST",
				url:  "'.CController::createUrl('dloc').'",
				cache: false,
				data: "GasAlarm[organization_id])='.$model->organization_id.'",
				success: function(html){
					$("#GasAlarm_location_id").html(html);
				}
			}
		)
    ',CClientScript::POS_READY);  
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gas-alarm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные звездочкой <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); if($this->action) ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_alarm_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_alarm_type_id', CHtml::listData(GasAlarmType::model()->findAll(), 'id', 'type')); ?>
		<?php echo $form->error($model,'gas_alarm_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factory_number'); ?>
		<?php echo $form->textField($model,'factory_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'factory_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_type_id', CHtml::listData(GasType::model()->findAll(), 'id', 'type')); ?>
		<?php echo $form->error($model,'gas_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacture_date'); ?>
		
		<?php
		$form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'manufacture_date',
			//'theme'=>'cupertino',
			//'flat'=>true,
			// additional javascript options for the date picker plugin
			'options'=>array(
				//'showAnim'=>'Slide',
				'dateFormat'=>'dd.mm.yy',
				'defaultDate'=>'12.12.12',
				'showOtherMonths'=>true,
				'selectOtherMonths'=>true,
				'changeYear'=>true,
				'changeMonth'=>true,
				'showButtonPanel' => true,
                'showOn' => 'both',
				'buttonImageOnly'=>true,
				'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
			),
			'language'=>'ru',
			//'htmlOptions'=>array(
			//	'style'=>'height:18px;'
			//),
		)); ?>
		
		<?php echo $form->error($model,'manufacture_date'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'buzzer'); ?>
		<?php echo $form->labelEx($model,'buzzer'); ?>
		<?php echo $form->error($model,'buzzer'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'temp_sensor'); ?>
		<?php echo $form->labelEx($model,'temp_sensor'); ?>
		<?php echo $form->error($model,'temp_sensor'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'explosion_safety'); ?>
		<?php echo $form->labelEx($model,'explosion_safety'); ?>
		<?php echo $form->error($model,'explosion_safety'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'protection_corps'); ?>
		<?php echo $form->labelEx($model,'protection_corps'); ?>
		<?php echo $form->error($model,'protection_corps'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'lcd'); ?>
		<?php echo $form->labelEx($model,'lcd'); ?>
		<?php echo $form->error($model,'lcd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'control_signals_method_id'); ?>
		<?php echo $form->dropDownList($model, 'control_signals_method_id', CHtml::listData(ControlSignalsMethod::model()->findAll(), 'id', 'desc')); ?>
		<?php echo $form->error($model,'control_signals_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supply_voltage_id'); ?>
		<?php echo $form->dropDownList($model, 'supply_voltage_id', CHtml::listData(SupplyVoltage::model()->findAll(), 'id', 'voltage')); ?>
		<?php echo $form->error($model,'supply_voltage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_sensor_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_sensor_type_id', $model->getGasSensorTypeDesc()); ?>
		<?php echo $form->error($model,'gas_sensor_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<?php echo $form->dropDownList($model, 'organization_id', CHtml::listData(Organization::model()->findAll(), 'id', 'name'),	array(
				'empty'=>'- выберите организацию -',
				'onchange'=>'js:$("div#location").fadeIn()',
				'ajax' => array(
					'type'=>'POST', //request type
					'url'=>CController::createUrl('dloc'), //url to call.
					'update'=>'#'.CHtml::activeId($model, 'location_id'), //selector to update
					//'data'=>'js:$("div#location").fadeIn()' 
					//leave out the data key to pass all form values through
				))); ?>
		<?php echo $form->error($model,'organization_id'); ?>
	</div>

	<!-- style="display: none;"  -->

	<div class="row" id="location" <?php if($model->isNewRecord) echo 'style="display: none;"' ?> >
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'address'), array('empty'=>'- выберите адрес -')); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->