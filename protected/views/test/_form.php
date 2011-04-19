<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-form',
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
		<?php echo $form->labelEx($model,'temperature'); ?>
		<?php echo $form->textField($model,'temperature'); ?>
		<?php echo $form->error($model,'temperature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'humidity'); ?>
		<?php echo $form->textField($model,'humidity'); ?>
		<?php echo $form->error($model,'humidity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs1'); ?>
		<?php echo $form->textField($model,'pgs1'); ?>
		<?php echo $form->error($model,'pgs1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs1_voltage'); ?>
		<?php echo $form->textField($model,'pgs1_voltage'); ?>
		<?php echo $form->error($model,'pgs1_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'psk1_indication'); ?>
		<?php echo $form->textField($model,'psk1_indication'); ?>
		<?php echo $form->error($model,'psk1_indication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs2'); ?>
		<?php echo $form->textField($model,'pgs2'); ?>
		<?php echo $form->error($model,'pgs2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs2_voltage'); ?>
		<?php echo $form->textField($model,'pgs2_voltage'); ?>
		<?php echo $form->error($model,'pgs2_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs2_indication'); ?>
		<?php echo $form->textField($model,'pgs2_indication'); ?>
		<?php echo $form->error($model,'pgs2_indication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs3'); ?>
		<?php echo $form->textField($model,'pgs3'); ?>
		<?php echo $form->error($model,'pgs3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs3_voltage'); ?>
		<?php echo $form->textField($model,'pgs3_voltage'); ?>
		<?php echo $form->error($model,'pgs3_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pgs3_indication'); ?>
		<?php echo $form->textField($model,'pgs3_indication'); ?>
		<?php echo $form->error($model,'pgs3_indication'); ?>
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