<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('indexstaff')),
	array('label'=>'Manage Dailyreport', 'url'=>array('adminstaff')),
);
?>

<h1>Create Dailyreport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>