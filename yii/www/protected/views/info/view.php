<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->index,
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Update Info', 'url'=>array('update', 'id'=>$model->index)),
	array('label'=>'Delete Info', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->index),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>View Info #<?php echo $model->index; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Surname',
		'age',
		'index',
		'work',
	),
)); ?>
