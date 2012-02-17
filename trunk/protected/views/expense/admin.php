<?php
$this->breadcrumbs=array(
	'出金',
	'管理',
);

$this->menu=array(
	array('label'=>'出金の作成', 'url'=>array('create', 'year'=>$_GET['year'])),
);

?>

<h1>出金の管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'expense-grid',
	'enableSorting'=>false,
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'kind',
		'date',
		'amount',
		'wan',
		'atesaki',
		'misc',
		'shiharaibi',
		// 'timestamp',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/expense/view", array("id" => $data["id"],                  
                                "year"=>$_GET["year"],                                                                      
                        ))',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/expense/delete", array("id" =>  $data["id"],             
                                "year"=>$_GET["year"],                                                                      
                        ))',
                        'updateButtonUrl'=>'Yii::app()->createUrl("/expense/update", array("id" =>  $data["id"],             
                                "year"=>$_GET["year"],                                                                      
                        ))',
		),
	),
)); ?>
