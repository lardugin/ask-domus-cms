<?php CmsHtml::fancybox(); ?>
<h1><?=$product->getMetaH1()?></h1>

<div class="product-page adaptive-product-page">
  <div class="options">
    <div class="images">
		<?$fMark=function($attrs) use (&$product, &$fMark) { return ($attr=array_shift($attrs)) ? ($product->$attr ? " {$attr}" : $fMark($attrs)) : ''; };?>
        <div class="main-img<?=$fMark(array('sale','new','hit'))?>">
            <?if($product->getFullImg(true)):?>
            	<?=CHtml::link(
            		CHtml::image($product->bigMainImg, $product->alt_title?:$product->title, array('title'=>$product->alt_title?:$product->title)), 
            		$product->fullImg,
            		array('class'=>'image-full', 'rel'=>'group')
            	)?>
            <?else:?>
            	<?=CHtml::image($product->bigMainImg, $product->alt_title?:$product->title, array('title'=>$product->alt_title?:$product->title))?>
            <?endif?>
        </div>

        <ul class="more-images">
        <tr>
            <?foreach($product->moreImages as $id=>$img):?>
            <li>
                <a class="image-full" rel="group" href="<?=$img->url?>" title="<?=$img->description?>"><?=CHtml::image($img->tmbUrl, $img->description)?></a>
            </li>
            <?endforeach?>
        </tr>
        </ul>
    </div>
    
    <?if(!empty($product->brand_id)):?>
    <div class="product-brand">
        Бренд: <strong><?=$product->brand->title?></strong>
    </div>
    <?endif?>
    <?if(!empty($product->code)):?>
    <div class="product-code">
        Артикул: <strong><?=$product->code?></strong>
    </div>
    <?endif?>

    <?if(!empty($product->description)):?>
    <div class="description">
        <?=$product->description?>
    </div>
    <?endif?>

  <?if(D::yd()->isActive('shop') && (int)D::cms('shop_enable_attributes') && count($product->productAttributes)):?>
      <div class="product-attributes">
        <ul>
          <?php foreach ($product->productAttributes as $productAttribute):?>
            <li><span><?=$productAttribute->eavAttribute->name;?></span><span><?=$productAttribute->value;?></span></li>
          <?php endforeach;?>
        </ul>
      </div>
    <?php endif;?>

    <div class="buy">
        <?if($product->price > 0 || D::role('admin')):?> 
    	    <span class="price"><?=HtmlHelper::priceFormat($product->price)?></span> <span class="rub">руб</span>
        <?endif?>
        <?if($product->notexist):?>
	        нет в наличии
        <?else:?>
          <?php $this->widget('\DCart\widgets\AddToCartButtonWidget', array(
	            'id' => $product->id,
    	        'model' => $product,
        	    'title'=>'<span>В корзину</span>',
            	'cssClass'=>'btn btn-default shop-button to-cart open-cart'));
          ?>
        <?endif?>
    </div>
  </div>
  <div class="clr"></div>
</div>

<?if(D::cms('shop_enable_reviews')) $this->widget('widget.productReviews.ProductReviews', array('product_id' => $product->id))?>
