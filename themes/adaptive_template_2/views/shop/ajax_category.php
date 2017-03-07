<?php
/**
 * @var $products Product[]
 * @var $pages CPagination
 * @var $category Category
 */

echo "<title>". CHtml::encode(Yii::app()->controller->pageTitle)."</title>\n";
?>

<?php $this->widget('\ext\D\breadcrumbs\widgets\Breadcrumbs', array('breadcrumbs' => $this->breadcrumbs->get())); ?>

<?php
$this->renderPartial('_category_content', [
	'products' => $products,
	'pages' => $pages,
	'category' => $category,
]);
?>
