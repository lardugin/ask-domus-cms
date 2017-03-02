<? if($this->beginCache('shop__product_card', ['varyByParam'=>[$data->id]])): // cache begin ?>
<?#=D::c(($index % 3 == 0), '<div>')?>
<figure class="adaptive-product__item">
	<div class="product adaptive-product">
		<div class="product_img">
		<?=CHtml::link(CHtml::image($data->mainImg, $data->alt_title?:$data->title, array('title'=>$data->alt_title?:$data->title)), Yii::app()->createUrl('shop/product', array('id'=>$data->id))); ?>
		</div>
    	<div class="product_name">
      	<figcaption>
      		<?=CHtml::link($data->title, array('shop/product', 'id'=>$data->id), array('title'=>$data->link_title)); ?>
    		</figcaption>
    	</div>
		<div class="product_price">
		<?if(D::role('admin')):?> 
        <div class="price_change">
          <span class="price_change_span">Цена: <i><?=HtmlHelper::priceFormat($data->price)?></i> руб.</span>
          <div class="price_cotainer_change">
            <input type="text" class="price_val">
            <div style="margin-top:7px;">
              <button data-id="<?=$data->id?>" class="price_status">Сохранить</button>
            </div>
          </div>
        </div> 
      	<?else:?>
      		<span><?=D::c(($data->price > 0), 'Цена: <i>'. HtmlHelper::priceFormat($data->price).'</i> руб.')?></span>
      	<?endif?>
		</div>
		<div class="product_button">
			<?if($data->notexist):?>
        <span class="btn">
          Нет в наличии
        </span>
  			<?else:?>
        	<?$this->widget('\DCart\widgets\AddToCartButtonWidget', array(
            	'id' => $data->id,
            	'model' => $data,
            	'title'=>'<span>В корзину</span>', 
            	'cssClass'=>'btn btn-default shop-button to-cart open-cart')); 
        	?>
  			<?endif?>
		</div>

    <?if(D::yd()->isActive('shop') && (int)D::cms('shop_enable_attributes') && count($data->productAttributes)):?>
      <li class="product-attributes">
        <ul>
          <?foreach ($data->productAttributes as $productAttribute):?>
            <li><span><?=$productAttribute->eavAttribute->name?></span><span><?=$productAttribute->value?></span></li>
          <?endforeach?>
        </ul>
      </div>
    <?endif?>
  </div>
</figure>
<?#=D::c(!(($index+1) % 3), '</div>')?>
<? $this->endCache(); endif; // cache end ?>