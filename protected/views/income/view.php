<?php
$this->breadcrumbs=array(
	'入金',
	'表示',
);

$this->menu=array(
	  array('label'=>'入金の作成', 'url'=>array('create', 'year'=>$_GET['year'])),
	  array('label'=>'入金の修正', 'url'=>array('update', 'id'=>$model->id, 'year'=>$_GET['year'])),
	  array('label'=>'入金の削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'year'=>$_GET['year']),'confirm'=>'この項目を削除してよろしいですか?')),
	  array('label'=>'入金の管理', 'url'=>array('admin', 'year'=>$_GET['year'])),
);
?>

<h1>入金の表示 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array(
		'class'=>'h_all_tl',
		'border'=>'0',
		'cellpadding'=>'3',
		'cellspacing'=>'0',
		'width'=>'90%',
	),
        'itemTemplate'=>'<tr><th class="bg2">{label}</th><td class="bg1l">{value}</td></tr>'."\n",
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kind',
		'date',
		'name',
		'amount',
		'wan',
		'misc',
		'timestamp',
	),
)); ?>
