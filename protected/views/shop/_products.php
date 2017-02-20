<?
if($this->beginCache('shop__product_card', ['varyByParam'=>[$data->id]])): // cache begin

if(empty($category)) $categoryId=$data->category_id;
else $categoryId=$category->id;
$productUrl=Yii::app()->createUrl('shop/product', ['id'=>$data->id, 'category_id'=>$categoryId]);
?>
<div class="product-item">
	<div class="product<?=HtmlHelper::getMarkCssClass($data, array('sale','new','hit'))?>">
		<div class="product_img product-block">
		<?=CHtml::link(CHtml::image($data->mainImg, $data->alt_title?:$data->title, array('title'=>$data->alt_title?:$data->title)), $productUrl); ?>
		<?if(D::role('admin')): 
			$this->widget('application.widget.imgCroper.imgCroper', array(
				'params'=>array(
					'id'=>$data->id,
					'img'=>$data->getFullImg(true, false, '_s'),
					'model'=>'product',
					'modificator'=>'_s',
					'maxSize_h'=>false,
					'maxSize_w'=>false,
					'ratio'=>1.25
				))); 
			endif?>
		</div>
			<div class="product_name product-block">
				<figcaption>
					<?=CHtml::link($data->title, $productUrl, array('title'=>$data->link_title)); ?>
				</figcaption>
			</div>
		<div class="product_price product-block">
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
		<div class="to-cart-wrapper">
			<?if($data->notexist):?>
					Нет в наличии
				<?else:?>
					<?$this->widget('\DCart\widgets\AddToCartButtonWidget', array(
							'id' => $data->id,
							'model' => $data,
							'title'=>'<span>В корзину</span>', 
							'cssClass'=>'shop-button to-cart open-cart')); 
					?>
				<?endif?>
		</div>

		<?if(D::yd()->isActive('shop') && (int)D::cms('shop_enable_attributes') && count($data->productAttributes)):?>
			<div class="product-attributes product-block">
				<ul>
					<?foreach ($data->productAttributes as $productAttribute):?>
						<li><span><?=$productAttribute->eavAttribute->name?></span><span><?=$productAttribute->value?></span></li>
					<?endforeach?>
				</ul>
			</div>
		<?endif?>
	</div>
</div>

<? $this->endCache(); endif; // cache end ?>