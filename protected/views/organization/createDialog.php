<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'orgDialog',
	'options'=>array(
		'title'=>"Добавить организацию",
		'autoOpen'=>true,
		'resizable' =>false,
		'closeOnEscape'=>true,
		'modal'=>'true',
		'width'=>'auto',
		'height'=>'auto',
	),
));
echo $this->renderPartial('_formDialog', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>