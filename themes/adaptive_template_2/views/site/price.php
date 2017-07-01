<?php
/**
 * @var $page Page
 */

$service = Service::model()->findByPk(1);
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<h2 class="center">Цены на дизайн проект</h2>
<br>
<div class="price-page">
	<table class="price-table table table-striped">
		<tr>
			<th><span class="price-table__heading">Эскизный</span></th>
			<th>
                <span class="price-table__heading">
                    Рабочий
<!--                    <sup>рекомендуем</sup>-->
                </span>
			</th>
			<th><span class="price-table__heading">Полный</span></th>
		</tr>
		<tr>
			<td>Выезд на объект для тестирования</td>
			<td>Выезд на объект для тестирования</td>
			<td>Выезд на объект для тестирования</td>
		</tr>
		<tr>
			<td>Обмерный план помещения</td>
			<td>Обмерный план помещения</td>
			<td>Обмерный план помещения</td>
		</tr>
		<tr>
			<td>Составление технического задания</td>
			<td>Составление технического задания</td>
			<td>Составление технического задания</td>
		</tr>
		<tr>
			<td>Планировочные решения (1 вариант)</td>
			<td>Планировочные решения (2-3 варианта)</td>
			<td>Планировочные решения (2-3 варианта)</td>
		</tr>
		<tr>
			<td>План монтажа / демонтажа перегородок (стен)</td>
			<td>План монтажа / демонтажа перегородок (стен)</td>
			<td>План монтажа / демонтажа перегородок (стен)</td>
		</tr>
		<tr>
			<td>Ведомость отделки (передается в сметный отдел)</td>
			<td>Ведомость отделки (передается в сметный отдел)</td>
			<td>Ведомость отделки (передается в сметный отдел)</td>
		</tr>
		<tr>
			<td>Смета на выполнение ремонтно – отделочных работ</td>
			<td>Смета на выполнение ремонтно – отделочных работ</td>
			<td>Смета на выполнение ремонтно – отделочных работ</td>
		</tr>
		<tr>
			<td>3D визуализация (1 ракурс общий для понимания стиля и цветового решения)</td>
			<td>3D визуализация (1 ракурс на помещение)</td>
			<td>3D визуализация (2-3 ракурса на каждое помещение)</td>
		</tr>
		<tr>
			<td>Проект в электронном виде</td>
			<td>Распечатанный и сброшюрованный проект</td>
			<td>Распечатанный и сброшюрованный проект</td>
		</tr>
		<tr>
			<td></td>
			<td>План полов (с указанием типа покрытий, площади и расположением теплых полов)</td>
			<td>План полов (с указанием типа покрытий, площади и расположением теплых полов)</td>
		</tr>
		<tr>
			<td></td>
			<td>План потолков (с указанием типа покрытий и материалов)</td>
			<td>План потолков (с указанием типа покрытий и материалов)</td>
		</tr>
		<tr>
			<td></td>
			<td>Схема открывания дверей</td>
			<td>Схема открывания дверей</td>
		</tr>
		<tr>
			<td></td>
			<td>Расстановка светильников и выключателей с привязками</td>
			<td>Расстановка светильников и выключателей с привязками</td>
		</tr>
		<tr>
			<td></td>
			<td>Расстановка розеток/выводов с привязками</td>
			<td>Расстановка розеток/выводов с привязками</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Расстановка сантехнических приборов и радиаторов отопления</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Схема вентиляции и кондиционирования (по необходимости)</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Развертки по стенам, разрезы (по необходимости), раскладка плитки</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Спецификация чистовых материалов, оборудования, мебели и аксессуаров</td>
		</tr>
		<tr>
			<td>
				<div class="price-card__price price-card__price_old">
					<?= $service['price1_old'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
				<div class="price-card__price">
					<?= $service['price1'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
			<td>
				<div class="price-card__price price-card__price_old">
					<?= $service['price2_old'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
				<div class="price-card__price">
					<?= $service['price2'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
			<td>
				<div class="price-card__price price-card__price_old">
					<?= $service['price3_old'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
				<div class="price-card__price">
					<?= $service['price3'] ?><i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
		</tr>
		<tr>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на дизайн-проект &laquo;Эскизный&raquo;" class="button button_green open-popup-link">Заказать проект</a></td>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на дизайн-проект &laquo;Рабочий&raquo;" class="button button_green open-popup-link">Заказать проект</a></td>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на дизайн-проект &laquo;Полный&raquo;" class="button button_green open-popup-link">Заказать проект</a></td>
		</tr>
	</table>
	<div class="price__action-text">
		<p><?= $service['price_sale_date'] ?></p>
	</div>

	<br>
	<br>
	
	<h2 class="center">Цены на ремонт и отделку</h2>
	<br>
	<table class="price-table table table-striped table-hover">
		<tr>
			<th><span class="price-table__heading">Косметический</span></th>
			<th><span class="price-table__heading">Капитальный</span></th>
			<th><span class="price-table__heading">Эксклюзивный</span></th>
		</tr>
		<tr>
			<td>Замена декоративных покрытий стен и потолков</td>
			<td>Замена декоративных покрытий стен и потолков</td>
			<td>Замена декоративных покрытий стен и потолков</td>
		</tr>
		<tr>
			<td>Замена отделочных материалов</td>
			<td>Замена отделочных материалов</td>
			<td>Замена отделочных материалов</td>
		</tr>
		<tr>
			<td></td>
			<td>Полная или частичная замена инженерных коммуникаций</td>
			<td>Полная или частичная замена инженерных коммуникаций</td>
		</tr>
		<tr>
			<td></td>
			<td>Прокладка новых сетей электро- и водоснабжения, кондиционирования и вентиляции</td>
			<td>Прокладка новых сетей электро- и водоснабжения, кондиционирования и вентиляции</td>
		</tr>
		<tr>
			<td></td>
			<td>Перепланировка квартиры</td>
			<td>Перепланировка квартиры</td>
		</tr>
		<tr>
			<td></td>
			<td>Перенос стен и перегородок</td>
			<td>Перенос стен и перегородок</td>
		</tr>
		<tr>
			<td></td>
			<td>Замена напольных и потолочных покрытий</td>
			<td>Замена напольных и потолочных покрытий</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Разработка индивидуального дизайн-проекта и воплощение его в жизнь</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Подбор элементов декора - обоев, фресок, штукатурки и прочего</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Подбор и расстановка мебели</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Размещение других необходимых деталей интерьера</td>
		</tr>
		<tr>
			<td>
				<div class="price-card__price">
					4 000<i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
			<td>
				<div class="price-card__price">
					8 000<i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
			<td>
				<div class="price-card__price">
					10 000<i class="rub">&#118;</i> м<sup>2</sup>
				</div>
			</td>
		</tr>
		<tr>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на ремонт &laquo;Косметический&raquo;" class="button button_green open-popup-link">Заказать</a></td>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на ремонт &laquo;Капитальный&raquo;" class="button button_green open-popup-link">Заказать</a></td>
			<td class="center"><a href="#request-popup-draft" data-tariff-title="Заявка на ремонт &laquo;Эксклюзивный&raquo;" class="button button_green open-popup-link">Заказать</a></td>
		</tr>
	</table>
</div>

<div class="white-popup mfp-hide" id="request-popup-draft">
	<div class="popup">
		<div class="popup__header">
			<h5 class="popup__title">
				<span class="js-tariff-title"></span>
			</h5>
		</div>
		<div class="popup__body">
			<?php
			$this->widget('\feedback\widgets\FeedbackWidget', array(
				'id' => 'callback5',
				'view' => '//feedback/price',
				'formHtmlOptions' => [
					'class' => 'form ajaxform'
				],
			));
			?>
		</div>
		<div class="popup__footer">
			Ваши контактные данные в безопасности и не будут <br> переданы третьим лицам.
		</div>
	</div>
</div>

<div class="content">
	<?=$page->text?>
</div>
