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
    <div class="mui-input-group">
        <?php $factory->getModelFactory()->getAttributes()['phone']->getModel()->widget($factory, $form, $params); ?>
    </div>

    <button type="submit" class="button button_green button_arrow" onclick="yaCounter38644505.reachGoal('CALLBACK')">Обсудить проект</button>
</div>
