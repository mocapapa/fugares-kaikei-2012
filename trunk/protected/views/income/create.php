<?php
$this->breadcrumbs=array(
	'入金',
	'作成',
);

$this->menu=array(
	array('label'=>'入金の管理', 'url'=>array('admin', 'year'=>$_GET['year'])),
);
?>

<h1>入金の作成</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>