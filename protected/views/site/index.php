<h3>表示</h3>
<?php
echo CHtml::link('2007年度', array('site/show', 'year'=>2007));
?>
<br />
<?php
echo CHtml::link('2008年度', array('site/show', 'year'=>2008));
?>
<br />
<?php
echo CHtml::link('2009年度', array('site/show', 'year'=>2009));
?>
<br />
<?php
echo CHtml::link('2010年度', array('site/show', 'year'=>2010));
?>
<br />
<?php
echo CHtml::link('2011年度', array('site/show', 'year'=>2011));
?>
<br />
<?php
echo CHtml::link('2012年度', array('site/show', 'year'=>2012));
?>
<br />
<br />
<br />


<h3>管理</h3>
<?php
echo CHtml::link('入金の管理(2012年度)', array('income/admin', 'year'=>2012));
?>
<br />
<?php
echo CHtml::link('出金の管理(2012年度)', array('expense/admin', 'year'=>2012));
?>
<br />
