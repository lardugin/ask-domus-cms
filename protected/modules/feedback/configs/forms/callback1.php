<?php
/**
 * Обратный звонок
*
* 1 Имя
* 3 Контактный телефон
*/
return array(
	'callback1' => array(
		'title' => 'Остались вопросы',
		'short_title' => 'Остались вопросы',
		// Options
		'options' => array(
			'useCaptcha' => false,
			'sendMail' => true,
			'emptyMessage' => 'Заявок нет',
		),
		// Form attributes
		'attributes' => array(
			'phone' => array(
				'label' => 'Ваш Телефон',
				'type' => 'String',
				'rules' => array(
					array('phone', 'required')
				),
			),
		),
		// Control buttons
		'controls' => array(
			'send' => array(
				'title' => 'Отправить'
			),
		),
	),
);