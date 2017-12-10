<?php
//require_once($_SERVER['DOCUMENT_ROOT'].'/protected/modules/reviews/components/rules/ReviewsRule.php');

return array(
	'settings/admin/default/index/<id:\w+>' => 'settings/admin/default/index',
	'admin/settings/<id:\w+>' => 'admin/settings/index',
	'cp/settings/<id:\w+>' => 'admin/settings/index',

    array('class' => 'application.components.rules.DAdviceRule'),
    array('class' => 'application.components.rules.DShopRule'),

    // Admin
    'cp' => 'admin/default/index',
    'cp/<controller>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
    'cp/<controller>/<action>' => 'admin/<controller>/<action>',
    'cp/<controller>' => 'admin/<controller>',

    // Admin
    'devcp' => 'devadmin/default/index',
    'devcp/<controller>/<action:\w+>/<id:\d+>' => 'devadmin/<controller>/<action>',
    'devcp/<controller>/<action>' => 'devadmin/<controller>/<action>',
    'devcp/<controller>' => 'devadmin/<controller>',

    // Site Defaults
	'/download/<filename:.*>' => 'site/downloadFile',
    'brands' => 'brand/index',
    'brands/<alias>' => 'brand/view',
    // '<code:(404)>' => 'error/index',
    '' => 'site/index',
    'cart' => 'dCart/index',
    'questions' => 'question/index',

    'vopros-otvet' => '/question',

    'otzyvy' => 'reviews/default/index',
    '/otzyvy/' => '/reviews',

    'sitemap' => 'site/sitemap',

    'search/index' => 'search/index',
    'sovety' => 'sovety/index',

    array('class' => 'application.components.rules.DAliasRule'),
//	['class' => '\reviews\components\rules\ReviewsRule'],
    'novosti/<id:\d+>' => 'site/event',
    'novosti' => 'site/events',
	'sale' => 'sale/list',
	'sale/index' => 'sale/list',
	'sale/<id:\d+>' => 'sale/view',
	'otzyvy/<id:\d+>' => 'reviews/default/view',


    // Default Rules
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    '<module>/<controller>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
    '<module>/<controller>/<action:\w+>' => '<module>/<controller>/<action>',
);
