<?php

/**
 * This is the model class for table "detilreport".
 *
 * The followings are the available columns in table 'detilreport':
 * @property integer $id
 * @property string $dailyreport_id
 * @property string $listjob
 * @property string $describejob
 *
 * The followings are the available model relations:
 * @property Dailyreport $dailyreport
 */
class Detilreport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $total;
	public function tableName()
	{
		return 'detilreport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('listjob, duration', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('dailyreport_id, listjob', 'length', 'max'=>45),
			array('describejob', 'length', 'max'=>100),
			//array('duration', 'time', 'format'=>'H:m:s'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dailyreport_id, listjob, describejob', 'safe', 'on'=>'search'),
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
			'dailyreport' => array(self::BELONGS_TO, 'Dailyreport', 'dailyreport_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dailyreport_id' => 'Code report',
			'listjob' => 'List Job/ Pekerjaan',
			'describejob' => 'Description/ Ket.',
			'duration' => 'Duration (H:m:s)',
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
		$criteria->compare('dailyreport_id',$this->dailyreport_id,true);
		$criteria->compare('listjob',$this->listjob,true);
		$criteria->compare('describejob',$this->describejob,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getSummeryDetil($dailyreport_id)
	{
		$count=1;
		$sql="
		SELECT *
		FROM detilreport
		WHERE dailyreport_id= '$dailyreport_id'
		";
		// create data provider
		$dataProvider=new CSqlDataProvider($sql, array(
			'totalItemCount'=>$count,
			'sort'=>array(
				'attributes'=>array(
					'id',
					'dailyreport_id',
					'listjob',
					'describejob',		
				),
			),
			'pagination'=>array('pageSize'=>100),
		));
		// return data provider
		return $dataProvider;
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detilreport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
