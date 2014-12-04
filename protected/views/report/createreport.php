<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_report'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name'=>'date_report',
				'model'=>$model,'attribute'=>'date_report', 'value'=> date('Y-m-d'), 
				//'htmlOptions'=>array('style'=>'height:20px;', 'syle'=>'width:5px;'),
				'options'=>array('dateFormat'=>'yy-mm-dd', 'showButtonPanel'=>true, 'showAnim' =>'slide'),
			));
		?>

		<?php echo $form->error($model,'date_report'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
			echo CHtml::submitButton('Print to Excel'); 
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 

echo "Date report :". $model->date_report;