<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	'Создание',
);
?>

<h1>Добавиление услуги</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>