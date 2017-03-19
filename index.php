<?php
$start = microtime(true);

defined('D_MODE_LOCAL') or define('D_MODE_LOCAL', (strpos($_SERVER['SERVER_NAME'], 'local') !== false));

$debugMode = false;

if (D_MODE_LOCAL) {
    $debugMode = true;
}

ini_set('default_charset', 'utf8');
ini_set('display_errors', empty($debugMode)?'off':'on');
ini_set('short_open_tag', 'on');

date_default_timezone_set('Asia/Krasnoyarsk');

require_once(dirname(__FILE__).'/protected/components/helpers/HKontur.php');
HKontur::robots();

mb_internal_encoding('utf-8');

define('DS', DIRECTORY_SEPARATOR);

$yii = '../yii1116/framework/yiilite.php';

if (!is_file($yii)) {
    $yii = dirname(__FILE__).'/../yii/yiilite.php';
}

if (!is_file($yii)) {
    die('Framework not found!');
}

if(D_MODE_LOCAL || !empty($debugMode)) defined('YII_DEBUG') or define('YII_DEBUG',true);

defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$config = dirname(__FILE__).'/protected/config/main.php';

require_once($yii);

Yii::createWebApplication($config)->run();

//echo microtime(true) - $start;