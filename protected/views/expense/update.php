<?php
$year = $_GET['year'];
$this->breadcrumbs=array(
	$year.'年度出金管理'=>array('admin', 'year'=>$year),
	'修正'=>array('update', 'id'=>$model->id, 'year'=>$year),
);
$this->menu=array(
	array('label'=>'出金の作成', 'url'=>array('create', 'year'=>$year)),
	array('label'=>'出金の表示', 'url'=>array('view', 'id'=>$model->id, 'year'=>$year)),
	array('label'=>'出金の管理', 'url'=>array('admin', 'year'=>$year)),
);
?>

<h1>出金の修正 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>