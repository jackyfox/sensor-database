<?php 
$reqDate = Yii::app()->request->getQuery('Check');
?>
<style>
table { border-collapse:collapse; }
table, th, td { border: 1px solid black; }
table th { text-align: center; padding: 5pt; }
table td { padding: 4pt; }
td.number { text-align: right; }
</style>
<h1>Поверка от <?php echo date("d.m.Y", strtotime($reqDate['date'])); ?></h1>

<table width="100%">
<tr>
<th>Тип газосигнализатора</th><th>Зав. №</th><th>Адрес</th>
</tr>
<?php foreach ($checks->search()->data as $check): ?>
<tr>
<td><?php echo $check->gasAlarm->codeName; ?></td>
<td class="number"><?php echo $check->gasAlarm->factory_number; ?></td>
<td><?php echo $check->gasAlarm->location->address; ?></td>
</tr>
<?php endforeach; ?>
</table>