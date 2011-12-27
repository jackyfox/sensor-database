<div id="checks_table" class="detail_table">
<table>
<tr>
<th>Дата</th><th>Поверка пройдена</th>
</tr>
<?php 
/* Сортируем по дате от последнего к первому*/
foreach ($checks as $key => $row) {
    $date[$key]  = $row['date'];
}
array_multisort($date, SORT_DESC, $checks);
?>
<?php foreach ($checks as $check): ?>
<tr>
<td><?php echo CHtml::link(date("d.m.Y", strtotime($check->date)), 
	array('check/view',
    'id'=>$check->id)); ?></td>
<td><?php echo $check->checkResult; ?></td>

</tr>
<?php endforeach; ?>
</table>
</div><!-- checks_table -->