<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maintenance-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maintenance_type_id'); ?>
		<?php echo $form->textField($model,'maintenance_type_id'); ?>
		<?php echo $form->error($model,'maintenance_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_alarm_id'); ?>
		<?php echo $form->textField($model,'gas_alarm_id'); ?>
		<?php echo $form->error($model,'gas_alarm_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->