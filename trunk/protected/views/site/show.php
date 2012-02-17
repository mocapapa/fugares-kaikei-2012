<?php
$year = $_GET['year'];
$this->breadcrumbs=array(
	'Site'=>array('/site'),
	$year.'年度'=>array('/site/show', 'year'=>$year),
);?>
<font size="-2">

<?php

$this->widget('zii.widgets.jui.CJuiTabs', array(
	'tabs'=>array(
		'4月度'=>contents($year, 4),
		'5月度'=>contents($year, 5),
		'6月度'=>contents($year, 6),
		'7月度'=>contents($year, 7),
		'8月度'=>contents($year, 8),
		'9月度'=>contents($year, 9),
		'10月度'=>contents($year, 10),
		'11月度'=>contents($year, 11),
		'12月度'=>contents($year, 12),
		'1月度'=>contents($year, 13),
		'2月度'=>contents($year, 14),
		'3月度'=>contents($year, 15),
		'上半期'=>contentsUpper($year),
		'下半期'=>contentsLower($year),
		'年度'=>contentsYear($year),

	),
	// additional javascript options for the tabs plugin
));


function contents($year, $month)
{
	$ballance = new Ballance();
	$ballance->init();
	if ($month > 4) {
		for ($m = 4; $m <= $month-1; $m++) {
			$ballance->calcMonth($year, $m);
			$ballance->cont();
		}
	}
	$ballance->init();
	$ballance->calcMonth($year, $month);
	$accountS = $ballance->accountS;
	return cont_exec(
		'月度収支表',
		$year,
		$month,
		$year,
		$month,
		$ballance->totalI,
		$ballance->totalE,
		$ballance->countKind,
		$accountS,
		$ballance->accountE
	);
}


function contentsUpper($year)
{
	$ballance = new Ballance();
	$ballance->init();
	for ($m = 4; $m <= 9; $m++) {
		$ballance->calcMonth($year, $m);
		if ($m == 4) $accountS = $ballance->accountS;
                $ballance->cont();
	}
	return cont_exec(
		'上半期収支表',
		$year,
		4,
		$year,
		9,
		$ballance->totalI,
		$ballance->totalE,
		$ballance->countKind,
		$accountS,
		$ballance->accountE
	);
}

function contentsLower($year)
{
	$ballance = new Ballance();
	$ballance->init();
	for ($m = 4; $m <= 9; $m++) {
		$ballance->calcMonth($year, $m);
                $ballance->cont();
	}
	$ballance->init();
	for ($m = 10; $m <= 15; $m++) {
		$ballance->calcMonth($year, $m);
		if ($m == 10) $accountS = $ballance->accountS;
                $ballance->cont();
	}
	return cont_exec(
		'下半期収支表',
		$year,
		10,
		$year + 1,
		3,
		$ballance->totalI,
		$ballance->totalE,
		$ballance->countKind,
		$accountS,
		$ballance->accountE
	);
}

function contentsYear($year)
{
	$ballance = new Ballance();
	$ballance->init();
	for ($m = 4; $m <= 15; $m++) {
		$ballance->calcMonth($year, $m);
		if ($m == 4) $accountS = $ballance->accountS;
		$ballance->cont();
        }
	return cont_exec(
		'年度収支表',
		$year,
		4,
		$year+1,
		3,
		$ballance->totalI,
		$ballance->totalE,
		$ballance->countKind,
		$accountS,
		$ballance->accountE
	);
}


function cont_exec(
	$title,
	$yearS,
	$monthS,
	$yearE,
	$monthE,
	$dataI,
	$dataE,
	$count,
	$accountS,
	$accountE)
{
	$cont = $title.'<br /><br />
<font size="-2">
';
	if ($monthS > 12) {
		$monthS -= 12;
		$yearS++;
	}
	if ($monthE > 12) {
		$monthE -= 12;
		$yearE++;
	}
	
	$cont .= "(${yearS}年${monthS}月1日〜";
	if ($yearS == $yearE) $cont .= date("n月d日)", mktime(0,0,0, $monthE+1, 0, $yearE));
	else $cont .= date("Y年n月d日)", mktime(0,0,0, $monthE+1, 0, $yearE));
	
	$cont .= '
<table style="width:60%">
  <tr>
    <td colspan="2" class="dark" style="text-align:center;" width="50%">収入の部</th>
    <td colspan="2" class="dark" style="text-align:center;" width="50%">支出の部</th>
  </tr>
  <tr>
    <td class="dark" style="text-align:center;">適用</th>
    <td class="dark" style="text-align:center;" width="20%">金額</th>
    <td class="dark" style="text-align:center;">適用</th>
    <td class="dark" style="text-align:center;" width="20%">金額</th>
  </tr>
';

	$totalI = $totalE = 0;
	for ($i = 1; $i <= $count; $i++)  {

		list($keyI, $valueI) = each($dataI);
		list($keyE, $valueE) = each($dataE);
		$totalI += $valueI;
		$totalE += $valueE;
		
		$cont .= '<tr>';

		if ($keyI != null) 
			$cont .=  "<td class=\"white\">$keyI</td><td class=\"white\" style=\"text-align:right;\">". number_format_c($valueI)."</td>\n";
		else 
			$cont .=  "<td class=\"white\">&nbsp;</td><td class=\"white\">&nbsp;</td>\n";
		
		if ($keyE != null) 
			$cont .=  "<td class=\"white\">$keyE</td><td class=\"white\" style=\"text-align:right;\">". number_format_c($valueE)."</td>\n";
		else 
			$cont .=  "<td class=\"white\">&nbsp;</td><td class=\"white\">&nbsp;</td>\n";
		
		$cont .= '
  </tr>
';

	}

	$cont .= '
  <td height="1px" class="white" valign="top" colspan="4"></td></tr>
  <tr>
  <td class="light">期間収入</td><td class="light" style="text-align:right;" >'. number_format_c($totalI) .'</td>
  <td class="light">期間支出</td><td class="light" style="text-align:right;">'. number_format_c($totalE). '</td>
  </tr>
  <td height="1px" class="white" valign="top" colspan="4"></td></tr>
  <tr>
  <td colspan="3" class="light">期間収支</td><td class="light" style="text-align:right;">'. number_format_c($totalI-$totalE). '</td>
  </tr>
  <tr>
  <td colspan="3" class="yellow">期首残高</td><td class="yellow" style="text-align:right;">'. number_format_c($accountS). '</td>
  </tr>
  <tr>
  <td height="1px" class="white" valign="top" colspan="4"></td></tr>
  <td colspan="3" class="light">期末残高</td><td class="light" style="text-align:right;">'. number_format_c($accountE). '</td>
  </tr>
</table>
</font>
';

	return $cont;
}

function number_format_c($x) {
	$y = number_format($x);
	if ($x >= 0) return $y;
	else return "<font color=\"red\">$y</font>";
}

?>
</font>