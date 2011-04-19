<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gas-alarm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'factory_number'); ?>
		<?php echo $form->textField($model,'factory_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'factory_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacture_date'); ?>
		<?php echo $form->textField($model,'manufacture_date'); ?>
		<?php echo $form->error($model,'manufacture_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buzzer'); ?>
		<?php echo $form->textField($model,'buzzer'); ?>
		<?php echo $form->error($model,'buzzer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_sensor'); ?>
		<?php echo $form->textField($model,'temp_sensor'); ?>
		<?php echo $form->error($model,'temp_sensor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'explosion_safety'); ?>
		<?php echo $form->textField($model,'explosion_safety'); ?>
		<?php echo $form->error($model,'explosion_safety'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'protection_corps'); ?>
		<?php echo $form->textField($model,'protection_corps'); ?>
		<?php echo $form->error($model,'protection_corps'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lcd'); ?>
		<?php echo $form->textField($model,'lcd'); ?>
		<?php echo $form->error($model,'lcd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->textField($model,'location_id'); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_alarm_type_id'); ?>
		<?php echo $form->textField($model,'gas_alarm_type_id'); ?>
		<?php echo $form->error($model,'gas_alarm_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_type_id'); ?>
		<?php echo $form->textField($model,'gas_type_id'); ?>
		<?php echo $form->error($model,'gas_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'control_signals_method_id'); ?>
		<?php echo $form->textField($model,'control_signals_method_id'); ?>
		<?php echo $form->error($model,'control_signals_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supply_voltage_id'); ?>
		<?php echo $form->textField($model,'supply_voltage_id'); ?>
		<?php echo $form->error($model,'supply_voltage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_sensor_type_id'); ?>
		<?php echo $form->textField($model,'gas_sensor_type_id'); ?>
		<?php echo $form->error($model,'gas_sensor_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<?php echo $form->textField($model,'organization_id'); ?>
		<?php echo $form->error($model,'organization_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->