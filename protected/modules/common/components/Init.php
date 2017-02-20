<?php
/**
 * Обязательный компонент инициализации модуля.
 * 
 * Подключение в файле конфигурации:
 * 'preload'=>[
 * 	'kontur_common_init'
 * ],
 * 'components'=>[
 * 	'kontur_common_init'=>['class'=>'\common\components\Init']
 * ]
 */
namespace common\components;

use common\components\helpers\HYii as Y;

class Init extends \CComponent
{
	protected $assetsBaseUrl=null;

	public function getAssetsBaseUrl()
	{
		if($this->assetsBaseUrl === null) {
			$this->assetsBaseUrl=Y::publish(\Yii::app()->getModule('common')->getBasePath() . Y::DS . 'assets');
		}
		return $this->assetsBaseUrl;
	}

	public function init()
	{
		\common\widgets\fancybox\Fancybox::publish();

		Y::registerHeadScriptFile($this->getAssetsBaseUrl().'/js/kontur/common/classes/Loader.js');
	}

	public function runLoader()
	{
		echo \CHtml::scriptFile($this->getAssetsBaseUrl().'/js/kontur/common/loader_run.js');
	}
} 
