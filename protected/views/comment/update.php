<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
    'Boards'=>array('/Board/index'),
    $_GET['title']=>array('/Board/view', 'id'=>$model->board_id),
    'Comments'=>array('/Comment', 'id'=>$model->board_id, 'title'=>$_GET['title']),
	'Comment ID '.$model->id=>array('view', 'id'=>$model->id, 'title'=>$_GET['title']),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Comment', 'url'=>array('index')),
//	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'View Comment', 'url'=>array('/Comment', 'id'=>$model->board_id, 'title'=>$_GET['title'])),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Update Comment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>