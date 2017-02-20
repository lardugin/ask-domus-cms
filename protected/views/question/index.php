<?php
/**
 * @var $list Question[]
 * @var $form CActiveForm
 * @var $model Question
 */

CHtml::$errorContainerTag = 'span';

?>

<h1 class="heading">Вопрос-ответ</h1>

<div class="faq-page">
    <div class="heading-min">Частые вопросы:</div>
    <div class="fag-accordion">

        <?php foreach($list as $item): ?>
            <?php if (empty($item->answer)) continue; ?>

            <div class="fag-accordion__item">
                <div class="fag-accordion__item-head">
                    <div class="fag-accordion__item-head_inner">
                        <?= strip_tags($item->question, '<br><br/>') ?>
                    </div>
                </div>
                <div class="fag-accordion__item-text">
                    <div class="fag-accordion__item-text_inner">
                        <?= strip_tags($item->answer, '<br><br/>') ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="content-form-box">
        <div class="heading-min">Задайте Ваш вопрос и мы обязательно ответим на него.</div>

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'question-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange'=>false,
                'afterValidate'=>'js: function(form, data, hasError) {submitForm(form, hasError);}',
                'errorMessageCssClass' => 'mui-error',
            ),
            'htmlOptions' => [
                'class' => 'content-form',
            ],
        )); ?>
        <div class="form-row">
            <div class="mui-input-group">
                <?php echo $form->textField($model,'username',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
                <span class="mui-highlight"></span>
                <span class="mui-bar"></span>
                <?php echo $form->labelEx($model,'username', ['class' => 'mui-label']); ?>
                <?php echo $form->error($model,'username', ['class' => 'mui-error']); ?>
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
                <?php echo $form->textArea($model,'question',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
                <span class="mui-highlight"></span>
                <span class="mui-bar"></span>
                <?php echo $form->labelEx($model,'question', ['class' => 'mui-label']); ?>
                <?php echo $form->error($model,'question', ['class' => 'mui-error']); ?>
            </div>
        </div>

        <div class="form-row_button">
            <button type="submit" class="button button_green button_arrow">Отправить</button>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

<script type="text/javascript">
    function submitForm(form, hasError) {
        $.post($(form).attr('action'), $(form).serialize(), function(data) {
            var message = '';

            if (data == 'ok') {
                message = '<h2 class="text-center">Ваш вопрос отправлен</h2>';
                $('.content-form-box').hide();
            } else {
                message = '<h2 class="text-center">При отправке вопроса возникла ошибка</h2>';
            }

            $.fancybox.open({
                content: message
            });
        });
        if (!hasError) {
        }
    }
</script>
