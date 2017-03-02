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

	<?php
	$tabs = array(
		'Основное'=>array('content'=>$this->renderPartial('_form_general', compact('model', 'form'), true), 'id'=>'tab-general'),
		'Seo'=>array('content'=>$this->renderPartial('_form_seo', compact('model', 'form'), true), 'id'=>'tab-seo'),
		'Цены'=>array('content'=>$this->renderPartial('_form_price', compact('model', 'form'), true), 'id'=>'tab-price'),
	);

	$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => $tabs,
		'options' => [],
	)); ?>

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