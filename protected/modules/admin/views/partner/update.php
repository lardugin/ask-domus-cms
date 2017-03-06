<?php
/* @var $this PartnerController */
/* @var $model Partner */

$this->breadcrumbs=array(
	'Партнеры'=>array('index'),
	$model->title . ' - Обновление',
);

?>

<h1>Обновление партнера <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>