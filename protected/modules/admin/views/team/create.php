<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Наша команда'=>array('index'),
	'Создание',
);
?>

<h1>Создание</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>