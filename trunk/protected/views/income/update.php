<?php
$this->breadcrumbs=array(
	'入金',
	'修正',
);

$this->menu=array(
	array('label'=>'入金の作成', 'url'=>array('create', 'year'=>$_GET['year'])),
	array('label'=>'入金の表示', 'url'=>array('view', 'id'=>$model->id, 'year'=>$_GET['year'])),
	array('label'=>'入金の管理', 'url'=>array('admin', 'year'=>$_GET['year'])),
);
?>

<h1>入金の修正 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>