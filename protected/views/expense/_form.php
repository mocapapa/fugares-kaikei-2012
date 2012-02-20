<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-form',
	'enableAjaxValidation'=>false,
	)); ?>

	<p class="note"><span class="required">*</span>の欄は必須入力です。</p>

	<?php echo $form->errorSummary($model); ?>

        <table class="h_all_tl">
	<tr>
	    <td class="bg2" width="20%">
		<?php echo $form->labelEx($model,'kind'); ?>
            </td>
            <td class="bg1l">
		<?php   $b = new Ballance;
			$expenseKind = array();
			foreach($b->expenseKind as $kind) {
				$expenseKind[$kind]=$kind;
			}
		?>
		<?php echo $form->dropDownList($model, 'kind', $expenseKind); ?>
		<?php echo $form->error($model,'kind'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'date'); ?>
            </td>
            <td class="bg1l">
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'name'=>'Expense[date]',
					'language'=>'ja',
					'value'=>$model->date,
					'options'=>array('dateFormat'=>'yy-mm-dd'),
					'htmlOptions'=>array(),
				)
			);
                ?>
		<?php echo $form->error($model,'date'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'amount'); ?>
            </td>
            <td class="bg1l">
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'wan'); ?>
            </td>
            <td class="bg1l">
		<?php echo $form->textField($model,'wan'); ?>
		<?php echo $form->error($model,'wan'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'atesaki'); ?>
            </td>
            <td class="bg1l">
		<?php echo $form->textField($model,'atesaki'); ?>
		<?php echo $form->error($model,'atesaki'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'misc'); ?>
            </td>
            <td class="bg1l">
		<?php echo $form->textField($model,'misc'); ?>
		<?php echo $form->error($model,'misc'); ?>
            </td>
	</tr>

	<tr>
	    <td class="bg2">
		<?php echo $form->labelEx($model,'shiharaibi'); ?>
            </td>
            <td class="bg1l">
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'name'=>'Expense[shiharaibi]',
					'language'=>'ja',
					'value'=>$model->shiharaibi,
					'options'=>array('dateFormat'=>'yy-mm-dd'),
					'htmlOptions'=>array(),
				)
			);
                ?>
		<?php echo $form->error($model,'shiharaibi'); ?>
            </td>
	</tr>
	</table>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? '作成' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->