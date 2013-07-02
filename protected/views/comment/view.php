<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
    'Boards'=>array('/Board/index'),
	$_GET['title']=>array('/Board/view', 'id'=>$model->board_id),
    'Comments'=>array('/Comment', 'id'=>$model->board_id, 'title'=>$_GET['title']),
	'Comment ID '.$model->id,
);

$this->menu=array(
//	array('label'=>'List Comment', 'url'=>array('index')),
//	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id, 'title'=>$_GET['title'])),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View of Comment ID <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'board_id',
		'contents',
		'created_at',
		'user_name',
	),
)); ?>