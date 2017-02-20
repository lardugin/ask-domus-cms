<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Услуги на главной'=>array('index'),
	$model->title . ' - Обновление',
);

?>

<h1>Обновление услуги <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>