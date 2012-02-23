<?php
$year = $_GET['year'];
$this->breadcrumbs=array(
	$year.'年度入金管理'=>array('admin', 'year'=>$year),
	'作成'=>array('create', 'year'=>$year),
);
$this->menu=array(
	array('label'=>'入金の管理', 'url'=>array('admin', 'year'=>$year)),
);
?>

<h1>入金の作成</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>