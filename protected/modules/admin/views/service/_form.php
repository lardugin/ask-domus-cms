<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>['enctype'=>'multipart/form-data'],
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<? $this->widget('\common\ext\file\widgets\UploadFile', [
		'behavior'=>$model->imageBehavior,
		'form'=>$form,
		'actionDelete'=>$this->createAction('removeImage'),
		'tmbWidth'=>200,
		'tmbHeight'=>200,
		'view'=>'panel_upload_image'
	]); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row buttons">
		<div class="left">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
		</div>

		<?php if (!$model->isNewRecord): ?>
		<div class='left'>
		<a class='btn btn-danger delete-b' href="<?=$this->createUrl('/cp/service/delete', array("id"=>$model->id))?>"
		onclick="return confirm('Вы действительно хотите удалить запись?');">
			<span>Удалить</span></a>
		</div>
		<?php endif; ?>
		<div class="clr"></div>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->