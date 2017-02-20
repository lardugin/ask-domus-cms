<?php
/**
 * Обратный звонок
*
* 1 Имя
* 3 Контактный телефон
*/
return array(
	'callback2' => array(
		'title' => 'Обсудить проект',
		'short_title' => 'Обсудить проект',
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
				'title' => 'Обсудить проект'
			),
		),
	),
);