<?php

/**
 * This is the model class for table "jobtitle".
 *
 * The followings are the available columns in table 'jobtitle':
 * @property integer $id
 * @property integer $departement_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Employee[] $employees
 * @property Departement $departement
 */
class Jobtitle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jobtitle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departement_id', 'required'),
			array('id, departement_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, departement_id, name', 'safe', 'on'=>'search'),
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
			'employees' => array(self::HAS_MANY, 'Employee', 'jopbtitle_id'),
			'departement' => array(self::BELONGS_TO, 'Departement', 'departement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'departement_id' => 'Departement',
			'name' => 'Name',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('departement_id',$this->departement_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeValidate() 
	{
		parent::beforeValidate();
	   	$date = new DateTime();
	   	if($this->isNewRecord)
	   	{
	    	$criteria=new CDbCriteria;      //kita menggunakan criteria untuk mengetahui nomor terakhir dari database
	     	$criteria->select = 'id';   //yang ingin kita lihat adalah field "nilai1"
	     	$criteria->limit=1;             // kita hanya mengambil 1 buah nilai terakhir
		    $criteria->order='id DESC';  //yang dimbil nilai terakhir
		    $last = $this->find($criteria);
	     	if($last)   // jika ternyata ada nilai dalam data tersebut maka nilai nya saat ini tinggal di tambah 1 dari data sebelumya
	     	{
		       $newID = (int)$last->id+ 1;
		       //$newID = 'sabit-'.$newID;
	     	}
	     	else  //jika ternyata pada tabel terebut masih kosong, maka akan di input otomatis nilai "sabit-1" karena memang belum ada sebelumnya nilai lain
	     	{
	       		$newID = 1;
	     	}
	     	$this->id=$newID; // nilai1 di set nilai yang sudah di dapat tadi
	  	} 
	  	return true;
	}

	public function getSummeryDetil($departement_id)
	{
		$count=1;
		$sql="
		SELECT *
		FROM jobtitle
		WHERE departement_id= '$departement_id'
		";
		// create data provider
		$dataProvider=new CSqlDataProvider($sql, array(
			'totalItemCount'=>$count,
			'sort'=>array(
				'attributes'=>array(
					'id',
					'departement_id',
					'name',						
				),
			),
			'pagination'=>array('pageSize'=>20,),
		));
		// return data provider
		return $dataProvider;
	} 

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jobtitle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
