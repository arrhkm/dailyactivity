<?php

/**
 * This is the model class for table "dailyreport".
 *
 * The followings are the available columns in table 'dailyreport':
 * @property string $id
 * @property string $employee_id
 * @property string $date_report
 * @property string $code
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Detilreport[] $detilreports
 */
class Dailyreport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $name;
	public function tableName()
	{
		return 'dailyreport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_report', 'required'),
			array('employee_id, date_report', 'ECompositeUniqueValidator'),
			array('id, date_report, code', 'length', 'max'=>45),
			array('employee_id', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, date_report, code, name', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
			'detilreports' => array(self::HAS_MANY, 'Detilreport', 'dailyreport_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_id' => 'Employee',
			'date_report' => 'Date Report',
			'code' => 'Code',
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

		//$crt->alias = 'a';
		//$crt->select= 'a.id, a.employee_id, a.date_report, b.name';
		//$crt->join = " JOIN ". Employee::model()->tablename()." as b ON b.id=a.employee_id";

		$criteria->alias = 'a';
		$criteria->select= 'a.id, a.employee_id, a.date_report, b.name';
		$criteria->join = " JOIN ". Employee::model()->tablename()." as b ON b.id=a.employee_id";
		$criteria->compare('a.id',$this->id,true);
		$criteria->compare('a.employee_id',$this->employee_id,true);
		$criteria->compare('a.date_report',$this->date_report,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('b.name', $this->name, true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	public function getSummeryDetil($employee_id)
	{
		/*$count=1;
		$sql="
		SELECT *
		FROM dailyreport
		WHERE employee_id= '$employee_id'
		";
		// create data provider
		$dataProvider=new CSqlDataProvider($sql, array(
			'totalItemCount'=>$count,
			'sort'=>array(
				'attributes'=>array(
					'id',
					'employee_id',
					'date_report',
					'code',		
				),
			),
			'pagination'=>array('pageSize'=>20,),
		));
		// return data provider
		return $dataProvider;
		*/
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('date_report',$this->date_report,true);
		$criteria->compare('code',$this->code,true);
		$criteria->condition='employee_id=:employee_id';
		$criteria->params = array(':employee_id'=>$employee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	} 

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dailyreport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
