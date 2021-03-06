<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="company-page">

    <ul class="company-menu">
        <li><a class="button button_transparent" href="/novosti/"><span>Новости</span></a></li>
        <li><a class="button button_transparent" href="/o-kompanii/nasha-komanda/"><span>Наша команда</span></a></li>
        <li><a class="button button_transparent" href="/o-kompanii/diplomy-i-gramoty/"><span>Дипломы и грамоты</span></a></li>
        <li><a class="button button_transparent" href="/vopros-otvet/"><span>Вопрос - Ответ</span></a></li>
        <li><a class="button button_transparent" href="/otzyvy/"><span>Отзывы</span></a></li>
    </ul>
</div>

<div class="content">
	<?= $page->text ?>
</div>

<div class="services-page__portfolio">
    <h5 class="heading-min center">Примеры выполненных дизайн проектов</h5>

    <div class="portfolio">
        <?php foreach (Product::model()->visibled()->findAll('service_page = 1') as $product): ?>
            <div class="portfolio__item">
                <a href="<?= Yii::app()->createUrl('/shop/product', ['id' => $product->id]) ?>">
                    <img src="<?= ResizeHelper::resize($product->getFullImg(false, false), 368, 260) ?>" alt="<?= $product->title ?>">
                    <div class="portfolio-mask">
                        <div class="mask__inner">
                            <div class="portfolio-mask__heading"><?= $product->title ?></div>
                            <div class="portfolio-mask__square"><?= $product->subtitle ?> м<sup>2</sup></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="button-more-center">
        <a href="<?= Yii::app()->createUrl('/shop/index') ?>" class="button button_green button_arrow">Смотреть все проекты</a>
    </div>
</div>
