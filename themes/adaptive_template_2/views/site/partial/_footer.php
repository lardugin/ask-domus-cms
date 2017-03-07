<?php
$services = '';

foreach (Service::model()->findAll(['order' => 'sort']) as $service) {
    $services .= CHtml::openTag('li');
    $services .= CHtml::link($service->title, ['site/service', 'id' => $service->id]);
    $services .= CHtml::closeTag('li');
}
?>

<footer class="footer">
    <section class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="bottom-contacts">
                    <div class="bottom__address">
                        <h6 class="bottom-contacts__heading">Адрес:</h6>
                        <div class="bottom-address__text">
                            <?= strip_tags(D::cms('address'), '<br><br/>') ?>
                        </div>
                    </div>
                    <div class="bottom__address">
                        <h6 class="bottom-contacts__heading">Время работы:</h6>
                        <div class="bottom-address__text">с 9:00 до 21:00 — понедельник - пятница</div>
                        <div class="bottom-address__text">с 10:00 до 19:00 — суббота - воскресенье</div>
                    </div>
                </div>
                <div class="copyright">
                    &copy; ООО «<a href="http://ask-domus.ru" title="Архитектурно-строительная компания АСК Домус">АСК Домус</a>» 2006-<?= date('Y') ?> <br>
                    Все права защищены.
                </div>
                <div class="site-map">
                    <a href="javascript:;">Карта сайта</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="logo-min">
                    <a href="http://ask-domus.ru" target="_blank" title="Архитектурно-строительная компания - Домус"><img src="/images/logo.png" alt="Авторский дизайн интерьера квартир и загородных домов"></a>
                    <div class="slogan_min">
                        Архитектурно-строительная компания
                    </div>
                </div>
                <div class="social-list-footer">
                    <div class="social-list-footer__item fb"><a href="<?= D::cms('fb') ?>" target="_blank" rel="nofollow"></a></div>
                    <div class="social-list-footer__item vk"><a href="<?= D::cms('in') ?>" target="_blank" rel="nofollow"></a></div>
                    <div class="social-list-footer__item in"><a href="<?= D::cms('vk') ?>" target="_blank" rel="nofollow"></a></div>
                    <div class="social-list-footer__item myhome"><a href="<?= D::cms('my_home') ?>" target="_blank" rel="nofollow"></a></div>
                    <div class="social-list-footer__item houzz"><a href="<?= D::cms('houzz') ?>" target="_blank" rel="nofollow"></a></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="bottom-communication">
                    <div class="phone-bottom"><?= D::cms('phone') ?></div>
                    <div class="email-bottom"><a href="mailto:<?= D::cms('emailPublic') ?>"><?= D::cms('emailPublic') ?></a></div>
                </div>
                <div class="bottom-servise-menu">
                    <ul class="servise-menu">
                        <?= $services ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="bottom-menu nav nav-justified">
                    <?= $services ?>
                </ul>
            </div>
        </div>
    </section>
</footer>
