<?php

class GasAlarmController extends Controller
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
				'actions'=>array('create','update','dloc'),
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
		$model=new GasAlarm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->manufacture_date = date('d.m.Y', time());
		
		if(isset($_POST['GasAlarm']))
		{
			$model->attributes=$_POST['GasAlarm'];
			
			/**
			 * Добавление интервала датчиков
			 */
			if($model->interval)
			{
				$start_num = $model->factory_number;
				$end_num   = $model->interval_end;
				$total     = $end_num - $start_num + 1;
				
				$current_num = $start_num;
	
				/**
				 * Сохраняем модель с первым зав. № из интервала.
				 * В $all_saved будем хранить результат сохранения очередной модели.
				 * В случае успешного сохранения всех моделей, перенаправляем
				 * на индексную страницу.
				 */
				$all_saved = $model->save();
				
				while ($current_num != $end_num && $all_saved)
				{
					$model = new GasAlarm;
					$model->attributes=$_POST['GasAlarm'];
					$model->interval = 0;
					
					$current_num++;
					$model->factory_number = $current_num;
					
					$all_saved = $model->save();
				}
				
				if($all_saved)
				{
					/**
					 * Блосаем флеш с сообщением о добавление $total датчиков
					 * с номерами со $start_num по $end_num
					 */
					Yii::app()->user->setFlash(
						'success',
						"Добавлено $total ГС. Заводские номера с $start_num по $end_num"
					);
					
					// Перенаправляем на индексную страницу
					$this->redirect(array('index'));
				}
				 
				
			}
			
			else if($model->save())
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

		$model->manufacture_date = date('d.m.Y', strtotime($model->manufacture_date));
		
		if(isset($_POST['GasAlarm']))
		{
			$model->attributes=$_POST['GasAlarm'];
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('GasAlarm', array(
			'pagination' => array(
				'pageSize' => '25',
			),
		));
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
		
		$model=new GasAlarm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GasAlarm']))
			$model->attributes=$_GET['GasAlarm'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GasAlarm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GasAlarm']))
			$model->attributes=$_GET['GasAlarm'];

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
		$model=GasAlarm::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gas-alarm-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Dynamic location loading
	 */
	public function actionDloc()
	{
		$parent_id = (int) $_POST['GasAlarm']['organization_id'];
		
		$criteria = new CDbCriteria();
		$criteria->order = 'address ASC';
		$criteria->condition = "organization_id = $parent_id";
		
		$data=Location::model()->findAll($criteria);
	    
	    $data=CHtml::listData($data,'id','address');
	    foreach($data as $value=>$name)
	    {
	        echo CHtml::tag('option',
	                   array('value'=>$value),CHtml::encode($name),true);
    }
}
}
