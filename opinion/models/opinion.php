<?php

use yupe\models\YModel;

Yii::import('application.modules.opinion.events.OpinionEvent');
Yii::import('application.modules.opinion.events.OpinionEvents');
Yii::import('application.modules.opinion.helpers.OpinionHelper');

/**
 * This is the model class for table "{{store_opinion}}".
 *
 * The followings are the available columns in table '{{store_opinion}}':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $email
 * @property integer $phone
 * @property integer $city_id
 * @property integer $experience
 * @property string $advantage
 * @property string $limitations
 * @property string $comment
 * @property integer $status_opinion
 * @property integer $rating
 * @property integer $product_id
 * @property integer $dateCreate
 * @property integer $rating_opinion
 * @property string $moderation_decision
 */
class opinion extends yupe\models\YModel
{
    /**
	 * @return string the associated database table name
	 */

	public function tableName()
	{
		return '{{store_opinion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('name, surname, patronymic, email, experience, advantage, limitations, comment, status_opinion, rating, dateCreate, moderation_decision, rating_opinion, product_id, city_id' , 'required'),
			array('email', 'email'),
            array('phone, city_id, experience, status_opinion, rating, product_id', 'numerical', 'integerOnly'=>true),
			array('rating','checkSizeRating'),
			array('name, surname, patronymic, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('id, name, surname, patronymic, email, phone, city_id, experience, advantage, limitations, comment, rating, rating_opinion, product_id, dateCreate, status_opinion', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Ваше имя*',
			'surname' => 'Ваша фамилия*',
			'patronymic' => 'Ваше отчество*',
			'email' => 'Ваш Email*',
			'phone' => 'Телефон*',
			'city_id' => 'Ваш город*',
			'experience' => 'Опыт использования*',
			'advantage' => 'Достоинства*',
			'limitations' => 'Недостатки*',
			'comment' => 'Комментарий*',
			'status_opinion' => 'Status Opinion',
			'rating' => 'Оценка',
			'product_id' => 'Product',
			'dateCreate' => 'Дата создания',
			'rating_opinion' => 'Оценка отзыва',
            'moderation_decision' => 'Решение модератора',
            'product_id' => 'id товара'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('patronymic',$this->patronymic,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('advantage',$this->advantage,true);
		$criteria->compare('limitations',$this->limitations,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status_opinion',$this->status_opinion);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('dateCreate',$this->dateCreate);
		$criteria->compare('rating_opinion',$this->rating_opinion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return opinion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
