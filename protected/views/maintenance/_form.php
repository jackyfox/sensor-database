<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maintenance-form',
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
		<?php echo $form->labelEx($model,'maintenance_type_id'); ?>
		<?php echo $form->dropDownList($model, 'maintenance_type_id', CHtml::listData(MaintenanceType::model()->findAll(), 'id', 'type')); ?>
		<?php echo $form->error($model,'maintenance_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'gas_alarm_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->