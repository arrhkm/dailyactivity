<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
	$model->id=>array('viewstaff','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('indexstaff')),
	array('label'=>'Create Dailyreport', 'url'=>array('createstaff')),
	array('label'=>'View Dailyreport', 'url'=>array('viewstaff', 'id'=>$model->id)),
	array('label'=>'Manage Dailyreport', 'url'=>array('adminstaff')),
);
?>

<h1>Update Dailyreport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>