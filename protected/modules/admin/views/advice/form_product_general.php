<?php
/**
 * @var $model Advice
 */

$breadcrumbs = array();

$breadcrumbs['Советы'] = array('advice/index');

if ($model->category instanceof AdviceCategory) {
	if($ancestors = $model->category->ancestors()->findAll()) {
	  foreach($ancestors as $i=>$cat){
    	$breadcrumbs[$cat->title] = array('advice/category', 'id'=>$cat->id);
	  }
	}

	$breadcrumbs[$model->category->title] = array('advice/category', 'id'=>$model->category->id);
}

if($model->isNewRecord){
  $breadcrumbs[] = 'Создание товара';
}
else {
  $breadcrumbs[] = $model->title . ' - редактирование';
}

$this->breadcrumbs = $breadcrumbs;
?>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'page-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>false
        ),
        'htmlOptions' => array('enctype'=>'multipart/form-data'),
    )); ?>

     <?=$form->errorSummary($model)?>
    

    <?php 
    $tabs = array(
      'Основное'=>array('content'=>$this->renderPartial('_form_product', compact('model', 'form'), true), 'id'=>'tab-general'),
      'Seo'=>array('content'=>$this->renderPartial('_form_product_seo', compact('model', 'form'), true), 'id'=>'tab-seo'),            
    );

    $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=> $tabs,
        'options'=>array()
    )); ?>

    <div class="row buttons">
      <div class="left">
        <?=CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary'))?>
        <?=CHtml::submitButton($model->isNewRecord ? 'Создать и выйти' : 'Сохранить и выйти', array('class'=>'btn btn-info', 'name'=>'saveout'))?>
        <?=CHtml::link('Отмена', array('index'), array('class'=>'btn btn-default')); ?>
      </div>

      <?php if (!$model->isNewRecord): ?>
        <div class="right">
          <a href="<?php echo $this->createUrl('advice/productDelete', array('id'=>$model->id)); ?>"onclick="return confirm('Вы действительно хотите удалить товар?')" class="btn btn-danger">Удалить товар</a>
        </div>
      <?php endif; ?>
      <div class="clr"></div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
