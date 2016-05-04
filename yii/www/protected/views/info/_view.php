<?php
/* @var $this InfoController */
/* @var $data Info */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('index')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->index), array('view', 'id'=>$data->index)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Surname')); ?>:</b>
	<?php echo CHtml::encode($data->Surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work')); ?>:</b>
	<?php echo CHtml::encode($data->work); ?>
	<br />


</div>