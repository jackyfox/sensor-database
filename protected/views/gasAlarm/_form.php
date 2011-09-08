<div class="form">

<?php 
/**
 * Показ и скрытие поля конца интервала
 */
Yii::app()->clientScript->registerScript('interval_end_toggle', '
	if($("#GasAlarm_interval").is(":checked"))
	{
		$("#GasAlarm_interval").show();
	}
	else
	{
		$("#GasAlarm_interval_end").hide();
	}
	$("#GasAlarm_interval").click(function ()
	{
		if ($(this).is(":checked"))
		{
			$("#GasAlarm_interval_end").fadeIn();
		}
		else
		{
			$("#GasAlarm_interval_end").fadeOut();
		}
	});
',CClientScript::POS_READY); 
?>

<?php Yii::app()->clientScript->registerScript('update_location','
    function upd_loc() { 
    	$.ajax(
			{ 
				type: "POST",
				url:  "'.CController::createUrl('dloc').'",
				cache: false,
				data: "GasAlarm[organization_id])='.$model->organization_id.'",
				success: function(html){
					$("#GasAlarm_location_id").html(html);
				}
			}
		);
		// При редактировании свойств ГС сразу отображаем ссылку на добавление 
		// новой организации
		$("#new_location").attr("href", "'.$this->createUrl('location/create', array('org_id'=>$model->organization_id)).'"); 
		$("#new_location").show();
	}
    ',CClientScript::POS_READY);
?>

<?php if(!$model->isNewRecord)
    Yii::app()->clientScript->registerScript('not_new_ga_form','
		$.ajax(
			{ 
				type: "POST",
				url:  "'.CController::createUrl('dloc').'",
				cache: false,
				data: "GasAlarm[organization_id])='.$model->organization_id.'",
				success: function(html){
					$("#GasAlarm_location_id").html(html);
					$("#GasAlarm_location_id option:selected").each(function(){
						this.selected=false;
					});
					$("#GasAlarm_location_id option[value=\''.$model->location_id.'\']").attr("selected", "selected");
					//$("#GasAlarm_location_id").val('.$model->location_id.');
				}
			}
		);
		// При редактировании свойств ГС сразу отображаем ссылку на добавление 
		// новой организации
		$("#new_location").attr("href", "'.$this->createUrl('location/create', array('org_id'=>$model->organization_id)).'"); 
		$("#new_location").show();
		
		
	',CClientScript::POS_READY);  
?>

<?php
	// Сокрытие свойств ГС типа СГИТЭм 
    Yii::app()->clientScript->registerScript('sgiteM_hidding','
		gas_type = $("#GasAlarm_gas_alarm_type_id option:selected").val();
		if(gas_type == 1) 
		{
			// Скрываем тип чувствительного элемента,..
			$("#GA_sensor_type").hide();
			// ...степерь защиты корпуса,..
			$("#GA_protection_corps").hide();
			// ...датчик температуры,..
			$("#GA_temp_sensor").hide();
			// ...ЖКИ.
			$("#GA_lcd").hide();
		}
		else
		{
			// Показываем тип чувствительного элемента,..
			$("#GA_sensor_type").show();
			// ...степерь защиты корпуса,..
			$("#GA_protection_corps").show();
			// ...датчик температуры,..
			$("#GA_temp_sensor").show();
			// ...ЖКИ.
			$("#GA_lcd").show();
		}
		
		$("#GasAlarm_gas_alarm_type_id").change(function() {
			gas_type = $("#GasAlarm_gas_alarm_type_id option:selected").val();
			if(gas_type == 1) 
			{
				// Скрываем тип чувствительного элемента,..
				$("#GA_sensor_type").fadeOut();
				// ...степерь защиты корпуса,..
				$("#GA_protection_corps").fadeOut();
				// ...датчик температуры,..
				$("#GA_temp_sensor").fadeOut();
				// ...ЖКИ.
				$("#GA_lcd").fadeOut();
			}
			else
			{
				// Показываем тип чувствительного элемента,..
				$("#GA_sensor_type").fadeIn();
				// ...степерь защиты корпуса,..
				$("#GA_protection_corps").fadeIn();
				// ...датчик температуры,..
				$("#GA_temp_sensor").fadeIn();
				// ...ЖКИ.
				$("#GA_lcd").fadeIn();
			}
		});
    ',CClientScript::POS_READY);  
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gas-alarm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, помеченные звездочкой (<span class="required">*</span>), обязательны.</p>

	<?php echo $form->errorSummary($model); if($this->action) ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_alarm_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_alarm_type_id', CHtml::listData(GasAlarmType::model()->findAll(), 'id', 'type')); ?> 
		<?php echo $form->error($model,'gas_alarm_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factory_number'); ?>
		<?php echo $form->textField($model,'factory_number',array('size'=>10,'maxlength'=>10)); ?>
		 
		<?php
			/**
			 * Элементы для создания интервала ГС.
			 * Выводятся только при создании нового ГС
			 */
			if($model->isNewRecord)
			{
				echo CHtml::activeCheckBox($model, 'interval').' '; 
				echo CHtml::activeLabel($model, "interval", array("title"=>"Можно добавить сразу несколько датчиков, указав интервал зав. номеров, например, с 10 по 34 включительно.")).' '; 
				echo CHtml::activeTextField($model, "interval_end", array('size'=>10,'maxlength'=>10,));
				echo CHtml::error($model, 'interval_end');
			} 
		?>
		<?php echo $form->error($model,'factory_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gas_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_type_id', CHtml::listData(GasType::model()->findAll(), 'id', 'type')); ?>
		<?php echo $form->error($model,'gas_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacture_date'); ?>
		
		<?php
		$form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'manufacture_date',
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
		
		<?php echo $form->error($model,'manufacture_date'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'buzzer'); ?>
		<?php echo $form->labelEx($model,'buzzer'); ?>
		<?php echo $form->error($model,'buzzer'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model, 'explosion_safety'); ?>
		<?php echo $form->labelEx($model,'explosion_safety'); ?>
		<?php echo $form->error($model,'explosion_safety'); ?>
	</div>

	<div class="row" id="GA_sensor_type">
		<?php echo $form->labelEx($model,'gas_sensor_type_id'); ?>
		<?php echo $form->dropDownList($model, 'gas_sensor_type_id', $model->getGasSensorTypeDesc()); ?>
		<?php echo $form->error($model,'gas_sensor_type_id'); ?>
	</div>
	
	<div class="row" id="GA_protection_corps">
		<?php echo CHtml::activeCheckBox($model, 'protection_corps'); ?>
		<?php echo $form->labelEx($model,'protection_corps'); ?>
		<?php echo $form->error($model,'protection_corps'); ?>
	</div>
	
	<div class="row" id="GA_temp_sensor">
		<?php echo CHtml::activeCheckBox($model, 'temp_sensor'); ?>
		<?php echo $form->labelEx($model,'temp_sensor'); ?>
		<?php echo $form->error($model,'temp_sensor'); ?>
	</div>

	<div class="row" id="GA_lcd">
		<?php echo CHtml::activeCheckBox($model, 'lcd'); ?>
		<?php echo $form->labelEx($model,'lcd'); ?>
		<?php echo $form->error($model,'lcd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'control_signals_method_id'); ?>
		<?php echo $form->dropDownList($model, 'control_signals_method_id', CHtml::listData(ControlSignalsMethod::model()->findAll(), 'id', 'type', 'desc')); ?>
		<?php echo $form->error($model,'control_signals_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supply_voltage_id'); ?>
		<?php echo $form->dropDownList($model, 'supply_voltage_id', CHtml::listData(SupplyVoltage::model()->findAll(), 'id', 'voltage')); ?>
		<?php echo $form->error($model,'supply_voltage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<div id="organization">
		<?php echo $form->dropDownList($model, 'organization_id', CHtml::listData(Organization::model()->findAll(), 'id', 'name'),	array(
				'empty'=>'- выберите организацию -',
				//'onchange'=>'js:$("div#location").fadeIn()',
				'ajax' => array(
					'type'=>'POST', //request type
					'url'=>CController::createUrl('dloc'), //url to call.
					'update'=>'#'.CHtml::activeId($model, 'location_id'), //selector to update
					//'data'=>'js:$("div#location").fadeIn()' 
					//leave out the data key to pass all form values through
					'beforeSend' => 'function(){
			            $("#location").addClass("loading");
			            $("#new_location").hide();
			        }',
			        'complete' => 'function(){
			            $("#location").removeClass("loading");
			            //Если выбрана организация, формируем и отображаем ссылку на добавление нового адреса
			            if ($("#'.CHtml::activeId($model, 'organization_id').'").val())
			            {
			            	$("#new_location").attr("href", "'.$this->createUrl('location/create').'&org_id=" + $("#'.CHtml::activeId($model, 'organization_id').'").val());
			            	$("#new_location").show();
			            }
			        }',
				))); ?>
		<?php echo CHtml::ajaxLink("Добавить организацию...",$this->createUrl('organization/addNew'),array(
	        'onclick'=>'$("#orgDialog").dialog("open"); return false;',
	        'update'=>'#orgDialog'
	        ),array('id'=>'showOrgDialog'));?>
	    <div id="orgDialog"></div>
	    </div>
		<?php // echo CHtml::link("Добавить организацию...", array("organization/create")); ?>
		<?php echo $form->error($model,'organization_id'); ?>
	</div>

	<!-- style="display: none;"  -->

	<div class="row" id="location" <?php //if($model->isNewRecord) echo 'style="display: none;"' ?> >
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'address'), array('empty'=>'- сначала выберите организацию -')); ?>
		<a href="#&org_id=" id="new_location" style="display: none;">Добавить адрес...</a>
		<?php echo $form->error($model,'location_id'); ?>
		<?php  ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->