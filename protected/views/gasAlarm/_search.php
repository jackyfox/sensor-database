<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factory_number'); ?>
		<?php echo $form->textField($model,'factory_number',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manufacture_date'); ?>
		<?php echo $form->textField($model,'manufacture_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buzzer'); ?>
		<?php echo $form->textField($model,'buzzer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_sensor'); ?>
		<?php echo $form->textField($model,'temp_sensor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'explosion_safety'); ?>
		<?php echo $form->textField($model,'explosion_safety'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'protection_corps'); ?>
		<?php echo $form->textField($model,'protection_corps'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lcd'); ?>
		<?php echo $form->textField($model,'lcd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>
		<?php echo $form->textField($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gas_alarm_type_id'); ?>
		<?php echo $form->textField($model,'gas_alarm_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gas_type_id'); ?>
		<?php echo $form->textField($model,'gas_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'control_signals_method_id'); ?>
		<?php echo $form->textField($model,'control_signals_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supply_voltage_id'); ?>
		<?php echo $form->textField($model,'supply_voltage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gas_sensor_type_id'); ?>
		<?php echo $form->textField($model,'gas_sensor_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization_id'); ?>
		<?php echo $form->textField($model,'organization_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->