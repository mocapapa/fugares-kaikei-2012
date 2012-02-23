<?php
$year = $_GET['year'];
$this->breadcrumbs=array(
	$year.'年度出金管理'=>array('admin', 'year'=>$year),
);
$this->menu=array(
	array('label'=>'出金の作成', 'url'=>array('create', 'year'=>$year)),
);
?>

<h1>出金の管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'expense-grid',
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
		        'name'=>'atesaki',
			'headerHtmlOptions'=>array('class'=>'bg2'),
                        'htmlOptions'=>array('class'=>'bg1l'),
		      ),
		array(
		        'name'=>'misc',
			'headerHtmlOptions'=>array('class'=>'bg2'),
                        'htmlOptions'=>array('class'=>'bg1l'),
		      ),
		array(
		        'name'=>'shiharaibi',
			'headerHtmlOptions'=>array('class'=>'bg2'),
                        'htmlOptions'=>array('class'=>'bg1l'),
		      ),
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
