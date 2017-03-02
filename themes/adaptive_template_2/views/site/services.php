<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="services-page">
	<div class="servise-list">
		<?php $i = 1; foreach (Service::model()->findAll(['order' => 'sort']) as $service): ?>
			<?php $number = $i < 10 ? '0' . $i : $i; ?>
			<div class="servise__item">
				<a href="<?= Yii::app()->createUrl('/site/service', ['id' => $service->id]) ?>" class="servise__front">
					<img src="<?= $service->imageBehavior->getSrc() ?>" alt="<?= $service->title ?>">
					<div class="servise-mask">
						<span class="number"><?= $number ?></span>
						<div class="mask__inner">
							<div class="servise-mask__heading">
								<span><?= $service->title ?></span>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php $i++; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="content">
	<?=$page->text?>
</div>

<div class="services-page__steps">
	<h3 class="heading-min center">Этапы работ</h3>
	<ul class="steps-list">
		<li class="steps__item"><span class="steps__number">1</span> Встреча со специалистами и обсуждение дизайн-проекта (При необходимости на объекте)</li>
		<li class="steps__item"><span class="steps__number">2</span> Составление технического задания на проектирование, заключение договора</li>
		<li class="steps__item"><span class="steps__number">3</span> Замеры с учетом особенностей помещения</li>
		<li class="steps__item"><span class="steps__number">4</span> Разработка планировочного решения</li>
		<li class="steps__item"><span class="steps__number">5</span> 3D визуализация интерьера</li>
		<li class="steps__item"><span class="steps__number">6</span> Разработка рабочих (строительных) чертежей</li>
		<li class="steps__item"><span class="steps__number">7</span> Подготовка спецификаций мебели, предметов интерьера</li>
		<li class="steps__item"><span class="steps__number">8</span> Вы получаете готовый дизайн проект на руки</li>
	</ul>
</div>

<div class="services-page__portfolio">
	<h3 class="heading-min center">Примеры выполненных дизайн проектов</h3>

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
