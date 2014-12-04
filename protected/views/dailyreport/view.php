<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('index')),
	array('label'=>'Create Dailyreport', 'url'=>array('create')),
	array('label'=>'Update Dailyreport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dailyreport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dailyreport', 'url'=>array('adminstaff')),
	array('label'=>'Create Detil Dailyreport', 'url'=>array('dailyreport/detilreport', 'detil_id'=>$model->id)),
);
?>

<h1>View Dailyreport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'date_report',
		'code',
	),
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
'id'=>'detil-grid',
'dataProvider'=>$model2->getSummeryDetil($model->id),
'summaryText'=>'',
//'pagination'=>array(
        //'pageSize'=>50,
    //),
'columns'=>array(
	array(
	'header'=>'No.', // row is zero based
	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
	'htmlOptions'=>array('width'=>'3%'),
	),
	array(
		'header'=>'listjob',
		'value'=>'$data[\'listjob\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'30%'),
	),
	array(
		'header'=>'describejob',
		'value'=>'$data[\'describejob\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'30%'),
	),
	array(
		'header'=>'duration',
		'value'=>'$data[\'duration\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'30%'),
	),
	/*array(
		'name'=>'Delete',
		'type'=>'raw',
		'value'=>'CHtml::link(X, Yii::app()->controller->createUrl("Dailyreport/DeleteDetil", array("id"=>$data[id], "detil_id"=>$data[dailyreport_id])))',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
	),*/
),
)); 
echo "Total Duration : ".$total_duration;
?> 