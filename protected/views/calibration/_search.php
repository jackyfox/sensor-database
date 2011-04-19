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
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperature'); ?>
		<?php echo $form->textField($model,'temperature'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'humidity'); ?>
		<?php echo $form->textField($model,'humidity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs1'); ?>
		<?php echo $form->textField($model,'pgs1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs1_voltage'); ?>
		<?php echo $form->textField($model,'pgs1_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs2'); ?>
		<?php echo $form->textField($model,'pgs2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs2_voltage'); ?>
		<?php echo $form->textField($model,'pgs2_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs3'); ?>
		<?php echo $form->textField($model,'pgs3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pgs3_voltage'); ?>
		<?php echo $form->textField($model,'pgs3_voltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gas_alarm_id'); ?>
		<?php echo $form->textField($model,'gas_alarm_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->