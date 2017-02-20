<?php
/**
 * @var $settings array
 */
?>

<h1 class="heading"><?= $settings['meta_h1'] ? : D::shop('meta_h1', D::cms('shop_title',Yii::t('shop','shop_title')))?></h1>

<div class="inner-page">
    <div class="portfolio-page">
        <div class="work" id="work">
            <div class="work__tab-list">
                <div class="work__tab-item active"><a href="javascript:;">Квартиры</a></div>
                <div class="work__tab-item"><a href="javascript:;">Загородные дома</a></div>
                <div class="work__tab-item"><a href="javascript:;">Кухни</a></div>
                <div class="work__tab-item"><a href="javascript:;">Кабинеты</a></div>
                <div class="work__tab-item"><a href="javascript:;">Гостиные</a></div>
                <div class="work__tab-item"><a href="javascript:;">Спальни</a></div>
                <div class="work__tab-item"><a href="javascript:;">Прихожии</a></div>
                <div class="work__tab-item"><a href="javascript:;">Детские</a></div>
                <div class="work__tab-item"><a href="javascript:;">Ванные и санузлы</a></div>
            </div>
            <div class="work__cont-list">
                <?php #include "work/rooms.php"; ?> <!-- Квартиры -->
                <?php #nclude "work/house.php"; ?> <!-- Загородные дома -->
            </div>
        </div>
    </div>

    <div class="content">
        <?= $settings['main_text'] ?>
    </div>
</div>
