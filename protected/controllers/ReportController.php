<?php

class ReportController extends Controller
{
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
			
			array('allow',
				'actions'=>array('admin', 'delete', 'index', 'view', 'create', 'update', 'CreateExcel', 'createreport'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCreateExcel()
	{
		Yii::import('ext.phpexcel.Classes.XPHPExcel');    
		      $objPHPExcel= XPHPExcel::createPHPExcel();
		      $objPHPExcel->getProperties()->setCreator("Marraf Hakam")
		                             ->setLastModifiedBy("M. Arrfah Hakam")
		                             ->setTitle("Office 2007 XLSX Test Document")
		                             ->setSubject("Office 2007 XLSX Test Document")
		                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		                             ->setKeywords("office 2007 openxml php")
		                             ->setCategory("Test result file");
		 
		 
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'id')
		            ->setCellValue('B1', 'Name')
		            ->setCellValue('C1', 'kd_report')
		            ->setCellValue('D1', 'date_report')
		            ->setCellValue('E1', 'Total Durasi');
		            
		 
		// Miscellaneous glyphs, UTF-8
		
		//$data = $this->loadModel($_REQUEST[id]);
		$connect1 = Yii::app()->db;
		
		$sqlDetil="
			SELECT c.id, c.name, a.id as kd_report, a.date_report, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as total_durasi
			FROM dailyreport a JOIN detilreport b ON(b.dailyreport_id= a.id) 
			RIGHT JOIN employee c ON(a.employee_id= c.id) AND a.date_report= '$_REQUEST[date_report]'
			WHERE c.id!='admin'						
			GROUP BY c.id
		";
		
		$cmdDetil= $connect1->createCommand($sqlDetil);
		$dataDetil= $cmdDetil->queryAll();	
		
		//$rows = array ('number', 'jm_number', 'project Des', 'mp', 'wt', 'ot', 'pt', 'ptel', 'psafety', 'tjam', 'tmsker', 
			//'pjamsos', 'pkasbon', 'biaya', 'total');

		/*$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A4', 'Miscellaneous glyphs')
		            ->setCellValue('A5', 'Ã©Ã Ã¨Ã¹Ã¢ÃªÃ®Ã´Ã»Ã«Ã¯Ã¼Ã¿Ã¤Ã¶Ã¼Ã§');*/
		$rowNumber=4;
		//for ($i=1; $i<=10;$i++)
		foreach ($dataDetil as $key=>$row)
		{

			$id= $row[id];
			$name = $row[name]; 
			$kd_report= $row[kd_report];
			$total_durasi= $row[total_durasi];
			$date_report= $row[date_report];
			

			$rows = array(
				$id, $name, $kd_report, $total_durasi, $date_report);
			$col = 'A'; //start from column
			foreach($rows as $cell) {
				$objPHPExcel->getActiveSheet(0)->setCellValue($col.$rowNumber,$cell);
				$col++;
			}
			$rowNumber++;
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Daily Activities Report');
		 
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		 
		 
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT+07'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
	}
	public function actionCreateReport()
	{
		$model= New ReportForm;
		if (isset($_POST['ReportForm']))
		{
			$model->attributes= $_POST['ReportForm'];
			$this->redirect(array('createexcel', 'date_report'=>$model->date_report));
		}

		$this->render('createreport', array ('model'=>$model));
	}

	
}