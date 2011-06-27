<?php 
/* 
 * Данный скрипт сбрасывает все поля формы и отправляет форму.
 * В итоге при нажатии на кнопку сброса, пользователю показываются
 * все газосигнализаторы.
 */
Yii::app()->clientScript->registerScript('clear-search-form', "
$('input[name=reset-button]').click(function(){
	$(':input','form:first') 
	.not(':button, :submit, :reset, :hidden') 
	.val('') 
	.removeAttr('checked') 
	.removeAttr('selected');
	$('form:first').submit();
});
");
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'factory_number'); ?>
		<?php echo $form->textField($model,'factory_number',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization_id'); ?>
		<?php echo $form->dropDownList($model, 'organization_id', CHtml::listData(Organization::model()->findAll(), 'id', 'name'), array('empty'=>'- поиск по владельцу -')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>
		<?php echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'address'), array('empty'=>'- поиск по адресу -')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
		<?php echo CHtml::Button('Сбросить условия поиска', array(
			'name'=>'reset-button',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->