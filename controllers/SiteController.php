<?php

namespace app\controllers;

use Yii;
use \yii\web\Controller;
use \yii\base\HttpException;

use app\models\Post;

/**
 * SiteController
 * This class provides a demonstration of a simple blog application
 */
class SiteController extends Controller
{
	/**
	 * This method returns a list of all models in the database
	 */
	public function actionIndex()
	{
		$data = Post::find()->all();
		echo $this->render('index', array(
			'data' => $data
		));
	}

	/**
	 * This method handles the creation of new posts
	 */
	public function actionCreate()
	{
		$model = new Post;
		if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['site/index']);
		}
		
		echo $this->render('create', array(
			'model' => $model
		));
	}

	/**
	 * This method handles updating our model
	 * @param int $id    The $id we want to use
	 */
	public function actionUpdate($id)
	{
		$model = Post::find()->where(['id'=>$id])->One();

		if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(array('site/read', 'id' => $model->id));
		}
		echo $this->render('create', array(
			'model' => $model
		));
	}

	/**
	 * This action provides functionality to read data from a particular model
	 * @param  int $id    The ID of our model 
	 */
	public function actionRead($id)
	{
		$post = Post::find()->where(['id'=>$id])->One();
		echo $this->render('read', array(
			'post' => $post
		));
	}

	/**
	 * This method provides functionality to delete a post
	 * @param  int $id delete
	 */
	public function actionDelete($id)
	{
		$post = Post::find()->where(['id'=>$id])->One();
		$post->delete();
		
		return $this->redirect(array('site/index'));
	}
}