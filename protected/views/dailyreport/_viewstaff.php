<?php
/* @var $this DailyreportController */
/* @var $data Dailyreport */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('viewstaff', 'id'=>$data->id)); ?>
	<br/>

	<b><?php //echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>.:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	

	<b><?php //echo CHtml::encode($data->getAttributeLabel('date_report')); ?>:.</b>
	<?php echo CHtml::encode($data->date_report); ?>
	

	<b><?php //echo CHtml::encode($data->getAttributeLabel('code')); ?></b>
	<?php //echo CHtml::encode($data->code); ?>
	<br />
</div>