<?php $this->pageTitle=Yii::app()->name; ?>

<?php if (!Yii::app()->user->isGuest): ?>
<h1>База газосигнализаторов приветствует вас, товарищ <?php echo Yii::app()->user->name; ?></h1>
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
<?php else: ?>
<h1>Добро пожаловать в базу газосигнализаторов</h1>
<p>Для обновления базы следует залогиниться. <?php echo CHtml::link('Вход', array('site/login'));?></p>
<?php endif; ?>
<div>
	<?php
		// Считаем количество газосигнализаторов в базе 
		$gaCount = GasAlarm::model()->count();
		// Побираем верный падеж для слова «газосигнализаторы» относительно вычисленного значения
		switch ($gaCount % 10 )
		{
			case 1: $gaTag = "газосигнализатор"; break;
			case 2;
			case 3;
			case 4;
				$gaTag = "газосигнализатора"; break;
			default: $gaTag = "газосигнализаторов";
		}
		// Считаем количество организаций в базе
		$orgCount = Organization::model()->count();
		// Подбираем падеж
		switch ($orgCount % 10)
		{
			case 1: $orgTag = "организации"; break;
			default: $orgTag = "организациям";
		}
		// Считаем количество адресов
		$locCount = Location::model()->count();
		// Подбираем падеж
		switch ($locCount % 10)
		{
			case 1: $locTag = "адресу"; break;
			default: $locTag = "адресам";
		}
	?>
	<p>В базе учтено <?php echo CHtml::link($gaCount." ".$gaTag, array('/gasAlarm'));  ?>, принадлежащих <?php echo CHtml::link($orgCount." ".$orgTag, array('/organization')); ?> и размещенных по <?php echo $locCount." ".$locTag; ?></p>
</div>

<!-- Инициализация карты -->
<?php 
$adress = "Решетникова, 15";
$key = "";
$adress1 = urlencode($adress);
$url="http://geocode-maps.yandex.ru/1.x/?geocode=$adress1";
$content=file_get_contents($url);
preg_match('/<pos>(.*?)<\/pos>/',$content,$point);
$coordinaty=str_replace(' ',', ',trim(strip_tags($point[1])));
echo $address." - ".$coordinaty;
?>

<!-- Область показа карты -->
<div id="map" style="width: 600px; height: 400px"></div>