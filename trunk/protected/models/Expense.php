<?php

/**
 * This is the model class for table "expense2011".
 *
 * The followings are the available columns in table 'expense2011':
 * @property integer $id
 * @property string $kind
 * @property string $date
 * @property integer $amount
 * @property string $wan
 * @property string $atesaki
 * @property string $misc
 * @property string $shiharaibi
 * @property string $timestamp
 */
class Expense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Expense2011 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'expense'.$_GET['year'];
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kind, date, amount, shiharaibi, atesaki', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('kind', 'length', 'max'=>21),
			array('misc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kind, date, amount, wan, atesaki, misc, shiharaibi, timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'kind' => '種別',
			'date' => '出金日付',
			'amount' => '金額',
			'wan' => '犬名',
			'atesaki' => '支払先',
			'misc' => '備考',
			'shiharaibi' => '支払日',
			'timestamp' => '更新日時',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('kind',$this->kind,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('wan',$this->wan,true);
		$criteria->compare('atesaki',$this->atesaki,true);
		$criteria->compare('misc',$this->misc,true);
		$criteria->compare('shiharaibi',$this->shiharaibi,true);
		$criteria->compare('timestamp',$this->timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>100),
		));
	}
}