<?php 
Class FormDetilReport extends CFormModel()
{
	//variable fields
	public $dailyreport_id;
	public $listjob;
	public $describejob;

	//rules 
	Public function rules()
	{
		return array(
			array('dailyreport_id, listjob', 'required'),

		);
	}
	public function attributelabels()
	{
		return array(
			array('dailyreport_id'=>'Daily report Id'),
			array('listjob'=> 'List Job'),
			array('describejob'=>'Desribe'),
			);
		);
	}

}


?>