<?php
/** @var $this feedback\widgets\FeedbackWidget */
/** @var FeedbackFactory $factory */
use common\components\helpers\HYii as Y;

Y::js('feedback'.$this->getHash(),
    'var feedback'.$this->getHash().'=FeedbackWidget.clone(FeedbackWidget);feedback'.$this->getHash().'.init("'.$this->id.'");'
);

?>
<div id="<?php echo $this->id; ?>" class="<?php echo $this->getOption('html', 'class'); ?>">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' =>  $this->getFormId(),
		'action' => $this->getFormAction(),
		'enableClientValidation' => true,
		'enableAjaxValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'validateOnChange' => true,
			'afterValidate' => 'js:feedback' . $this->getHash() . '.afterValidate',
            'errorMessageCssClass' => 'mui-error',
        ),
        'htmlOptions'=>$this->formHtmlOptions,
	)); ?>
	<?php echo CHtml::hiddenField('formId', $this->getFormId()); ?>
	<? if(is_callable($this->onBefore)) call_user_func($this->onBefore, $factory->getModelFactory()->getModel()); ?>

	<?php
	$this->owner->renderPartial($this->view, [
		'factory' => $factory,
		'form' => $form,
		'params' => $this->params,
	]);
	?>

	 <?php $this->endWidget(); ?>
</div>