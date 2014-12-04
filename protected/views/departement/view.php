<?php
/* @var $this DepartementController */
/* @var $model Departement */

$depart= Departement::model()->findByPk($model->id);
$this->breadcrumbs=array(
	'Departements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Departement', 'url'=>array('index')),
	array('label'=>'Create Departement', 'url'=>array('create')),
	array('label'=>'Update Departement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Departement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Departement', 'url'=>array('admin')),
	array('label'=>'Add List Job '.$depart->name, 'url'=>array('departement/jobtitle', 'departement_id'=>$model->id)),
);
?>

<h1>View Departement #<?php echo $depart->name." - ".$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>


<?php 
$model2= new Jobtitle;
$this->widget('zii.widgets.grid.CGridView', array(
'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
'id'=>'detil-grid',
'dataProvider'=>$model2->getSummeryDetil($model->id),
'summaryText'=>'',
'columns'=>array(
	array(
	'header'=>'No.', // row is zero based
	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
	'htmlOptions'=>array('width'=>'3%'),
	),
	array(
		'header'=>'Id',
		'value'=>'$data[\'id\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
	),
	array(
		'header'=>'Departement Id',
		'value'=>'$data[\'departement_id\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
	),
	array(
		'header'=>'Name',
		'value'=>'$data[\'name\']',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'30%'),
	),
	array(
		'name'=>'Delete',
		'type'=>'raw',
		'value'=>'CHtml::link(X, Yii::app()->controller->createUrl("departement/deletejobtitle", array("id"=>$data[id], "detil_id"=>$data[departement_id])))',
		'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
	),
	
),
)); ?> 
