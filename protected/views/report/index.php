<?php
/* @var $this ReportController */

$this->breadcrumbs=array(
	'Report',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<i class="fa fa-print"></i>

<?php echo CHtml::linkButton('Print to Excel',array(
   'submit'=>array('CreateExcel', 'date_report'=>'2014-11-27'),       
   'confirm'=>"Are you sure want converting this file to excel extention (*.xls) file ?",
)); 