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
	'itemsCssClass'=>'h_all_tl" border="0" cellspacing="0" cellpadding="3" width="97%',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                array(
		      'name'=>'id',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l'),
		),
                array(
		      'name'=>'kind',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l'),
		),
                array(
		      'name'=>'date',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l'),
		),
                array(
		      'name'=>'amount',
		      'value'=>'number_format($data->amount)',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l',
					   'style'=>'text-align:right;'),
		),
		array(
		      'name'=>'wan',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l'),
		),
		array(
		      'name'=>'misc',
		      'headerHtmlOptions'=>array('class'=>'bg2'),
		      'htmlOptions'=>array('class'=>'bg1l'),
		),
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
