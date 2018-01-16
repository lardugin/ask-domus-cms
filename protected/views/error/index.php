<? 
/** @var int $code код ошибки */ 
?>
<div class="content-box">
    <section class="container">
        <h1>Ошибка 404</h1>
        <div class="center">
            <img src="/images/404.jpg" alt="404">
        </div>
        <p>Вы можете перейти на главную или вернуться на <a href="javascript: history.go(-1);">последнюю просмотренную страницу</a>.</p>

        <ul>
        	<li><?= CHtml::link('Главная', '/') ?></li>
        	<li><?= CHtml::link('Дизайн интерьера', ['/site/service', 'id' => 1]) ?></li>
        	<li><?= CHtml::link('Ремонт и отделка', ['/site/service', 'id' => 2]) ?></li>
        	<li><?= CHtml::link('Авторский надзор', ['/site/service', 'id' => 3]) ?></li>
        	<li><?= CHtml::link('Портфолио', ['/shop/index']) ?></li>
        	<li><?= CHtml::link('Контакты', ['/site/page', 'id' => 16]) ?></li>
        </ul>
    </section>
</div>
