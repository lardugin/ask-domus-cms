<?php
/* @var $this PartnerController */
/* @var $model Partner */

$this->breadcrumbs=array(
	'Партнеры'=>array('index'),
	'Создание',
);
?>

<h1>Создание партнера</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>