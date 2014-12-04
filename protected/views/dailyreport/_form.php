<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dailyreport-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id',array('size'=>15,'maxlength'=>15, 'value'=>yii::app()->user->id, 'readOnly'=>true)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_report'); ?>
		<?php //echo $form->textField($model,'date_report',array('size'=>45,'maxlength'=>45)); ?>
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

	<div class="row">
		<?php //echo $form->labelEx($model,'code'); ?>
		<?php //echo $form->textField($model,'code',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->