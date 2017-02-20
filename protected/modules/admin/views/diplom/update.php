<?php
/* @var $this DiplomController */
/* @var $model Diplom */

$this->breadcrumbs=array(
	'Дипломы'=>array('index'),
	$model->title . ' - Обновление',
);

?>

<h1>Обновление диплома <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>