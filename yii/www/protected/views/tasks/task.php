<?php
/* @var $this TasksController */

$this->breadcrumbs=array(
	'Tasks'=>array('/tasks'),
	'Task',
);
?>
<div id='comments'>
<center>
<h1>
<?php echo CHtml::link('СПИСОК ЗАДАЧ', $this->createUrl('/tasks'), array());?>
</h1>
<?php
	echo CHtml::CheckBox('ch',$task->done,array('num'=>$task->num)).$task->task." ". $task->datepicker;
?>
<table cellpadding='7' cellspacing='0' class='ui-widget'>
	<tr>
		<th>Автор</th>
		<th>Коментарий</th>
		<th>Дата</th>
	</tr>
	<?php 
		if (!empty($comments)) {
			foreach ($comments as $k => $comment) {
				echo "<tr ".$clss."><td>".$comment->name."</td><td>".wordwrap($comment->comment, 65, "<br />\n")."</td><td>".$comment->date."</td></tr>";
			}
		}
		else {
			echo "<tr><td colspan=3><h1>КОМЕНТАРИИ ОТСУТСТВУЮТ</h1></td></tr>";
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
	
	
	<div class="form">
	<?php $model=new Comments; ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'comments-Comments_Form-form',
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

	<?php echo $form->hiddenField($model,'num', array('value' => $task->num)); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment'); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить', array(
			'id' => 'button',
			'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'));  ?>
	</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
	

<script>
	$(document).ready(function() {
		var a, b;
		$("#comments").delegate(
			"input[type='checkbox']",
			"click",
			function(e) {
				a=$(e.target).attr("checked"); 
				if (typeof a !== typeof undefined && a !== false) {
					b=0;
					$(e.target).removeAttr("checked");
				}
				else {
					b=1;
					$(e.target).attr("checked","checked");
				}
				$.post("http://www.yii/index.php/tasks/task", {ch: b, num: $(e.target).attr("num")});
			}
		);
	});
	
	$('#button').click(function() {
		if ($('#Comments_name').val() !== '' && $('#Comments_comment').val() !== '' && $('.error').length == 0) {
			$("#comments").load("http://www.yii/index.php/tasks/task", {num: $('#Comments_num').val(), name: $('#Comments_name').val(), comment: $('#Comments_comment').val()});
			$('#Comments_comment').val('');
			return false;
		}
	});
</script>