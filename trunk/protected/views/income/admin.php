<?php
$this->breadcrumbs=array(
	'入金',
	'管理',
);

$this->menu=array(
	array('label'=>'入金の作成', 'url'=>array('create', 'year'=>$_GET['year'])),
);

?>

<h1>入金の管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'income-grid',
        'enableSorting'=>false,
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'kind',
		'date',
		'name',
		'amount',
		'wan',
		'misc',
		//'timestamp',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/income/view", array("id" => $data["id"],
				"year"=>$_GET["year"],
			))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/income/delete", array("id" =>  $data["id"],
				"year"=>$_GET["year"],
			))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/income/update", array("id" =>  $data["id"],
				"year"=>$_GET["year"],
			))',
		),
	),
));
