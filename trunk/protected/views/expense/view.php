<?php
$year = $_GET['year'];
$this->breadcrumbs=array(
	$year.'年度出金管理'=>array('admin', 'year'=>$year),
	'表示'=>array('view', 'id'=>$model->id, 'year'=>$year),
);
$this->menu=array(
	array('label'=>'出金の作成', 'url'=>array('create', 'year'=>$year)),
	array('label'=>'出金の修正', 'url'=>array('update', 'id'=>$model->id, 'year'=>$year)),
	array('label'=>'出金の削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'year'=>$year),'confirm'=>'この項目を削除してよろしいですか?')),
	array('label'=>'出金の管理', 'url'=>array('admin', 'year'=>$year)),
);
?>

<h1>出金の表示 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array(
		'class'=>'h_all_tl',
		'border'=>'0',
		'cellpadding'=>'3',
		'cellspacing'=>'0',
		'style'=>'width:50%;',
	),
        'itemTemplate'=>'<tr><th class="bg2">{label}</th><td class="bg1l">{value}</td></tr>'."\n",
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kind',
		'date',
		array(
			'name'=>'amount',
			'type'=>'number',
		),
		'wan',
		'atesaki',
		'misc',
		'shiharaibi',
		'timestamp',
	),
)); ?>
