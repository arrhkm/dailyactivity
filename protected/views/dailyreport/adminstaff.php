<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('indexstaff')),
	array('label'=>'Create Dailyreport', 'url'=>array('createstaff')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dailyreport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dailyreports</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dailyreport-grid',
	'dataProvider'=>$model->getSummeryDetil(yii::app()->user->id),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'date_report',
		'code',
		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
	            'view' => array(
	                'label'=>'view',
	                'url'=>'Yii::app()->createUrl("/dailyreport/viewstaff", array("id"=>$data->id))',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/password.png',
	            ),
	            'update' => array(
	                'label'=>'Update',
	                'url'=>'Yii::app()->createUrl("/dailyreport/updatestaff", array("id"=>$data->id))',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/password.png',
	            ),
            ),
            'template'=>'{view}{update}{delete}'
		),
	),
)); ?>
