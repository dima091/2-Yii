<?php
/* @var $this InfoController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Surname'); ?>
		<?php echo $form->textArea($model,'Surname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'index'); ?>
		<?php echo $form->textField($model,'index'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work'); ?>
		<?php echo $form->textField($model,'work'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->