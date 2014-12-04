<div class="form">
 
<?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'chnage-password-form',
            'enableClientValidation' => true,            
     ));
?>
 
  <div class="row"> 
    <?php echo $form->labelEx($model,'id'); ?> 
    <?php echo $form->textField($model,'id', array('readOnly'=>true)); ?> 
    <?php echo $form->error($model,'id'); ?> 
  </div>
 
  <div class="row"> 
    <?php echo $form->labelEx($model,'password'); ?> 
    <?php echo $form->passwordField($model,'password'); ?> 
    <?php echo $form->error($model,'password'); ?> 
  </div>  
 
  <div class="row submit">
    <?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Change password')); ?>
    <?php echo CHtml::submitButton('Change Password', array('confirm'=>'Are you sure want to change password ?')); ?>
  </div>
  <?php $this->endWidget(); ?>
</div>
<?php echo $msg;?>