<?php
/**
 * @var $model AdviceCategory
 * @var $form CActiveForm
 */
?>

<div class="row">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title', array('class'=>'form-control')); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
    <?$this->widget('admin.widget.Alias.AliasFieldWidget', compact('form', 'model'))?>
</div>
