<?php
use reviews\models\Review;

/**
 * @var $page Page
 * @var $list Question[]
 * @var $form CActiveForm
 */

$modelQuestion = new Question();
$modelReview = new Review('frontend_insert');

?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="contactss-page">

	<h3 class="heading-min center">Адрес, время работы и контакты</h3>
	<div class="contacts-list">
		<div class="contacts-list__item">
			<h6 class="contact-item__heading">Адрес:</h6>
			<div class="contact-item__text">
				<?= D::cms('address') ?>
			</div>
		</div>
		<div class="contacts-list__item">
			<h6 class="contact-item__heading">Время работы:</h6>
			<div class="contact-item__text hidden-sm">с 9:00 до 21:00 — понедельник - пятница</div>
			<div class="contact-item__text hidden-sm">с 10:00 до 19:00 — суббота - воскресенье</div>

			<div class="contact-item__text hidden-md hidden-lg">с 9:00 до 21:00 — Пн - Пт</div>
			<div class="contact-item__text hidden-md hidden-lg">с 10:00 до 19:00 — Сб - Вс</div>
		</div>
		<div class="contacts-list__item">
			<h6 class="contact-item__heading">Контакты:</h6>
			<div class="contact-item__text"><?= strip_tags(D::cms('phone')) ?></div>
			<div class="contact-item__text"><?= strip_tags(D::cms('phone2')) ?></div>
			<div class="contact-item__text"><a href="mailto:<?= D::cms('emailPublic') ?>"><?= D::cms('emailPublic') ?></a></div>
		</div>
	</div>

	<h3 class="heading-min center">Формы обратной связи</h3>
	<div class="contacts-list">
		<div class="contacts-list__item">
			<div class="contact-item__text"><a href="#questions-popup" class="open-popup-link">Задать нам вопрос</a></div>
		</div>
		<div class="contacts-list__item">
			<div class="contact-item__text"><a href="#reviews-popup" class="open-popup-link">Оставить отзыв</a></div>
		</div>
		<div class="contacts-list__item">
			<div class="contact-item__text"><a href="#callback-popup" class="open-popup-link">Заказать обратный звонок</a></div>
		</div>
	</div>

	<br>

	<br>

	<h3 class="heading-min center">Удобство расположения студии</h3>
	<div class="contacts-list">
		<div class="contacts-list__item">
			<div class="contact-icon">
				<img src="/images/contacts-icon-ballun.png" alt="">
				<div class="contact-icon__text">
					<h6>Проспект Мира 102</h6>
					<p>(Бизнес центр "Парк мира")</p>
				</div>
			</div>
		</div>
		<div class="contacts-list__item">
			<div class="contact-icon">
				<img src="/images/contacts-icon-metro.png" alt="">
				<div class="contact-icon__text">
					<h6>Метро Алексеевская</h6>
					<p>(5 минут пешком от метро)</p>
				</div>
			</div>
		</div>
		<div class="contacts-list__item">
			<div class="contact-icon">
				<img src="/images/contacts-icon-car.png" alt="">
				<div class="contact-icon__text">
					<h6>Платная парковка</h6>
					<p>(40 рублей в час)</p>
				</div>
			</div>
		</div>
	</div>

	<div id="map">
		<script charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=kozKoP5ElQ4lOaiQcmSsPZxKyyuKq5fg&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
	</div>
    <br>
    <div class="hidden-sm">
        <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sru!2sru!4v1491652817927!6m8!1m7!1skEZJukw_so6MNis1HcQAkQ!2m2!1d55.80055582611472!2d37.63600495629265!3f90.63259932868107!4f11.340110943518795!5f0.5172083073603602" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <br class="hidden-sm">
    <img src="/images/google-panorama.png" alt="Главный вход" class="img-responsive">
    <br>
    <div>
    </div>
</div>

<div class="white-popup mfp-hide" id="questions-popup">
	<div class="popup">
		<div class="popup__header">
			<h5 class="popup__title">
				Спросите то что вас интересует и мы обязательно вам ответим.
			</h5>
		</div>
		<div class="popup__body js-question-form-body">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id' => 'question-form',
				'action' => Yii::app()->createUrl('/question/index'),
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
					'validateOnChange'=>false,
					'afterValidate'=>'js: function(form, data, hasError) {submitForm(form, hasError);}',
					'errorMessageCssClass' => 'mui-error',
				),
				'htmlOptions' => [
					'class' => 'content-form',
				],
			)); ?>
				<div class="form-row">
					<div class="mui-input-group">
						<?php echo $form->textField($modelQuestion,'username',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
						<span class="mui-highlight"></span>
						<span class="mui-bar"></span>
						<?php echo $form->labelEx($modelQuestion,'username', ['class' => 'mui-label']); ?>
						<?php echo $form->error($modelQuestion,'username', ['class' => 'mui-error']); ?>
					</div>
				</div>
				<div class="form-row">
					<div class="mui-input-group">
						<?php echo $form->textField($modelQuestion,'email',array('maxlength'=>255, 'class' => 'js-input mui-input')); ?>
						<span class="mui-highlight"></span>
						<span class="mui-bar"></span>
						<?php echo $form->labelEx($modelQuestion,'email', ['class' => 'mui-label']); ?>
						<?php echo $form->error($modelQuestion,'email', ['class' => 'mui-error']); ?>
					</div>
				</div>
				<div class="form-row">
					<div class="mui-input-group">
						<?php echo $form->textArea($modelQuestion,'question',array('class' => 'js-input mui-input')); ?>
						<span class="mui-highlight"></span>
						<span class="mui-bar"></span>
						<?php echo $form->labelEx($modelQuestion,'question', ['class' => 'mui-label']); ?>
						<?php echo $form->error($modelQuestion,'question', ['class' => 'mui-error']); ?>
					</div>
				</div>
				<div class="form-row_button">
					<button type="submit" class="button button_green button_arrow">Отправить</button>
				</div>
			<?php $this->endWidget(); ?>
		</div>
		<div class="popup__footer">
			Ваши контактные данные в безопасности и не будут <br> переданы третьим лицам.
		</div>
	</div>
</div>

<div class="white-popup mfp-hide" id="reviews-popup">
	<div class="popup">
		<div class="popup__header">
			<h5 class="popup__title">
				Оставьте свой отзыв, или пожелание! Ваше мнение для нас очень важно.
			</h5>
		</div>
		<div class="popup__body js-review-form-body">
			<?php $this->widget('\reviews\widgets\NewReviewForm', ['actionUrl'=>'/reviews/default/addReview', 'view' => 'contacts_form']); ?>
		</div>
		<div class="popup__footer">
			Ваши контактные данные в безопасности и не будут <br> переданы третьим лицам.
		</div>
	</div>
</div>

<div class="white-popup mfp-hide" id="callback-popup">
	<div class="popup">
		<div class="popup__header">
			<h5 class="popup__title">
				Напишите свой номер телефона и мы обязательно вам перезвоним в ближайшее время.
			</h5>
		</div>
		<div class="popup__body">
			<?php
                $this->widget('\feedback\widgets\FeedbackWidget', array(
                    'id' => 'callback4',
                    'view' => '//feedback/contacts',
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

<script >
	function submitForm(form, hasError) {
		if (!hasError) {
			$.post($(form).attr('action'), $(form).serialize(), function(data) {
				var message = '';
	
				if (data == 'ok') {
					message = '<h2 class="text-center">Ваш вопрос отправлен</h2>';
					$('.content-form-box').hide();
				} else {
					message = '<h2 class="text-center">При отправке вопроса возникла ошибка</h2>';
				}
	
				$('.js-question-form-body').html(message);
			});
		}
	}
</script>