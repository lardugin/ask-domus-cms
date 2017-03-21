<?php

use common\components\helpers\HYii as Y;

/** @var \reviews\controllers\DefaultController $this */
/** @var \CActiveDataProvider $dataProvider */

$this->widget('\common\widgets\listing\SizerListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_reviews_item',
	'enableHistory'=>true,
	'sorterHeader'=>'',
	'pagerCssClass'=>'page-pager',
 	'pager'=>array(
 		'class' => 'DLinkPager',
		'header' => '',
		'internalPageCssClass' => '',
		'firstPageCssClass' => 'hidden',
		'lastPageCssClass' => 'hidden',
		'nextPageLabel' => '',
		'prevPageLabel' => '',
		'nextPageCssClass' => 'page-pager__next',
		'previousPageCssClass' => 'page-pager__prev',
		'selectedPageCssClass' => 'active',
		'hiddenPageCssClass' => 'disabled',
		'cssFile' => false,
		'htmlOptions' => array('class'=>'page-pager')
 	),
	'loadingCssClass'=>'loading-content',
	'itemsTagName'=>'div',
	'emptyText' => '',
	'itemsCssClass'=>'reviews-list',
	'sortableAttributes'=>false,
	'id'=>'ajaxListView',
	'sizerHeader'=>'',
	'sizerVariants'=>[15, 30, 60, 120],
	'template'=>'{items}{pager}'
));
?>

<div class="reviews-video-list">
	<div class="reviews-video-list__item">
		<div class="video">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/_CQwhbOfCPk" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="reviews-video-list__item">
		<div class="video">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/cII2E6lP7Cw" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>