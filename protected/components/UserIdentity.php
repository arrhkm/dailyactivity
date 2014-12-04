<?php

class UserIdentity extends CUserIdentity
{
   	private $_id;
 	private $level;
 	
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Employee::model()->find('LOWER(id)=?',array($username));  // here I use Email as user name which comes from database
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{
			//successfull
			
			$this->_id = $user->id;
			$this->username = $user->name;
			$this->level = $user->level;
			$this->setState('level', $user->level); //untuk memanggil level di database menggunakan EWebUser.php nanti
			$this->errorCode = self::ERROR_NONE;
			}
		return $this->errorCode == self::ERROR_NONE;
	}
	public function getId()       //  override Id
	{
	   return $this->_id;
	}
	
}
?>