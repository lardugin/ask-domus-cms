<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Наша команда'=>array('index'),
	$model->title . ' - Обновление',
);

?>

<h1>Обновление сотрудника <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>