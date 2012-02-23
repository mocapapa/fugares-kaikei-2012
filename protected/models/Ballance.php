<?php

class Ballance {

	public $incomeKind = array(
		'募金',
		'フリマ',
		'オークション',
		'里親負担金',
		'利息',
		'その他',
	);

	public $expenseKind = array(
		'医療費',
		'会議費',
		'交通費',
		'通信費',
		'消耗什器備品費',
		'トリミング代',
		'支払手数料',
		'車両燃料費',
		'フード費',
		'火葬供養費',
		'保険衛生費',
		'配送費',
		'返金',
		'その他',
	);

	public $totalI = array(); // 期間収入
	public $totalE = array(); // 期間支出
	public $accountS;         // 期首残高
	public $accountE = 0;     // 期末残高
	public $countKind;        // 行数

	public function init()
	{
		foreach ($this->incomeKind as $kind) {
			$this->totalI[$kind] = 0;
		}
		foreach ($this->expenseKind as $kind) {
			$this->totalE[$kind] = 0;
		}
		$ci = count($this->incomeKind);
		$ce = count($this->expenseKind);
		$this->countKind = ($ci >= $ce) ? $ci : $ce;
	}

	/*
	 * year : ex. 2010
	 * month: 1-12
	 *     if (month > 12) month -= 12; year++;
	 */
	public function calcMonth($year, $month)
	{
		$fyear = $year;
		if ($month > 12) {
			$month -= 12;
			$year++;
		}

		$current = $this->accountS = $this->accountE;
		$query = "Date >= '$year-$month-01' and Date < '$year-".($month+1)."-01'";

		// 繰越が先頭に無い場合の救済
		$dataIs = Income::model()->findAll($query.' and kind = "繰越"');
		$dataIs = array_merge($dataIs, Income::model()->findAll($query.' and kind != "繰越"'));
		$dataEs = Expense::model()->findAll($query);

		foreach ($dataIs as $dataI) {
			if ($dataI['kind'] == '繰越') {
				$current = $this->accountS = $dataI['amount'];
				continue;
			}
			if (in_array($kind = $dataI['kind'], $this->incomeKind)) {
				$this->totalI[$kind] += $dataI['amount'];
			} else {
				$this->totalI['その他'] += $dataI['amount'];
			}
			$current += $dataI['amount'];
		}

		foreach ($dataEs as $dataE) {
			if (in_array($kind = $dataE['kind'], $this->expenseKind)) {
				$this->totalE[$kind] += $dataE['amount'];
			} else {
				$this->totalE['その他'] += $dataE['amount'];
			}
			$current -= $dataE['amount'];
		}
		$this->accountE = $current;
	}
}	   