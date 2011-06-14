<?php
$this->pageTitle=Yii::app()->name . ' - Ошибка';
$this->breadcrumbs=array(
	'Ошибка',
);
?>

<h2>Ошибочка вышла. Номер <?php echo $code; ?>. Извините</h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>