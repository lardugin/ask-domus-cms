<div class="row">
    <?php echo $form->labelEx($model, 'category_id'); ?>
    <?php echo $form->dropDownList($model, 'category_id', $model->categories, array('class'=>'form-control')); ?>
    <?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textArea($model, 'title', array('class'=>'form-control')); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
   <?$this->widget('admin.widget.Alias.AliasFieldWidget', compact('form', 'model'))?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'description'); ?>
    <?php
        $this->widget('admin.widget.EditWidget.TinyMCE', array(
            'model'=>$model,
            'attribute'=>'description',
            'htmlOptions'=>array('class'=>'big')
        ));
    ?>
    <?php echo $form->error($model,'description'); ?>
</div>

<?php $this->widget('admin.widget.ajaxUploader.ajaxUploader', array(
    'fieldName'=>'images',
    'fieldLabel'=>'Загрузка фото',
    'model'=>$model,
    'tmb_height'=>100,
    'tmb_width'=>100,
    'fileType'=>'image'
)); ?>

<?php $this->widget('admin.widget.ajaxUploader.ajaxUploader', array(
    'fieldName'=>'files',
    'fieldLabel'=>'Загрузка файлов',
    'model'=>$model,
)); ?>





