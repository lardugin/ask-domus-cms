<?php
/** @var \reviews\widgets\NewReviewForm $this */
/** @var \reviews\models\Review $model */
/**
 * @var $form CActiveForm
 */
 
use common\components\helpers\HArray as A;

?>

<div class="content-form-box">
	<div class="heading-min">Оставьте свой отзыв, ваше мнение для нас очень важно.</div>

	<?php $form=$this->beginWidget('\CActiveForm', [
		'id'=>'review-add-form',
		'action'=>$this->actionUrl,
		'enableClientValidation'=>true,
		'clientOptions'=>[
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'afterValidate'=>'js:Kontur.Reviews.NewReviewFormWidget.submitAddForm'
		],
		'htmlOptions' => [
			'class' => 'content-form',
		]
	]); ?>

		<div class="form-row">
			<div class="mui-input-group">
				<?php echo $form->textField($model,'author',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
				<span class="mui-highlight"></span>
				<span class="mui-bar"></span>
				<?php echo $form->labelEx($model,'author', ['class' => 'mui-label']); ?>
				<?php echo $form->error($model,'author', ['class' => 'mui-error']); ?>
			</div>
		</div>

		<div class="form-row">
			<div class="mui-input-group">
				<?php echo $form->textField($model,'email',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
				<span class="mui-highlight"></span>
				<span class="mui-bar"></span>
				<?php echo $form->labelEx($model,'email', ['class' => 'mui-label']); ?>
				<?php echo $form->error($model,'email', ['class' => 'mui-error']); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="mui-input-group">
				<?php echo $form->textArea($model,'detail_text',array('class' => 'js-input mui-input')); ?>
				<span class="mui-highlight"></span>
				<span class="mui-bar"></span>
				<?php echo $form->labelEx($model,'detail_text', ['class' => 'mui-label']); ?>
				<?php echo $form->error($model,'detail_text', ['class' => 'mui-error']); ?>
			</div>
		</div>
		<div class="form-row_button">
			<button type="submit" class="button button_green button_arrow">Отправить</button>
		</div>
	<? $this->endWidget(); ?>
</div>

<script>
	function submitReviewForm(form, hasError) {
		/*if (!hasError) {
			var message = '<h2 class="text-center">Ваш отзыв отправлен</h2>';

			$('.content-form-box').remove();

			$.fancybox.open({
				content: message
			});
		}*/
	}
</script>