<?php
/* @var $this ReviewImageController */
/* @var $model ReviewImage */

$this->breadcrumbs=array(
	'Отзывы (картинки)'=>array('index'),
	'Создание',
);
?>

<h1>Создание отзыва</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>