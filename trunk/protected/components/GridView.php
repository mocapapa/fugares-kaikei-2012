<?php
Yii::import('zii.widgets.grid.CGridView');
class GridView extends CGridView{
	function init()
	{
		$this->itemsCssClass='h_all_tl" border="0" cellspacing="0" cellpadding="3" width="97%';

		//		print_r($this); exit;

		if(count($this->columns))
		{
			foreach($this->columns as $key=>$column)
			{
				if (is_array($column))
				{
			       		$this->columns[$key]['htmlOptions']=array('class'=>'bg1l');
			       		$this->columns[$key]['headerHtmlOptions']=array('class'=>'bg2');
				} else {
					unset($this->columns[$key]);
					$this->columns[$key]=array(
						'name'=>$column,
						'htmlOptions'=>array('class'=>'bg1l'),
						'headerHtmlOptions'=>array('class'=>'bg2'),
					);
				}
			}
		}
		ksort(&$this->columns);
		//		print_r($this->columns); exit;
		parent::init();
	}
}


