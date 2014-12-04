<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('index')),
	array('label'=>'Create Dailyreport', 'url'=>array('create')),
	array('label'=>'View Dailyreport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dailyreport', 'url'=>array('admin')),
);
?>

<h1>Update Dailyreport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>