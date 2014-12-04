<?php 
Class FormSetPassword extends CFormModel
{
	//variable fields
	public $id;
	public $password;
	public $name;

	//rules 
	Public function rules()
	{
		return array(
			array('id, password', 'required'),

		);
	}
	public function attributelabels()
	{
		return array(
			array('id'=>'Id'),
			array('password'=> 'Password'),			
			
		);
	}

}


?>