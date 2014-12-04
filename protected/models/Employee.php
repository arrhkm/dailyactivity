<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property string $id
 * @property integer $jopbtitle_id
 * @property string $name
 * @property string $password
 * @property integer $level
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Dailyreport[] $dailyreports
 * @property Jopbtitle $jopbtitle
 */
class Employee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	public $password;//tambahan
	public $password_repeat;//tambahan
	public $old_password;
    public $new_password;
    public $repeat_password;

	public function tableName()
	{
		return 'employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('jobtitle_id, level', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>15),
			array('name, password, email', 'length', 'max'=>45),

			array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
        	array('old_password', 'findPasswords', 'on' => 'changePwd'),
        	array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),        	
        	array('repeat_password', 'compare', 'compareAttribute'=>'password', 'on'=>'create'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, jopbtitle_id, name, password, level, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'dailyreports' => array(self::HAS_MANY, 'Dailyreport', 'employee_id'),
			'jobtitle_id' => array(self::BELONGS_TO, 'Joptitle', 'joptitle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jobtitle_id' => 'Jobtitle',
			'name' => 'Name',
			'password' => 'Password',
			'level' => 'Level',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('jobtitle_id',$this->jobtitle_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),
		));
	}
	public function validatePassword($password){
		//$model= New UserAdmin;
		if ($this->password === md5($password)) 
		return true;
	}

	public function findPasswords($attribute, $params)
    {
        $user = Employee::model()->findByPk(yii::app()->user->id);
        if ($user->password  !== md5($this->old_password))
        {       
            $this->addError($attribute, 'Old password is incorrect.');
        }
    }

    


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
