<?php
/** @var \feedback\widgets\types\StringTypeWidget $this */
/** @var FeedbackFactory $factory */
/** @var string $name attribute name. */
?>

<?php echo $form->textField($factory->getModelFactory()->getModel(), $name, array(
	'class' => 'js-input mui-input',
	'placeholder' => ''
));
?>
<span class="mui-highlight"></span>
<span class="mui-bar"></span>
<?php echo $form->labelEx($factory->getModelFactory()->getModel(), $name, [
	'class' => 'mui-label'
]); ?>

<?php echo $form->error($factory->getModelFactory()->getModel(), $name, ['class' => 'mui-error']); ?>
