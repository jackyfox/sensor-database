<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные звездочкой (<span class="required">*</span>), нужно обязательно заполнить.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
		$form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'date',
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
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'check_result_id', array('checked'=>'checked')); ?>
		<?php echo $form->labelEx($model,'check_result_id'); ?>
		<?php echo $form->error($model,'check_result_id'); ?>
	</div>

	<div class="row">
		<div class="row">
		<?php echo $form->hiddenField($model,'gas_alarm_id'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->