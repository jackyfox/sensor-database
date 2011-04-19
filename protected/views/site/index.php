<?php $this->pageTitle=Yii::app()->name; ?>

<?php if (!Yii::app()->user->isGuest): ?>
<h1>База газосигнализаторов приветствует Вас, товарищ <?php echo Yii::app()->user->name; ?></h1>
<p>Последний логин 
<?php 
	/**
	 * Вывод даты последнего входа в виде "1-го января 2010 14:10"
	 */
	//$locale = Yii::app()->getLocale('ru_ru');
	$last_login_time = Yii::app()->user->lastLoginTime;
	echo date('j-го ', $last_login_time); 
	//echo $locale->monthNames[date('n', $last_login_time)];
	echo Yii::app()->locale->monthNames[date('n', $last_login_time)];
	echo date(' Y в ', $last_login_time);
	echo date('G:i', $last_login_time);
?>.
<div>
	<p><?php echo CHtml::link('Список газосигнализаторов', array('/gasAlarm')); ?></p>
</div>
<?php else: ?>
<h1>Добро пожалость в базу газосигнализаторов</h1>
<p>Для работы с базой следует залогиниться. <?php echo CHtml::link('Вход', array('site/login'));?></p>
<?php endif; ?>