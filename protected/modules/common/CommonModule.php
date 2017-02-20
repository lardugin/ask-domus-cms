<?php
/**
 * Модуль общих компонентов
 */
use common\components\helpers\HYii as Y;
use common\components\base\WebModule;

class CommonModule extends WebModule
{
	/**
	 * (non-PHPdoc)
	 * @see CModule::init()
	 */
	public function init()
	{
		parent::init();
		
		\common\widgets\fancybox\Fancybox::publish();
		
		$this->assetsBaseUrl=Y::publish([
			'path'=>$this->getAssetsBasePath(),
			'js'=>[
				'js/kontur/common/classes/Kontur.js', 
				'js/kontur/common/classes/Lang.js', 
				'js/kontur/common/messages/ru/common.js', 
				'js/kontur/common/classes/DataJs.js',
				'js/kontur/common/classes/Ajax.js',
				'js/kontur/common/classes/IFrame.js',
				'js/kontur/common/classes/ActiveForm.js',
				'js/kontur/common/classes/Fancybox.js'
			]
		]);
	}
}