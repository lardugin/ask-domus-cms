<div class="row">
    <?php echo $form->checkBox($model, 'hidden'); ?>
    <?php echo $form->labelEx($model, 'hidden', array('class'=>'inline')); ?>
    <?php echo $form->error($model, 'hidden'); ?>
</div>

<div class="row">
    <?php echo $form->checkBox($model, 'inner_page'); ?>
    <?php echo $form->labelEx($model, 'inner_page', array('class'=>'inline')); ?>
    <?php echo $form->error($model, 'inner_page'); ?>
</div>

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
    <?php echo $form->labelEx($model, 'subtitle'); ?>
    <?php echo $form->textField($model, 'subtitle', array('class'=>'form-control')); ?>
    <?php echo $form->error($model, 'subtitle'); ?>
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

<div class="row">
    <?php echo $form->labelEx($model, 'price'); ?>
    <?php echo $form->textField($model, 'price', array('class'=>'w10 inline form-control')); ?> руб.
    <?php echo $form->error($model, 'price'); ?>
</div>

<!--<div class="row">
    <?php /*echo $form->checkBox($model, 'notexist'); */?>
    <?php /*echo $form->labelEx($model, 'notexist', array('class'=>'inline')); */?>
    <?php /*echo $form->error($model, 'notexist'); */?>
</div>

<div class="row">
    <?php /*echo $form->checkBox($model, 'new'); */?>
    <?php /*echo $form->labelEx($model, 'new', array('class'=>'inline')); */?>
    <?php /*echo $form->error($model, 'new'); */?>
</div>

<div class="row">
    <?php /*echo $form->checkBox($model, 'sale'); */?>
    <?php /*echo $form->labelEx($model, 'sale', array('class'=>'inline')); */?>
    <?php /*echo $form->error($model, 'sale'); */?>
</div>

<div class="row">
    <?php /*echo $form->checkBox($model, 'hit'); */?>
    <?php /*echo $form->labelEx($model, 'hit', array('class'=>'inline')); */?>
    <?php /*echo $form->error($model, 'hit'); */?>
</div>-->

<div class="row">
    <?php echo $form->checkBox($model, 'service_page'); ?>
    <?php echo $form->labelEx($model, 'service_page', array('class'=>'inline')); ?>
    <?php echo $form->error($model, 'service_page'); ?>
</div>

<div class="row">
    <?php echo $form->checkBox($model, 'on_shop_index'); ?>
    <?php echo $form->labelEx($model, 'on_shop_index', array('class'=>'inline')); ?>
    <?php echo $form->error($model, 'on_shop_index'); ?>
</div>

<div class="row">
    <?php echo CHtml::link('Управление эскизами', array('shop/thumbsUpdate/', 'id' => $model->id)); ?>
</div>


<div class="row">
    <?php echo $form->labelEx($model, 'mainImg'); ?>
    <?php if ($mainImg = $model->getMainImg(true)): ?>
        <div id="mainImg" class="mainImg modelImages">
            <div class="img">
                <a class="remove-icon" href="<?php echo $this->createUrl('shop/removeMainImg'); ?>" onclick="return AdminShop.removeMainImg(<?php echo $model->id; ?>, this);"></a>
                <img src="<?php echo $mainImg; ?>" alt="" />
            </div>
            <p>
                <a class="js-link" onclick="$(this).parents('.row').find(':file').toggleClass('hidden');">Изменить</a>
            </p>
        </div>
    <?php endif; ?>
    <?php echo $form->fileField($model, 'mainImg', $mainImg ? array('class'=>'hidden'): array()); ?>
    <?php echo $form->error($model, 'mainImg'); ?>
    <script type="text/javascript">
        $(function() {
            $('#mainImg .img').hover(function() {
                $(this).toggleClass('hover');
            });
        });
    </script>
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
