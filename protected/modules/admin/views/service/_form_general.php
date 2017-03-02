<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="row">
    <?php echo $form->labelEx($model,'title'); ?>
    <?php echo $form->textField($model,'title',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'title'); ?>
</div>

<div class="row">
    <?$this->widget('admin.widget.Alias.AliasFieldWidget', compact('form', 'model'))?>
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
    <?php echo $form->labelEx($model,'sort'); ?>
    <?php echo $form->textField($model,'sort',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'sort'); ?>
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

<?php if ($model->isNewRecord): ?>
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
<?php endif; ?>
