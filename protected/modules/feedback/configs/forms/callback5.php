<?php
/**
 * Обратный звонок
*
* 1 Имя
* 3 Контактный телефон
*/
return array(
	'callback5' => array(
		'title' => 'Заказать проект',
		'short_title' => 'Заказать проект',
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
			'phone' => array(
                'label' => 'Ваш Телефон',
                'type' => 'String',
                'rules' => array(
                    array('phone', 'required')
                ),
            ),
            'tariff' => array(
                'label' => 'Тариф',
                'type' => 'Hidden',
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