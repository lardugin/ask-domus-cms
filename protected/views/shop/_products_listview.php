<?
/** @var Product $model */
 
$this->widget('widget.listView.DSizerListView', array(
	'dataProvider'=>$model->with('productAttributes')->cardColumns()->visibled()->search(),
	'itemView'=>'_products',
	'viewData'=>compact('category'),
	'enableHistory'=>true,
	'sorterHeader'=>'Сортировка:',
	'pagerCssClass'=>'pagination',
	'pager'=>[
		'class' => 'DLinkPager',
		'maxButtonCount'=>'5',
		'header'=>'',
	],
	'loadingCssClass'=>'loading-content',
	'itemsTagName'=>'div',
	'emptyText' => '<div class="category-empty">Нет товаров для отображения.</div>',
	'itemsCssClass'=>'product-list',
	'sortableAttributes'=>[
		'title',
		'price',
	],
	'id'=>'ajaxListView',
	'sizerHeader'=>'Показать: ',
	'sizerVariants'=>[15, 30, 60, 120],
	//'template'=>'{sizer}{sorter}{items}{pager}{sizer}<div class="sort-hidden">{sorter}</div>', // with sizer 
	'template'=>'{sorter}{items}{pager}<div class="sort-hidden">{sorter}</div>',
));
?>