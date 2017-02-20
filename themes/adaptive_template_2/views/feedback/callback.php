<?php
/**
 * @var $factory feedback\components\FeedbackFactory
 * @var $form CActiveForm
 * @var $params array
 */

$attributes = $factory->getModelFactory()->getAttributes();

CHtml::$errorContainerTag = 'span';

?>

<div class="feedback-body">
    <div class="form-row">
        <div class="mui-input-group">
            <?php $factory->getModelFactory()->getAttributes()['name']->getModel()->widget($factory, $form, $params); ?>
        </div>
    </div>

    <div class="form-row">
        <div class="mui-input-group">
            <?php $factory->getModelFactory()->getAttributes()['email']->getModel()->widget($factory, $form, $params); ?>
        </div>
    </div>

    <div class="form-row">
        <div class="mui-input-group">
            <?php $factory->getModelFactory()->getAttributes()['phone']->getModel()->widget($factory, $form, $params); ?>
        </div>
    </div>

    <div class="form-row_button">
        <button class="button button_green button_arrow">Отправить</button>
    </div>
</div>
