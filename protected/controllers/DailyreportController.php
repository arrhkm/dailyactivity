<?php

class DailyreportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('indexstaff','viewstaff', 'createstaff', 'updatestaff', 'delete','detilreport', 'updatedetil', 'deletedetil', 'adminstaff'),
				'expression'=>'$user->isStaff()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'view', 'create', 'update', 'delete', 'admin','delete', 'detilreport', 'updatedetil', 'deletedetil', 'indexstaff', 'viewstaff', 'createstaff', 'updatestaff', 'deletestaff',  'adminstaff'),
				//'users'=>array('admin'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$crt= New CDbCriteria();
		$crt->select =  '*, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total ';
		$crt->condition = 'dailyreport_id = :id';
		$crt->group = 'dailyreport_id';
		
		$crt->params = array('id' => $id);
		$total=Detilreport::model()->find($crt);

		$model2= New Detilreport;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model2'=>$model2,
			'total_duration'=>$total->total,d
		));
	}
	public function actionViewStaff($id)
	{
		
		$crt= New CDbCriteria();
		$crt->select =  '*, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total ';
		$crt->condition = 'dailyreport_id = :id';
		$crt->group = 'dailyreport_id';
		//$criteria->order = 'priority_id DESC, max_added_on DESC';
		$crt->params = array('id' => $id);
		$total=Detilreport::model()->find($crt);

		$model2= New Detilreport;

		$this->render('viewstaff',array(
			'model'=>$this->loadModel($id),
			'model2'=>$model2,
			'total_duration'=>$total->total,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Dailyreport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailyreport']))
		{
			$code1= $_POST['Dailyreport']['employee_id'];
			//$code1= yii::app()->user->id;
			$code2= $_POST['Dailyreport']['date_report'];
			$code="$code1-$code2";
			
			$model->attributes=$_POST['Dailyreport'];
			$model->id= $code;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreateStaff()
	{
		$model=new Dailyreport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailyreport']))
		{
			$code1= $_POST['Dailyreport']['employee_id'];
			//$code1= yii::app()->user->id;
			$code2= $_POST['Dailyreport']['date_report'];
			$code="$code1-$code2";
			
			$model->attributes=$_POST['Dailyreport'];
			$model->id= $code;
			if($model->save())
				$this->redirect(array('viewstaff','id'=>$model->id));
		}

		$this->render('createstaff',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailyreport']))
		{
			$model->attributes=$_POST['Dailyreport'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionUpdateStaff($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailyreport']))
		{
			$model->attributes=$_POST['Dailyreport'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('updatestaff',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model2=Detilreport::model()->findByAttributes(array('dailyreport_id'=>$id));
		$model2->delete();
		$this->loadModel($id)->delete();


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Dailyreport');
		
		/*$connect= yii::app()->db;
		$sql= "
			SELECT a.*, b.name
			FROM dailyreport a, employee b
			WHERE b.id= a.employee_id
		";
		$rawEmpJoin = $connect->createCommand($sql)->queryAll();
		$dataProvider= New CActiveDataProvider($rawEmpJoin, array(
			'sort'=>array(
				'attributes'=>array(
					'id', 'employee_id', 'date_report', 'code', 'name' 
				),
			),
			'pagination'=>array('pageSize'=>10,),

		));*/
	
		$crt= New CDbCriteria;
		$crt->alias='a';
		$crt->select= 'a.id, a.employee_id, a.date_report, a.code, b.name';
		$crt->join= "join ". Employee::model()->tableName(). " as b ON (b.id= a.employee_id)";

		$dataProvider = new CActiveDataProvider('Dailyreport', array(
			'criteria'=>$crt,
			'pagination'=>array('pageSize'=>20,),    	
			
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionIndexStaff()
	{
		//$dataProvider=new CActiveDataProvider('Dailyreport');

		$criteria = new CDbCriteria;
		$criteria->select = array('id, employee_id', 'date_report',);
		$criteria->condition = 'employee_id=:id';
		$criteria->order = 'id Desc';
		$criteria->params = array(':id'=>yii::app()->user->id);
		$dataProvider=new CActiveDataProvider('Dailyreport', array(
		    'criteria'=>$criteria,		    
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

		$this->render('indexstaff',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dailyreport('search');
		
		//$crt= new CDbCriteria;
		//$crt->alias = 'a';
		//$crt->select= 'a.id, a.employee_id, a.date_report, b.name';
		//$crt->join = " JOIN ". Employee::model()->tablename()." as b ON b.id=a.employee_id";

		//$model = Dailyreport::model()->find($crt);

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dailyreport']))
			$model->attributes=$_GET['Dailyreport'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdminStaff()
	{
		$model = Dailyreport::model()->findByAttributes(array('employee_id'=>yii::app()->user->id));
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dailyreport']))
			$model->attributes=$_GET['Dailyreport'];

		$this->render('adminstaff',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Dailyreport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dailyreport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDetilreport()
	{
    	$NewDetil=new Detilreport;
    	$model2= New Detilreport;
    	$dailyreport_id= $_REQUEST['detil_id'];

    	$crt= New CDbCriteria();
		$crt->select =  '*, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total ';
		$crt->condition = 'dailyreport_id = :id';
		$crt->group = 'dailyreport_id';
		//$criteria->order = 'priority_id DESC, max_added_on DESC';
		$crt->params = array('id' => $_REQUEST['detil_id']);
		$total=Detilreport::model()->find($crt);
    

		if(isset($_POST['Detilreport']))
		{
	        $NewDetil->attributes=$_POST['Detilreport'];
	        $NewDetil->dailyreport_id=$dailyreport_id;
	        if($NewDetil->validate())
	        {
	            // form inputs are valid, do something here
	            //return;
	            if ($NewDetil->save())
	            {
	            	$this->redirect(array('viewstaff', 'id'=>$dailyreport_id));
	            }
	        }
	    }

	    $this->render('detilreport',array(
	    	'detil'=>$NewDetil, 
	    	'dailyreport_id'=>$dailyreport_id, 
	    	'model2'=>$model2, 
	    	'total_duration'=>$total->total,
	    ));
	}

	public function actionUpdateDetil($id, $dailyreport_id)
	{
		$model2= New Detilreport;
		$detil=Detilreport::model()->findByAttributes(array('id'=>$id));
		
		$crt= New CDbCriteria();
		$crt->select =  '*, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total ';
		$crt->condition = 'dailyreport_id = :id';
		$crt->group = 'dailyreport_id';
		//$criteria->order = 'priority_id DESC, max_added_on DESC';
		$crt->params = array('id' => $dailyreport_id);
		$total=Detilreport::model()->find($crt);



		if(isset($_POST['Detilreport']))
		{
			$detil->attributes=$_POST['Detilreport'];
			if($detil->save())
			{
				$this->redirect(array('viewstaff','id'=>$dailyreport_id));
			}

		}
		$this->render('detilreport', array(
			'detil'=>$detil, 
	    	'dailyreport_id'=>$dailyreport_id, 
	    	'detil_id'=>$dailyreport_id,
	    	'model2'=> $model2, 
	    	'total_duration'=>$total->total,

		));
	}

	public function actionDeleteDetil()
	{
		if (isset($_REQUEST['id']))
		{

			$sql_del = "DELETE FROM detilreport WHERE id= '$_REQUEST[id]'";
			$connect = yii::app()->db;
			$connect->createCommand($sql_del)->query();
		}
		//$test->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('detilreport', 'detil_id'=>$_REQUEST[detil_id]));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dailyreport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dailyreport-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
