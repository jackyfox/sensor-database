<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supply-voltage-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'voltage'); ?>
		<?php echo $form->textField($model,'voltage'); ?>
		<?php echo $form->error($model,'voltage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->