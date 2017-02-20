<?
/** @var boolean $modeRelatedHidden режим без отображения привязанных товаров */

use AttributeHelper as A;

\Yii::app()->getModule('common');  

/** @var boolean $isIndexPage главная страница каталога */
$isIndexPage=YiiHelper::isAction($this,'shop','index');
$modeRelatedHidden=(!empty($modeRelatedHidden) && $modeRelatedHidden);
?>

<? if(!$modeRelatedHidden) $this->widget('\ext\D\sort\widgets\Sortable', [
	'category'=>'shop_category',
    'key'=>empty($category) ? null : $category->id,
    'actionUrl'=>$this->createUrl('saveProductSort'),
    'selector'=>'#product-list'
]); ?>

<script type="text/javascript">
$(document).ready(function() {
    $("#site-menu").disableSelection();
});

</script>
<? if($isIndexPage): ?>
<h2>Товары на главной странице</h2>
<?endif?>
<div id="product-list-module">
  <?php if (count($products)): ?>
  <ul id="product-list" class="product-list row">
    <?php foreach($products as $product): ?>
    <li id="item_<?php echo $product->id ?>" data-sort-id="<?= $product->id; ?>" class="col-xs-3<? if(!$isIndexPage && ($product->category_id <> $category->id)) echo ' bg-warning'; ?><? if($product->hidden) echo ' mark-hidden'; ?>">
      <div class="product thumbnail">
        <div class="img">
          <a href="<?php echo $this->createUrl('shop/productUpdate', array('id'=>$product->id)); ?>"><img src="<?php echo $product->mainImg; ?>" alt="" /></a>
        </div>
        <div class="caption">
          <p class="title" title="<?php echo $product->title ?>"><?php echo Chtml::link($product->title, array('shop/productUpdate', 'id'=>$product->id)); ?></p>
          <div class="price_change btn btn-default btn-sm">
            <span class="price" title="Изменить цену"><?php echo $product->price; ?></span> руб.
            <div class="price_cotainer_change">
              <input type="text" class="price_val form-control">
              <div style="margin-top:7px;">
                <button data-id="<?php echo $product->id; ?>" class="price_status btn btn-primary btn-xs pull-right">Сохранить</button>
              </div>
            </div>
          </div>
          <a class="btn btn-danger btn-sm pull-right" href="<?=$this->createUrl('shop/productDelete', array('id'=>$product->id)); ?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить товар?')">Удалить</a>

        </div> 
      </div>  
    </li>
    <?php endforeach; ?>
  </ul>
  <? if(!$isIndexPage && !$modeRelatedHidden && ($category->productCount != $category->getProductsCount())): ?>
  <div class="well well-sm">
	<span class="label bg-warning table-bordered" style="color:#000">Цвет фона карточки</span> привязанного товара
  </div>
  <? endif; ?>
  <?php else: ?>
    <p>Нет товаров</p>
  <?php endif; ?>
</div>


    