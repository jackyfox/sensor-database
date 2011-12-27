<?php

class CheckController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'gasAlarmContext + create', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Check;
		$model->date = date('d.m.Y', time());
		$model->gas_alarm_id = $this->_gas_alarm->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Check']))
		{
			$model->attributes=$_POST['Check'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		$model->date = date('d.m.Y', strtotime($model->date));
		
		if(isset($_POST['Check']))
		{
			$model->attributes=$_POST['Check'];
			if($model->save())
				$this->redirect(array('gasAlarm/view','id'=>$model->gas_alarm_id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('Check');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		/**
		 * Настраиваем переменную с количеством строк на странице
		 */
		if (isset($_GET['pageSize'])) {
			// pageSize устанавливается как параметр пользователя
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
		}
		
		$model=new Check('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Check']))
			$model->attributes=$_GET['Check'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Check('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Check']))
			$model->attributes=$_GET['Check'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Check::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='check-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
/**
	 * @var Возвращает газосигнализатор, к которому относится данное
	 * техобслуживание
	 */
	private $_gas_alarm = null;
	
	/**
	 * Метод загружает связанный газосигнализатор,
	 * @gas_alarm_id — идентификатор связанного газосигнализатора
	 * @return Объект модели GasAlarm на основе первичного ключа
	 */
	protected function loadGasAlarm($gas_alarm_id)
	{
		if ($this->_gas_alarm === null)
		{
			$this->_gas_alarm = GasAlarm::model()->findByPk($gas_alarm_id);
			if ($this->_gas_alarm === null)
			{
				throw new CHttpException(404, "Такого ГС нет в базе");
			}
		}
		return $this->_gas_alarm;
	}
	
	/**
	 * Фильтр подстановки газосигнализатора при создании
	 */
	public function filterGasAlarmContext($filterChain)
	{
		$gas_alarmID = null;
		if (isset($_GET['ga_id']))
			$gas_alarmID = $_GET['ga_id'];
		else
			if (isset($_POST['ga_id']))
				$gas_alarmID = $_POST['ga_id'];

		$this->loadGasAlarm($gas_alarmID);
		
		$filterChain->run();
	}
}
