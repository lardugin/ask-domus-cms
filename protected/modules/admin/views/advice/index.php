<?php $this->pageTitle = 'Советы'; ?>
<?php
    $this->breadcrumbs=array(
    	'Советы' => array('advice/index')
    );
?>

<h1>Советы</h1>

<?php $this->renderPartial('_categories', compact('categories')); ?>
<?php #$this->renderPartial('_products', compact('products')); ?>
