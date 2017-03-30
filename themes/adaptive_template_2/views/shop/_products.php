<?php
/**
 * @var $data Product
 */

$innerPage = $data->inner_page;
?>

<div class="portfolio__item">
    <a
        href="<?= $innerPage ? Yii::app()->createUrl('shop/product', ['id' => $data->id]) : $data->getFullImg() ?>"
        title="<?= $data->title ?>"
        class="<?= $innerPage ? 'fancybox-disabled' : 'fancybox' ?>"
        rel="product-image"
    >
        <img src="<?= ResizeHelper::resize($data->getFullImg(false, false), 368, 260) ?>" alt="<?= $data->title ?>">
        <div class="portfolio-mask">
            <div class="mask__inner">
                <div class="portfolio-mask__heading"><?= $data->title ?></div>
                <div class="portfolio-mask__square"><?= $data->subtitle ?> м<sup>2</sup></div>
            </div>
        </div>
    </a>

    <?php if (!$innerPage): ?>
        <div class="hidden">
            <?php foreach ($data->getMoreImages() as $moreImage): ?>
                <a href="<?= $moreImage->getUrl() ?>" rel="product-image" title="<?= $data->title ?>" class="fancybox"></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
