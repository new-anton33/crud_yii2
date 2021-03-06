<?php
namespace app\models;
use \yii\db\Expression;

class Post extends \yii\db\ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array primary key of the table
	 **/	 
	public static function primaryKey()
	{
		return array('id');
	}

	public function rules()
	{
		return [
			[['title', 'authors', 'published'], 'required'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'authors' => 'Авторы',
			'published' => 'Опубликовано',
			'created' => 'Добавлено',
			'updated' => 'Обновлено',
		);
	}

	/**
	 * Autoincriment the tale id
	 * @param  [type] $insert [description]
	 * @return [type]         [description]
	 */
	public function beforeSave($insert)
	{
		if ($this->isNewRecord)
			$this->created = new Expression('NOW()');
		$this->updated = new Expression("NOW()");
		return parent::beforeSave($insert);
	}
}
