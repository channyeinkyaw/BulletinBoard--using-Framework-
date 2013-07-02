<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
    'Boards'=>array('/Board/index'),
    $_GET['title']=>array('/Board/view', 'id'=>$_GET['id']),
//	'Comments'=>array('index'),
    'Comments'=>array('/Comment', 'id'=>$_GET['id'], 'title'=>$_GET['title']),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Create Comment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>