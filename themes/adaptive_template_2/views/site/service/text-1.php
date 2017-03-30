<?php
/**
 * @var $service Service
 */
?>

<div class="interior-design-page">
    <h3 class="heading-min">Цены на дизайн проект</h3>
    <table class="price-table_inner table table-striped table-hover">
        <tr>
            <th><span class="price-table__heading">Тариф</span></th>
            <th><span class="price-table__heading">Эскизный</span></th>
            <th><span class="price-table__heading">Рабочий</span></th>
            <th><span class="price-table__heading">Полный</span></th>
        </tr>
        <tr>
            <td>Выезд на объект для тестирования</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Обмерный план помещения</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Составление технического задания</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Планировочные решения (2-3 варианта)</td>
            <td>1 вариант</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>План монтажа / демонтажа перегородок (стен)</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Ведомость отделки (передается в сметный отдел)</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Смета на выполнение ремонтно – отделочных работ</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>3D визуализация (2-3 ракурса на каждое помещение)</td>
            <td>1 ракурс</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Распечатанный и сброшюрованный проект</td>
            <td>В электронном виде</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>План полов (с указанием типа покрытий, площади и расположением теплых полов)</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>План потолков (с указанием типа покрытий и материалов)</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Схема открывания дверей</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Расстановка светильников и выключателей с привязками</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Расстановка розеток/выводов с привязками</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Расстановка сантехнических приборов и радиаторов отопления</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Схема вентиляции и кондиционирования (по необходимости)</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Развертки по стенам, разрезы (по необходимости), раскладка плитки</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Спецификация чистовых материалов, оборудования, мебели и аксессуаров</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="price-card__price price-card__price_old">
                    <?= $service['price1_old'] ?><span>₽</span> м<sup>2</sup>
                </div>
                <div class="price-card__price">
                    <?= $service['price1'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
            <td>
                <div class="price-card__price price-card__price_old">
                    <?= $service['price2_old'] ?><span>₽</span> м<sup>2</sup>
                </div>
                <div class="price-card__price">
                    <?= $service['price2'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
            <td>
                <div class="price-card__price price-card__price_old">
                    <?= $service['price3_old'] ?><span>₽</span> м<sup>2</sup>
                </div>
                <div class="price-card__price">
                    <?= $service['price3'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Эскизный&raquo;" class="open-popup-link">Заказать</a></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Рабочий&raquo;" class="open-popup-link">Заказать</a></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Полный&raquo;" class="open-popup-link">Заказать</a></td>
        </tr>
    </table>

    <div class="price__action-text">
        <p><?= $service['price_sale_date'] ?></p>
    </div>
</div>

<div class="white-popup mfp-hide" id="request-popup-draft">
    <div class="popup">
        <div class="popup__header">
            <h2 class="popup__title">Заказать дизайн проект <span class="js-tariff-title"></span></h2>
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
