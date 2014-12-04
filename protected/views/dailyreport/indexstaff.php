<?php
/* @var $this DailyreportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dailyreports',
);

$this->menu=array(
	array('label'=>'Create Dailyreport', 'url'=>array('createstaff')),
	array('label'=>'Manage Dailyreport', 'url'=>array('adminstaff')),
);
?>

<h1>Dailyreports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewstaff',
)); ?>
