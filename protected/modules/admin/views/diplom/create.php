<?php
/* @var $this DiplomController */
/* @var $model Diplom */

$this->breadcrumbs=array(
	'Дипломы'=>array('index'),
	'Создание',
);
?>

<h1>Создание диплома</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>