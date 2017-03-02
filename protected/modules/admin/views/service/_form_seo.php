<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>
<div class="row">
    <?php echo $form->label($model, 'meta_h1'); ?>
    <?php echo $form->textField($model, 'meta_h1', array('class'=>'inline form-control')); ?>
    <?php echo $form->error($model,'meta_h1'); ?>
</div>

<div class="row">
    <?php echo $form->label($model, 'meta_title'); ?>
    <?php echo $form->textField($model, 'meta_title', array('class'=>'inline form-control')); ?>
    <?php echo $form->error($model,'meta_title'); ?>
</div>

<div class="row">
    <?php echo $form->label($model, 'meta_key'); ?>
    <?php echo $form->textArea($model, 'meta_key', array('class'=>'inline form-control')); ?>
    <?php echo $form->error($model,'meta_key'); ?>
</div>

<div class="row">
    <?php echo $form->label($model, 'meta_desc'); ?>
    <?php echo $form->textArea($model, 'meta_desc', array('class'=>'inline form-control')); ?>
    <?php echo $form->error($model,'meta_desc'); ?>
</div>
