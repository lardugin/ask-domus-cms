<?php
/* @var $this ReviewImageController */
/* @var $model ReviewImage */

$this->breadcrumbs=array(
	'Отзывы (картинки)'=>array('index'),
	$model->title . ' - Обновление',
);

?>

<h1>Обновление отзыва <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>