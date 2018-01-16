<?php $this->beginContent('//layouts/main');$service = Service::model()->findByPk(1);?>

	<div class="servise-box">
		<section class="container">
			<div class="heading">Услуги</div>
			<div class="servise-list">
				<?php $i = 1; foreach (Service::model()->findAll(['order' => 'sort']) as $service): ?>
					<?php $number = $i < 10 ? '0' . $i : $i; ?>
					<div class="servise__item">
						<a href="<?= Yii::app()->createUrl('/site/service', ['id' => $service->id]) ?>" class="servise__front">
							<img src="<?= ResizeHelper::resizeToCache($service->imageBehavior->getSrc(), 372, 260) ?>" alt="<?= $service->title ?>">
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

			<div class="button-more-center">
				<a href="<?= Yii::app()->createUrl('site/page', ['id' => 2]) ?>" class="button button_green button_arrow">Подробнее об услугах</a>
			</div>
		</section>
	</div>

	<div class="work-box">
		<section class="container">
			<div class="heading">Наши работы</div>
			<div class="work">
				<div class="work__cont-list">
					<div class="work__cont-item active">
						<div class="portfolio">
							<?php foreach (Product::model()->visibled()->onShopIndex()->scopeSort('shop_category')->findAll() as $product): ?>
								<?/** @var $product Product */?>
								<?php
								$this->renderPartial('//shop/_products', [
									'data' => $product,
								]);
								?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="button-more-center">
					<a href="<?= Yii::app()->createUrl('shop/index') ?>" class="button button_green button_arrow">Смотреть все проекты</a>
				</div>
			</div>
		</section>
	</div>
    
    <?php
        $service = Service::model()->findByPk(1);
    ?>
    
	<div class="price-box">
		<section class="container">
			<div class="heading">Цены на дизайн проект</div>
			<div class="price">
				<div class="price-card__list">
					<div class="price-card__item flip-container">
						<div class="flipper">
							<div class="price-card flipper__area_front flipper__area">
								<div class="price-card__headline">
									<span>Эскизный</span>
									<a href="javascript:;" class="price-card-arrow button_scaleout"></a>
								</div>
								<div class="price-card__body">
									<div class="price-card__icon">
										<img src="/images/price/icon-1.png" alt="Эскизный">
									</div>
									<div class="price-card__price price-card__price_old">
										<?= $service['price1_old'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__price">
										<?= $service['price1'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__button">
										<a href="javascript:;" class="button button_transparent button_arrow button_scaleout" onclick="yaCounter38644345.reachGoal('LOOKED_PRICE_MIN')">Подробнее</a>
									</div>
								</div>
							</div>
							<div class="price-card_back flipper__area_back flipper__area">
								<div class="price-card__headline">
									<span>Эскизный</span>
									<div class="price-card__price_min"><?= $service['price1'] ?><span>₽</span> м<sup>2</sup></div>
									<a href="javascript:;" class="price-card-arrow price-card-arrow_back"></a>
								</div>
								<div class="price-card__text">
									<ul>
										<li>Выезд на объект для тестирования</li>
										<li>Обмерный план помещения</li>
										<li>Составление технического задания</li>
										<li>Планировочные решения (2-3 варианта)</li>
										<li>План демонтажа перегородок (стен)</li>
										<li>План монтажа перегородок (стен)</li>
										<li>Ведомость отделки (передается в сметный отдел)</li>
										<li>Смета на выполнение ремонтно – отделочных работ</li>
										<li>3D визуализация (1 ракурс общий для понимания стиля и цветового решения)</li>
										<li>Распечатанный и сброшюрованный проект</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="price-card__item flip-container">
						<div class="flipper">
							<div class="price-card flipper__area_front flipper__area">
								<div class="price-card__headline">
									<span>Рабочий</span>
									<a href="javascript:;" class="price-card-arrow"></a>
								</div>
								<div class="price-card__body">
									<div class="price-card__icon">
										<img src="/images/price/icon-2.png" alt="Рабочий">
									</div>
									<div class="price-card__price price-card__price_old">
										<?= $service['price2_old'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__price">
										<?= $service['price2'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__button">
										<a href="javascript:;" class="button button_transparent button_arrow" onclick="yaCounter38644345.reachGoal('LOOKED_PRICE_MIDDLE')">Подробнее</a>
									</div>
								</div>
							</div>
							<div class="price-card_back flipper__area_back flipper__area">
								<div class="price-card__headline">
									<span>Рабочий</span>
									<div class="price-card__price_min"><?= $service['price2'] ?><span>₽</span> м<sup>2</sup></div>
									<a href="javascript:;" class="price-card-arrow price-card-arrow_back"></a>
								</div>
								<div class="price-card__text">
									<div class="pills">&larr; Пакет &laquo;Эскизный&raquo;</div>
									<ul class="price-card__ul_green">
										<li>3D визуализация в перспективе (1 ракурс на помещение)</li>
										<li>План полов (с указанием типа покрытий, площади и расположением теплых полов)</li>
										<li>План потолков (с указанием типа покрытий и материалов)</li>
										<li>Схема открывания дверей</li>
										<li>Расстановка светильников и выключателей с привязками</li>
										<li>Расстановка розеток/выводов с привязками</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="price-card__item flip-container">
						<div class="flipper">
							<div class="price-card flipper__area_front flipper__area">
								<div class="price-card__headline">
									<span>Полный</span>
									<a href="javascript:;" class="price-card-arrow"></a>
								</div>
								<div class="price-card__body">
									<div class="price-card__icon">
										<img src="/images/price/icon-3.png" alt="Полный">
									</div>
									<div class="price-card__price price-card__price_old">
										<?= $service['price3_old'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__price">
										<?= $service['price3'] ?><span>₽</span> м<sup>2</sup>
									</div>
									<div class="price-card__button">
										<a href="javascript:;" class="button button_transparent button_arrow" onclick="yaCounter38644345.reachGoal('LOOKED_PRICE_MAX')">Подробнее</a>
									</div>
								</div>
							</div>
							<div class="price-card_back flipper__area_back flipper__area">
								<div class="price-card__headline">
									<span>Полный</span>
									<div class="price-card__price_min"><?= $service['price3'] ?><span>₽</span> м<sup>2</sup></div>
									<a href="javascript:;" class="price-card-arrow price-card-arrow_back"></a>
								</div>
								<div class="price-card__text">
									<div class="pills">&larr; Пакет &laquo;Рабочий&raquo;</div>
									<ul>
										<li>3D визуализация в перспективе (2-3 ракурса на каждое помещение)</li>
										<li>Расстановка сантехнических приборов и радиаторов отопления</li>
										<li>Схема вентиляции и кондиционирования (по необходимости)</li>
										<li>Развертки по стенам, разрезы (по необходимости), раскладка плитки</li>
										<li>Спецификация чистовых материалов, оборудования, мебели и аксессуаров</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="price__action-text">
                    <p><?= $service['price_sale_date'] ?></p>
				</div>
				<div class="button-more-center">
					<a href="<?= Yii::app()->createUrl('site/page', ['id' => 2]) ?>" class="button button_green button_arrow">Подробнее о ценах</a>
				</div>
			</div>
		</section>
	</div>

	<div class="projects-box">
		<section class="container">
			<div class="heading">Пример полного проекта</div>
			<div class="projects-list">
				<div class="project-item">
					<div class="project">
						<div class="project__left">
							<div class="project__title">Дизайн трекомнатной квартиры для молодоженов</div>
							<div class="project__area">
								<span class="title">Площадь:</span>
								86 м<sup>2</sup>
							</div>
							<div class="project__task">
								<span class="title">Задачи:</span>
								Основная задача проекта - создание просторной гостевой зоны, так как молодые хозяева квартиры ведут активный образ жизни и часто принимают у себя гостей.
								Вторая задача была связанна с отсутствием балконов в квартире: возникла необходимость создания отдельного помещения для сушки одежды и хранения вещей.
							</div>
							<div class="project__description">
								<span class="title">Описание:</span>
								Современные тенденции воздушности в сочетании с традиционной солидностью подчеркнуты при помощи контраста светлых сливочных оттенков и темных коричневых тонов, что создает ощущение покоя и уюта.
								Пространство спальни, несмотря на ее небольшие размеры, решено очень функционально. Оно оформлено в спокойных пастельных тонах, располагающих к отдыху. Детали из текстиля и художественная композиция в изголовье кровати придают ему законченный вид.
								<br>
								Активная жизненная позиция будущих жильцов этой квартиры, их молодость и жизнелюбие нашли выражение в оформлении ванной комнаты и гостевого санузла.
								Ванная комната, вместившая раковину, встроенную мебель и достаточно просторную ванну, а также биде, унитаз и стиральную машину, решена в сочетании классического белого и сочного оранжевого цвета. Она выглядит достаточно ярко и интересно, несмотря на свою лаконичность.
							</div>
							<div class="center project-pdf">
								<a href="/doc/Lyubercy.pdf" target="_blank" class="button button_green button_arrow" onclick="yaCounter38644345.reachGoal('VIEW_PDF')">Скачать дизайн проект</a>
							</div>
						</div>
						<div class="project__right">
							<div class="project-foto">
								<ul id="project">
									<li><a href="/images/project/luberci/1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/1.jpg', 600, 420) ?>" alt="Люберцы-1"></a></li>
									<li><a href="/images/project/luberci/2.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/2.jpg', 600, 420) ?>" alt="Люберцы-2"></a></li>
									<li><a href="/images/project/luberci/3.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/3.jpg', 600, 420) ?>" alt="Люберцы-3"></a></li>
									<li><a href="/images/project/luberci/4.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/4.jpg', 600, 420) ?>" alt="Люберцы-4"></a></li>
									<li><a href="/images/project/luberci/5.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/5.jpg', 600, 420) ?>" alt="Люберцы-5"></a></li>
									<li><a href="/images/project/luberci/6.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/6.jpg', 600, 420) ?>" alt="Люберцы-6"></a></li>
									<li><a href="/images/project/luberci/7.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/7.jpg', 600, 420) ?>" alt="Люберцы-7"></a></li>
									<li><a href="/images/project/luberci/8.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/8.jpg', 600, 420) ?>" alt="Люберцы-8"></a></li>
									<li><a href="/images/project/luberci/1-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/1-1.jpg', 600, 420) ?>" alt="Любе1-1рцы-"></a></li>
									<li><a href="/images/project/luberci/2-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/2-1.jpg', 600, 420) ?>" alt="Люберцы-2-1"></a></li>
									<li><a href="/images/project/luberci/3-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/3-1.jpg', 600, 420) ?>" alt="Люберцы-3-1"></a></li>
									<li><a href="/images/project/luberci/4-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/4-1.jpg', 600, 420) ?>" alt="Люберцы-4-1"></a></li>
									<li><a href="/images/project/luberci/5-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/5-1.jpg', 600, 420) ?>" alt="Люберцы-5-1"></a></li>
									<li><a href="/images/project/luberci/6-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/6-1.jpg', 600, 420) ?>" alt="Люберцы-6-1"></a></li>
									<li><a href="/images/project/luberci/7-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/7-1.jpg', 600, 420) ?>" alt="Люберцы-7-1"></a></li>
									<li><a href="/images/project/luberci/8-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/8-1.jpg', 600, 420) ?>" alt="Люберцы-8-1"></a></li>
									<li><a href="/images/project/luberci/9-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/9-1.jpg', 600, 420) ?>" alt="Люберцы-9-1"></a></li>
									<li><a href="/images/project/luberci/10-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/10-1.jpg', 600, 420) ?>" alt="Люберц10-1ы-"></a></li>
									<li><a href="/images/project/luberci/11-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/11-1.jpg', 600, 420) ?>" alt="Люберцы-11-1"></a></li>
									<li><a href="/images/project/luberci/12-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/12-1.jpg', 600, 420) ?>" alt="Люберцы-12-1"></a></li>
									<li><a href="/images/project/luberci/13-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/13-1.jpg', 600, 420) ?>" alt="Люберцы-13-1"></a></li>
									<li><a href="/images/project/luberci/14-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/14-1.jpg', 600, 420) ?>" alt="Люберцы-14-1"></a></li>
									<li><a href="/images/project/luberci/15-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/15-1.jpg', 600, 420) ?>" alt="Люберцы-15-1"></a></li>
									<li><a href="/images/project/luberci/16-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/16-1.jpg', 600, 420) ?>" alt="Люберцы-16-1"></a></li>
									<li><a href="/images/project/luberci/17-1.jpg" class="fancybox" rel="progect-foto"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/17-1.jpg', 600, 420) ?>" alt="Люберцы-17-1"></a></li>
								</ul>
								<div class="project_control"></div>
								<div class="project-pager" id="bx-pager">
									<a data-slide-index="0" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/1.jpg', 92, 64) ?>" alt="0"></a>
									<a data-slide-index="1" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/2.jpg', 92, 64) ?>" alt="1"></a>
									<a data-slide-index="2" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/3.jpg', 92, 64) ?>" alt="2"></a>
									<a data-slide-index="3" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/4.jpg', 92, 64) ?>" alt="3"></a>
									<a data-slide-index="4" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/5.jpg', 92, 64) ?>" alt="4"></a>
									<a data-slide-index="5" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/6.jpg', 92, 64) ?>" alt="5"></a>
									<a data-slide-index="6" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/7.jpg', 92, 64) ?>" alt="6"></a>
									<a data-slide-index="7" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/8.jpg', 92, 64) ?>" alt="7"></a>
									<a data-slide-index="8" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/1-1.jpg', 92, 64) ?>" alt="8"></a>
									<a data-slide-index="9" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/2-1.jpg', 92, 64) ?>" alt="9"></a>
									<a data-slide-index="10" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/3-1.jpg', 92, 64) ?>" alt="10"></a>
									<a data-slide-index="11" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/4-1.jpg', 92, 64) ?>" alt="11"></a>
									<a data-slide-index="12" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/5-1.jpg', 92, 64) ?>" alt="12"></a>
									<a data-slide-index="13" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/6-1.jpg', 92, 64) ?>" alt="13"></a>
									<a data-slide-index="14" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/7-1.jpg', 92, 64) ?>" alt="14"></a>
									<a data-slide-index="15" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/8-1.jpg', 92, 64) ?>" alt="15"></a>
									<a data-slide-index="16" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/9-1.jpg', 92, 64) ?>" alt="16"></a>
									<a data-slide-index="17" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/10-1.jpg', 92, 64) ?>" alt="17"></a>
									<a data-slide-index="18" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/11-1.jpg', 92, 64) ?>" alt="18"></a>
									<a data-slide-index="19" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/12-1.jpg', 92, 64) ?>" alt="19"></a>
									<a data-slide-index="20" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/13-1.jpg', 92, 64) ?>" alt="20"></a>
									<a data-slide-index="21" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/14-1.jpg', 92, 64) ?>" alt="21"></a>
									<a data-slide-index="22" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/15-1.jpg', 92, 64) ?>" alt="22"></a>
									<a data-slide-index="23" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/16-1.jpg', 92, 64) ?>" alt="23"></a>
									<a data-slide-index="24" href="javascript:;"><img src="<?= ResizeHelper::resizeToCache('/images/project/luberci/17-1.jpg', 92, 64) ?>" alt="24"></a>
								</div>
							</div>
							<div class="center project-pdf">
								<a href="/doc/Lyubercy.pdf" target="_blank" class="button button_green button_arrow" onclick="yaCounter38644345.reachGoal('VIEW_PDF')">Скачать дизайн проект</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="promo-box">
		<section class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="promo-text">
						<p class="promo-text_light">11 лет на рынке</p>
						<p class="promo-text_bold">Огромное портфолио</p>
						<p class="promo-text_semilight">Работаем по договору</p>
						<p class="promo-text_semibold">Имеем все лицензии</p>
						<p class="promo-text_light">Участники СРО</p>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-box">
						<div class="form-box__headline">
							<h2 class="form-box__title">
								Заказать <br>
                                дизайн проект
							</h2>
						</div>
						<div class="form-box__body">
							<?php
							$this->widget('\feedback\widgets\FeedbackWidget', array(
								'id' => 'callback',
								'view' => '//feedback/callback',
								'formHtmlOptions' => [
									'class' => 'form ajaxform'
								],
							));
							?>
						</div>
						<div class="form-box__footer">
							Ваши контактные данные в безопасности и не будут <br> переданы третьим лицам.
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

    <div class="index-text-box">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>Студия ремонта и интерьерного дизайна АСК «Домус» - честная работа на результат!</h2>
                        <h3>Кто мы?</h3>
                        <p>
                            Архитектурно-строительная компания “Domus” – это студия дизайна и интерьера в Москве, которую рекомендуют друзьям. Мы выполняем полный спектр услуг, от детальной проработки идеи до ее реализации в помещениях любого вида, экстерьере и ландшафте. Предлагаем решения для каждого клиента, опираясь на предпочтения, возможности и пожелания относительно проекта.
                        </p>

                    	<h3>Почему мы?</h3>
                    	<p>Студия дизайна интерьера домов и квартир АСК «Домус» - это коллектив профессионалов своего дела, которые работают быстро и слаженно. Вам не придется нервничать, выясняя каждый раз, почему сроки вновь отодвинулись в последний момент. Мы работаем строго по договору, который предусматривает обязанности исполнителя и санкции в случае их невыполнения.</p>

						<p>Мы не гоняемся за клиентами – нам некогда отвлекаться от рабочего процесса. Поэтому мы гарантируем абсолютную честность и прозрачность в отношении клиентов и посетителей сайта. Собственно, мы не делаем различий между одним и вторым. Если вы написали или позвонили нам с вопросом – вы автоматически становитесь клиентом нашего агентства дизайна интерьера, со всеми привилегиями этого гордого звания. Независимо от того, закажете ли вы наши услуги, ваш ждет подробная консультация по всем интересующим моментам сотрудничества.</p>

						<p>АСК «Домус» - это дизайн-студия в Москве, цены на услуги которой вас не оставят равнодушными. Более 11 успешных лет работы и тысячи довольных заказчиков – это повод доверить нам работу над своим помещением или участком, а мы всегда оправдываем оказанное доверие. Доказательство тому – отзывы наших клиентов. Это не просто написанные копирайтером бездушные строчки, а реальный опыт сотрудничества с нашей компанией, правдивость которого каждый из написавших может подтвердить лично.</p>
                        
<!-- 					<h2>Domus – авторский дизайн интерьеров в Москве</h2>
						<p>Архитектурно-строительная компания “Domus” – это студия дизайна и интерьера в Москве и области. Выполняем полный спектр услуг, от детальной проработки идеи до ее реализации в помещениях любого уровня и ландшафте. Предлагаем решения для каждого клиента, опираясь на предпочтения, возможности и пожелания относительно проекта. Сотрудничество с “Domus” имеет ряд весомых преимуществ, которые оставляют позади наших конкурентов. Среди которых сроки, цена и качество выполняемых работ.</p>
                        <h2>Заказать дизайн-проект интерьера</h2>
                        <p>
                            Компания “Domus” предлагает авторский дизайн интерьера в Москве и области.
                            Мы готовы к сотрудничеству не только с новыми клиентами, но и с новыми дизайнерами и архитекторами,
                            для которых у нас есть особые условия - воплотим в жизнь не только свои дизайн-проекты, но и ваши.
                            Уточнить подробности и получить ответы на вопросы можно по телефону, указанному на сайте.
                        </p>
                        <p>
                            Более 11 успешных лет работы и тысячи довольных клиентов – это повод доверить нам работу над своим помещением или участком,
                            а мы всегда оправдываем оказанное доверие. АСК «Домус» - это ваш ориентир в мире дизайна и ремонта!
                        </p> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
						<h3>Что мы предлагаем?</h3>
                        <p>Дизайн, ремонт, отделка квартир и домов – это только часть списка услуг АСК «Домус». Также в этом списке находятся:</p>
                        <ul>
                        	<li><a href="/uslugi/proektirovanie/" title="Проектирование">Проектирование</a>. Хотите дачный коттедж или загородный дом с нуля до заселения? Не проблема! Услуга архитектурного проектирования включает в себя разработку проекта с начальной стадии. Даже если для всех остальных этапов строительства и отделки вы выберете другое агентство дизайна интерьера, вы все равно получите первоклассный сервис и полноценное внимание со стороны наших специалистов во время работы над проектом.</li>
                        	<li><a href="/uslugi/komplektaciya-obektov/" title="Комплектация объектов">Комплектация объектов</a>. Эта услуга подразумевает под собой подбор элементов мебели, дизайна, освещения и даже отделочные материалы согласно разработанному проекту. Стоит отметить, что 100-процентную гарантию по подбору точно таких же материалов, элементов мебели и декора мы можем дать только при разработке дизайна нашими специалистами. Но даже если над интерьером работали другие фирмы, занимающиеся дизайном квартир или домов, мы сделаем все возможное и невозможное, чтобы помочь вам с поиском.</li>
                        	<li><a href="/uslugi/dekorirovanie/" title="Декорирование">Декорирование</a>. У вас есть готовый объект с выполненным ремонтом «под ключ» и подобранной мебелью, но ему все равно чего-то не хватает? Декораторы в этом случае говорят, что ему не хватает «души» или «характера». Добавить индивидуальности вашему помещению поможет декорирование, которое также заказывается как в комплексе с другими услугами компании “Domus”, так и отдельно от них.</li>
                        	<li><a href="/uslugi/avtorskij-nadzor/" title="Авторский надзор">Авторский надзор</a>. Говорят, что сделать что-то хорошо можно, только если сделать это самому. Мы разрушаем эти стереотипы! Заказав у нас услугу авторского надзора, вы снимете с себя большое количество забот и обязанностей – за то, чтобы ваш объект после окончания ремонта полностью соответствовал проекту дизайна, будет отвечать головой наша компания. Вам останется только сравнить картинку с реальностью и приятно удивиться результату.</li>
                        </ul>
<!--                    <h2>Индивидуальные дизайн-проекты квартир и загородных домов</h2>
                        <p>
                            АСК «Домус» предлагает дизайн интерьера в Москве и области.
                            Главные направления деятельности компании – это дизайн интерьеров, ремонт квартир под ключ,
                            архитектурное проектирование. У нас можно заказать дизайн-проект интерьера следующих объектов:
                        </p>
                        <ul>
                            <li>
                                Одно-, двух-, трех- и четырехкомнатные квартиры. Типовые «хрущевки» и дизайнерские апартаменты, с элементами перепланировки и без. Выбирайте любой стиль, озвучивайте свои идеи – чем больше пожеланий слышит дизайнер, тем быстрее он создает то, о чем мечтал клиент!
                            </li>
                            <li>
                                Загородные дома. Атмосфера и уют в доме напрямую зависят от дизайна интерьера. Дополнительно выполняем дизайн экстерьера и ландшафтное проектирование.
                            </li>
                            <li>
                                Офисные помещения и кабинеты руководителей. Мы все знаем, какое мощное влияние на бизнес оказывает дизайн интерьера в рабочей зоне – как для работников компании, так и для ее клиентов.
                            </li>
                            <li>
                                Общественные зоны: холлы, магазины, кафе, рестораны, гостиницы. Удачный дизайн интерьера делает общественное место атмосферным и уникальным, то есть, отличным от сотен других аналогичных. А это, в свою очередь, будет главным мотивом для того, чтобы клиенты снова и снова возвращались именно к вам.
                            </li>
                        </ul>
                        <p>Оценить качество работ и выполненных проектов можно в разделе <a href="/portfolio">«Портфолио»</a>.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="end-box">
		<section class="container">
			<div class="end-left">
				<div class="elina">
					<img src="/images/elina.jpg" alt="elina">
					<div class="name">
						<div class="elina-name">Элина Деревенец</div>
						<div class="elina-post">Менеджер проектов</div>
					</div>
				</div>
			</div>
			<div class="end-right">
				<div class="ps">
					<div class="ps__item ps__item_question">Остались вопросы?</div>
					<div class="ps__item ps__item_call">Звоните: <?= strip_tags(D::cms('phone')) ?></div>
					<div class="ps__item ps__item_write">Напишите: <?= D::cms('emailPublic') ?></div>
					<div class="ps__item ps__item_callback">Или закажите обратный звонок</div>
					<div class="info__form info__form_bottom">
						<?php
                            $this->widget('\feedback\widgets\FeedbackWidget', array(
                                'id' => 'callback1',
                                'view' => '//feedback/end',
                                'formHtmlOptions' => [
                                    'class' => 'form ajaxform'
                                ],
                            ));
						?>
					</div>
					<div class="ps__item ps__item_massegers">
					<span>
						Мы всегда на связи:
						<i><?= D::cms('phone2') ?></i>
					</span>
						<ul class="massegers-list">
							<li><a class="item tg" href="<?= D::cms('tg') ?>"></a></li>
							<li><a class="item wt" href="<?= D::cms('wt') ?>"></a></li>
							<li><a class="item vb" href="<?= D::cms('vb') ?>"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php $this->endContent(); ?>