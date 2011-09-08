<div class="form" id="orgDialogForm">
 
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'organization-form',
    'enableAjaxValidation'=>true,
)); 
// enableAjaxValidation разрешена, поэтому проверка данных выполняетсяна лету
?>
 
<p class="note">Поля, отмеченные звездочками (<span class="required">*</span>), обязательны.</p>
 
<?php echo $form->errorSummary($model); ?>
 
<div class="row">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'name'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'inn'); ?>
	<?php echo $form->textField($model,'inn',array('size'=>50,'maxlength'=>15)); ?>
	<?php echo $form->error($model,'inn'); ?>
</div>
 
<div class="row buttons">
	<?php echo CHtml::ajaxSubmitButton("Добавить организацию",CHtml::normalizeUrl(array('organization/addnew','render'=>false)),array('success'=>'js: function(data) {
                        $("#GasAlarm_organization_id").append(data);
                        $("#orgDialog").dialog("close");
                }'),array('id'=>'closeOrgDialog')); ?>
</div>
 
<?php $this->endWidget(); ?>
 
</div>