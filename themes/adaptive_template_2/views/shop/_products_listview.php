<?
/** @var Product $model */
 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->with('productAttributes')->cardColumns()->visibled()->search(),
	'itemView'=>'_products',
	'sorterHeader'=>'Сортировка:',
	'pagerCssClass'=>'pagination',
	'pager'=>array(
		'class' => 'DLinkPager',
		'maxButtonCount'=>'5',
		'header'=>'',
	),
	'loadingCssClass'=>'loading-content',
	'itemsTagName'=>'div',
	'emptyText' => 'Нет товаров для отображения.',
	'itemsCssClass'=>'adaptive-product__list',
	'sortableAttributes'=>array(
		'title',
		'price',
	),
	'id'=>'ajaxListView',
	'template'=>'{sorter}{items}{pager}<div class="sort-hidden">{sorter}</div>',
));
?>