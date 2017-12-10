<?php
echo \CHtml::openTag('div', $this->htmlOptions);
if($this->homeTitle):?>
<div class="breadcrumbs__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
	<a href="<?=$this->homeUrl?>" itemprop="url"><span itemprop="title"><?=$this->homeTitle?></span></a>
</div>
<?endif?>

<?foreach($this->breadcrumbs as $breadcrumb):?>
	
		<?php if($breadcrumb === end($this->breadcrumbs)):?>
			<div class="breadcrumbs__item">
				<span><?= $breadcrumb['title'] ?></span>
			</div>
		<?php else: 
			$params=(array)$breadcrumb['url'];
			$link=\Yii::app()->createUrl(array_shift($params), $params);
			?>
			<div class="breadcrumbs__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a href="<?= $link ?>" itemprop="url"><span itemprop="title"><?= $breadcrumb['title'] ?></span></a>
			</div>
		<?php endif;?>
<?endforeach?>
	
<?=\CHtml::closeTag('div')?>
