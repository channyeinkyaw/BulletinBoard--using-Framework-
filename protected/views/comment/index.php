<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Boards'=>array('/Board/index'),
    $_GET['title']=>array('/Board/view', 'id'=>$_GET['id']),
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comment', 'url'=>array('create', 'id'=>$_GET['id'],'title'=>$_GET['title'])),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Comments of <?php echo $_GET['title']?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>