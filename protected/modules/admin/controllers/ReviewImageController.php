<?php
use common\components\helpers\HArray as A;

class ReviewImageController extends AdminController
{
    public function actions()
    {
        return A::m(parent::actions(), [
            'removeImage'=>[
                'class'=>'\common\ext\file\actions\RemoveFileAction',
                'modelName'=>'\ReviewImage',
                'behaviorName'=>'imageBehavior',
                'ajaxMode'=>true
            ],
        ]);
    }

    public function filters()
    {
        return A::m(parent::filters(), [
            'ajaxOnly + removeImage'
        ]);
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ReviewImage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReviewImage']))
		{
			$model->attributes=$_POST['ReviewImage'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReviewImage']))
		{
			$model->attributes=$_POST['ReviewImage'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new ReviewImage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReviewImage']))
			$model->attributes=$_GET['ReviewImage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=ReviewImage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReviewImage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='review-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
