<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>の欄は必須入力です。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kind'); ?>
		<?php echo $form->textField($model,'kind',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'kind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wan'); ?>
		<?php echo $form->textField($model,'wan'); ?>
		<?php echo $form->error($model,'wan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atesaki'); ?>
		<?php echo $form->textField($model,'atesaki'); ?>
		<?php echo $form->error($model,'atesaki'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model,'misc'); ?>
		<?php echo $form->error($model,'misc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shiharaibi'); ?>
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
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->