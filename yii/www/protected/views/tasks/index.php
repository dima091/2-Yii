<?php
/* @var $this TasksController */

$this->breadcrumbs=array(
	'Tasks',
);
?>
<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>
<div id='tasks'>
<center>
<table cellpadding='7' cellspacing='0' class='ui-widget'>
	<tr>
		<th colspan=3><h1>СПИСОК ЗАДАЧ</h1></th>
	</tr>
	<tr>
		<th>Задача</th>
		<th>Дедлайн</th>
		<th>Кол-во коментарией</th>
	</tr>
	<?php 
		foreach ($tasks as $k => $task) {
			echo "<tr ".$clss.">
				<td>".CHtml::CheckBox('ch', $task->done, array( 'num' => $task->num)).CHtml::link($task->task,array('tasks/task', 'num' => $task->num), array('class'=>$done[$task->done]))."</td>
				<td>".$task->datepicker."</td>
				<td>".$nc[$k]."</td>
			</tr>";
		}
	?>

	</table>
</center>
</div>
	
<?php
	
	if(Yii::app()->request->isAjaxRequest){
		Yii::app()->end();
	}
?>

<!--<input type="text" id="datepicker" name="deadline">-->



<div class="form">
<?php $model=new Tasks;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tasks-Tasks_form-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation' => true,
	'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>true,
    ),
	
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textField($model,'task'); ?>
		<?php echo $form->error($model,'task'); ?>
	</div>
	<div class="row">
	<?php
		echo $form->labelEx($model,'datepicker');
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'Tasks[datepicker]',
		'options'=>array(
			'showAnim' => 'fold',
			'model' => $model,
			'dateFormat' => 'yy-mm-dd',
		),
		'htmlOptions'=>array(
			'style' => 'height:20px;',
			'id' => 'Tasks_datepicker'
		),	
		));
		echo $form->error($model,'datepicker'); 
	?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить', array(
		'id' => 'button',
		'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only')); 
		?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$(document).ready(function() {
		var a, b;
		$("#tasks").delegate(
			"input[type='checkbox']",
			"click",
			function(e) {
				a=$(e.target).attr("checked"); 
				if (typeof a !== typeof undefined && a !== false) {
					b=0;
				}
				else {
					b=1;
				}
				$("#tasks").load("http://www.yii/index.php/tasks", {ch: b, num: $(e.target).attr("num")});
			}
		);
	});
	
	$('#button').click(function() {
		if ($('#Tasks_task').val() !== '' && $('#Tasks_datepicker').val() !== '' && $('.error').length == 0) {
			$("#tasks").load("http://www.yii/index.php/tasks", {task: $('#Tasks_task').val(), datepicker: $('#Tasks_datepicker').val()});
			return false;
		}
	});
</script>
