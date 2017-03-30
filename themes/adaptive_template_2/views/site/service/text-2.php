<?php
/**
 * @var $service Service
 */
?>

<div class="repairs-page">
    <h3 class="heading-min">Цены на ремонт и отделку</h3>
    <table class="price-table_inner table table-striped table-hover">
        <tr>
            <th><span class="price-table__heading">Тариф</span></th>
            <th><span class="price-table__heading">Косметический</span></th>
            <th><span class="price-table__heading">Капитальный</span></th>
            <th><span class="price-table__heading">Эксклюзивный</span></th>
        </tr>
        <tr>
            <td>Замена декоративных покрытий стен и потолков</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Замена отделочных материалов</td>
            <td>+</td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Полная или частичная замена инженерных коммуникаций</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Прокладка новых сетей электро- и водоснабжения, кондиционирования и вентиляции</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Перепланировка квартиры</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Перенос стен и перегородок</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Замена напольных и потолочных покрытий</td>
            <td></td>
            <td>+</td>
            <td>+</td>
        </tr>
        <tr>
            <td>Разработка индивидуального дизайн-проекта и воплощение его в жизнь</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Подбор элементов декора - обоев, фресок, штукатурки и прочего</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Подбор и расстановка мебели</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td>Размещение других необходимых деталей интерьера</td>
            <td></td>
            <td></td>
            <td>+</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <!-- <div class="price-card__price price-card__price_old">
                    <?= $service['price1_old'] ?><span>₽</span> м<sup>2</sup>
                </div> -->
                <div class="price-card__price">
                    <?= $service['price1'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
            <td>
                <!-- <div class="price-card__price price-card__price_old">
                    <?= $service['price2_old'] ?><span>₽</span> м<sup>2</sup>
                </div> -->
                <div class="price-card__price">
                    <?= $service['price2'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
            <td>
                <!-- <div class="price-card__price price-card__price_old">
                    <?= $service['price3_old'] ?><span>₽</span> м<sup>2</sup>
                </div> -->
                <div class="price-card__price">
                    <?= $service['price3'] ?><span>₽</span> м<sup>2</sup>
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Косметический&raquo;" class="open-popup-link">Заказать</a></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Капитальный&raquo;" class="open-popup-link">Заказать</a></td>
            <td class="center"><a href="#request-popup-draft" data-tariff-title="&laquo;Эксклюзивный&raquo;" class="open-popup-link">Заказать</a></td>
        </tr>
    </table>

    <div class="price__action-text">
        <p><?= $service['price_sale_date'] ?></p>
    </div>
</div>

<div class="white-popup mfp-hide" id="request-popup-draft">
    <div class="popup">
        <div class="popup__header">
            <h2 class="popup__title">
                Заказать ремонт под ключ
                <span class="js-tariff-title"></span>
            </h2>
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