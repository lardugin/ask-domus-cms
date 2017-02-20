<?php
/**
 * Обратный звонок
*
* 1 Имя
* 3 Контактный телефон
*/
return array(
	'callback' => array(
		'title' => 'Дизайн проекта',
		'short_title' => 'Дизайн проекта',
		// Options
		'options' => array(
			'useCaptcha' => false,
			'sendMail' => true,
			'emptyMessage' => 'Заявок нет',
		),
		// Form attributes
		'attributes' => array(
			'name' => array(
				'label' => 'Ваше имя:',
				'type' => 'String',
				'placeholder' => 'Ваше имя',
				'rules' => array(
					array('name', 'required')
				),
			),
            'email' => array(
                'label' => 'Ваш e-mail:',
                'type' => 'String',
                'rules' => array(
                    array('email', 'email')
                ),
            ),
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