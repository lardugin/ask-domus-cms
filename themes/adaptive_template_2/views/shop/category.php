<?php
/**
 * @var $products Product[]
 * @var $pages CPagination
 * @var $category Category
 */
?>

<?php
$this->renderPartial('_category_content', [
	'products' => $products,
	'pages' => $pages,
	'category' => $category,
]);
?>