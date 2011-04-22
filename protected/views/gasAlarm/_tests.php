<?php 
	$dates = array();
	$p1 = array(); /* Значение ПГС */
	$p2 = array();
	$p3 = array();
	$v1 = array(); /* Напряжение */
	$v2 = array();
	$v3 = array();
	$i1 = array(); /* Показания */
	$i2 = array();
	$i3 = array();
?>
<div class="tests">
<table>
<tr>
<th>Дата</th><th>Темп., &deg;С</th><th>Влажность</th>
<th>ПГС&nbsp;1</th><th>ПГС&nbsp;1 (напр)</th><th>ПГС&nbsp;1 (инд)</th>
<th>ПГС&nbsp;2</th><th>ПГС&nbsp;2 (напр)</th><th>ПГС&nbsp;2 (инд)</th>
<th>ПГС&nbsp;3</th><th>ПГС&nbsp;3 (напр)</th><th>ПГС&nbsp;3 (инд)</th>
</tr>
<?php foreach ($tests as $test): ?>
<?php 
	$dates[] = date("d.m.Y", strtotime($test->date));
	$p1[] = floatval($test->pgs1);
	$p2[] = floatval($test->pgs2);
	$p3[] = floatval($test->pgs3); 
	$v1[] = floatval($test->pgs1_voltage);
	$v2[] = floatval($test->pgs2_voltage);
	$v3[] = floatval($test->pgs3_voltage);
	$i1[] = floatval($test->pgs1_indication);
	$i2[] = floatval($test->pgs2_indication);
	$i3[] = floatval($test->pgs3_indication);
	
?>
<tr>
<td><?php echo date("d.m.Y", strtotime($test->date)); ?></td>
<td><?php echo $test->temperature; ?></td>
<td><?php echo $test->humidity; ?></td>

<td><?php echo floatval($test->pgs1); ?></td>
<td><?php echo floatval($test->pgs1_voltage); ?></td>
<td><?php echo floatval($test->pgs1_indication); ?></td>

<td><?php echo floatval($test->pgs2); ?></td>
<td><?php echo floatval($test->pgs2_voltage); ?></td>
<td><?php echo floatval($test->pgs2_indication); ?></td>

<td><?php echo floatval($test->pgs3); ?></td>
<td><?php echo floatval($test->pgs3_voltage); ?></td>
<td><?php echo floatval($test->pgs3_indication); ?></td>
</tr>
<?php endforeach; ?>
</table>
</div><!-- tests -->
<div class="chart">
<?php
	$this->Widget('ext.highcharts.HighchartsWidget', array(
		'options'=>array(
			'chart' => array(
				'defaultSeriesType' => 'line',
			),
			'title' => array('text' => 'Изменение напряжения на сенсоре'),
			'xAxis' => array(
				'categories' => $dates
			),
			'yAxis' => array(
				'title' => array('text' => 'Напряжение, В')
			),
			'tooltip' => array(
				'enabled' => 'false',
				'formatter' => 'js:function(){ return this.series.name+"<br><strong>"+this.y+"</strong> B<br>"+this.x; }',
			),
			'plotOptions' => array(
				'line' => array(
					'dataLabels' => array(
						'enabled' => 'true',
					),
					'enableMouseTracking' => 'false',
				),
			),
			'series' => array(
				array('name' => 'ПГС 1', 'data' => $v1),
				array('name' => 'ПГС 2', 'data' => $v2),
				array('name' => 'ПГС 3', 'data' => $v3),
			),
			'credits' => array('enabled' => false),
		),
	)); 
?>
</div> 