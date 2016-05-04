<?php

class TasksController extends Controller
{
	
	public function actionIndex()
	{
		$model=new Tasks;

		// uncomment the following code to enable ajax-based validation
    
		if(isset($_POST['ajax']) && $_POST['ajax']==='tasks-Tasks_form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		
		
		$model_tasks = new Tasks;
		$model_comments = new Comments;
		$model_fio = new Fio;
		$tasks = $model_tasks->findAllBySql("SELECT * FROM tasks ORDER BY done DESC, datepicker ASC");
		$num_comments = array();
		foreach ($tasks as $k => $task) {
			$num_comments[$k] = $model_comments->count("num = :num", array(':num'=>$task->num));
		}
		$done = array('0'=>'', '1'=>'done');
 
        // если запрос асинхронный, то нам нужно отдать только данные
		if(Yii::app()->request->isAjaxRequest){
			$ch=Yii::app()->request->getPost('ch');
			if (isset($ch)) {
				$model_tasks->updateByPk(Yii::app()->request->getPost('num'), array('done'=>$ch));
				//Yii::app()->end();
				$tasks = $model_tasks->findAllBySql("SELECT * FROM tasks ORDER BY done DESC, datepicker ASC");
				$num_comments = array();
				foreach ($tasks as $k => $task) {
					$num_comments[$k] = $model_comments->count("num = :num", array(':num'=>$task->num));
				}
				$this->renderPartial('index', array('tasks'=>$tasks, 'nc'=>$num_comments, 'done'=>$done));
			}
			else {
				$model_tasks->num = 0;
				$model_tasks->task = Yii::app()->request->getPost('task');
				$model_tasks->datepicker = Yii::app()->request->getPost('datepicker');
				$model_tasks->done = 0;
				$model_tasks->save(false);
				$tasks = $model_tasks->findAllBySql("SELECT * FROM tasks ORDER BY done DESC, datepicker ASC");
				$num_comments = array();
				foreach ($tasks as $k => $task) {
					$num_comments[$k] = $model_comments->count("num = :num", array(':num'=>$task->num));
				}
				$this->renderPartial('index', array('tasks'=>$tasks, 'nc'=>$num_comments, 'done'=>$done));
			}	
        }
        else {
            $this->render('index', array('tasks'=>$tasks, 'nc'=>$num_comments, 'done'=>$done));
        }	

	}

	public function actionTask()
	{	
		$model=new Comments;

		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='comments-Comments_Form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    

		if(isset($_POST['Comments']))
		{
			$model->attributes=$_POST['Comments'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		
		
		$model_comments = new Comments;
		$model_tasks = new Tasks;
		$num = Yii::app()->request->getParam('num');
		$comments = $model_comments->findAllBySql("SELECT * FROM comments WHERE num = :num ORDER BY date DESC", array(':num' => $num));
		$task = $model_tasks->findBySql("SELECT * FROM tasks WHERE num = :num", array(':num' => $num));
		//echo $task->task;
		
		if(Yii::app()->request->isAjaxRequest){
			$ch=Yii::app()->request->getPost('ch');
			if (isset($ch)) {
				$model_tasks->updateByPk(Yii::app()->request->getPost('num'), array('done'=>$ch));
				Yii::app()->end();
			}
			else {
				$model_comments->num =  Yii::app()->request->getPost('num');
				$model_comments->comment = Yii::app()->request->getPost('comment');
				$model_comments->date = date("Y-m-d h:i:s");
				$model_comments->name = Yii::app()->request->getPost('name');
				$model_comments->save(false);
				$comments = $model_comments->findAllBySql("SELECT * FROM comments WHERE num = :num ORDER BY date DESC", array(':num' => $num));
				$this->renderPartial('task', array('task'=>$task, 'comments'=>$comments,));
			}
        }
        else {
			$this->render('task', array('task'=>$task, 'comments'=>$comments));
        }
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}