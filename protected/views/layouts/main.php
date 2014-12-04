<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<!-- div id="mainmenu" -->
	<div id="mainMbMenu">
	<?php 
		$this->widget('application.extensions.mbmenu.MbMenu', array(			
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'Gii', 'url'=>array('gii/')),
				array('label'=>'Change Password', 'url'=>array('Employee/changepassword/', 'id'=>yii::app()->user->id)),				
				array('label'=>'Staff', 'url'=>array('#'), 'items'=>array(
					array('label'=>'Daily Report Staff', 'url'=>array('dailyreport/indexstaff')),
					
				)),
				array('label'=>'Admin', 'url'=>array('#'), 'items'=>array(					
					array('label'=>'Master', 'url'=>array('#'), 'items'=> array(
						array('label'=>'Employee (Staff)', 'url'=>array('Employee/')),
						array('label'=>'Departement', 'url'=>array('departement/')),
					)),
					array('label'=>'Create Report ', 'url'=>array('report/createreport')),
					array('label'=>'Daily Report Admin', 'url'=>array('dailyreport/admin/')),
					
					
				)),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php 
		//echo "<br>level User : ".Yii::app()->user->getRoleName();
		//echo "<br>Id User : ".Yii::app()->user->id;		
	 ?>
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo '2014'; ?> by IT PT. LINTECH.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); 
		echo "Powered By TEAM HRD Lintech";?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
