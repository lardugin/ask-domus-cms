<?php
namespace common\behaviors;

use common\components\helpers\HArray as A;

class SettingsBehavior extends \CBehavior
{
	/**
	 * @var string имя группы настроек
	 */
	public $category;
	
	/**
	 * @var array параметры по умолчанию array(name=>value)
	 */
	public $default=[];
	
	/**
	 * (non-PHPdoc)
	 * @see \CBehavior::attach()
	 */
	public function attach($component)
	{
		parent::attach($component);
		$this->loadSettings();
	}
	
	/**
	 * Cохранение настроек
	 */
	public function saveSettings()
	{
		\Yii::app()->settings->set($this->category, $this->owner->attributes);
	}
	
	/**
	 * Загрузка настроек
	 */
	public function loadSettings()
	{
		foreach($this->owner->attributeNames() as $attribute) {
			$value=\Yii::app()->settings->get($this->category, $attribute, A::get($this->default, $attribute));
			if($value !== null) {
				$this->owner->$attribute=$value;
			}
		}
	}
}