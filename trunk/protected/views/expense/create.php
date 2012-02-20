<?php
$this->breadcrumbs=array(
	'出金',
	'作成',
);

$this->menu=array(
	array('label'=>'出金の管理', 'url'=>array('admin', 'year'=>$_GET['year'])),
);
?>

<h1>出金の作成</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>