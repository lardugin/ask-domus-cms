<?php
/**
 * Поведение атрибута даты обновления записи.
 * 
 */
namespace common\ext\updateTime\behaviors;

use common\components\helpers\HDb;
use common\components\helpers\HYii as Y;

class UpdateTimeBehavior extends \CBehavior
{
	/**
	 * @var string имя атрибута.
	 */
	public $attribute='update_time';
	
	/**
	 * @var string подпись атрибута.
	 */
	public $attributeLabel;
	
	/**
	 * @var boolean добавлять поле в таблицу модели, если такого не существует.
	 * По умолчанию (FALSE) не добавлять.
	 */
	public $addColumn=true;
	
	/**
	 * (non-PHPdoc)
	 * @see \CBehavior::events()
	 */
	public function events()
	{
		return [
			'onBeforeSave'=>'beforeSave'
		];
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CBehavior::attach()
	 */
	public function attach($owner)
	{
		parent::attach($owner);
		
		if($this->attributeLabel === null) {
			$t=Y::ct('\common\ext\updateTime\Messages.common', 'common');
			$this->attributeLabel=$t('default.label');
		}
		
		if($this->addColumn) {
			if($table=HDb::getTable($this->owner->tableName(), true)) {
				if(!$table->getColumn($this->attribute)) {
					HDb::execute(HDb::schema()->addColumn(
						$this->owner->tableName(),
						$this->attribute,
						'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
					));
				}
			}
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CActiveRecord::rules()
	 */
	public function rules()
	{
		return [
			[$this->attribute, 'safe']
		];
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CActiveRecord::attributeLabels()
	 */
	public function attributeLabels()
	{
		return [
			$this->attribute=>$this->attributeLabel
		];
	}
	
	/**
	 * Получить последнее время обновления в таблице модели. 
	 * @return timestamp
	 */
	public function getLastUpdateTime($condition='', $params=[])
	{
		$query='SELECT MAX(' . HDb::qc($this->attribute) . ') FROM ' . HDb::qt($this->owner->tableName());
		if($condition) {
			$query.=' WHERE ' . $condition;
		}
	
		return HDb::queryScalar($query, $params);
	}
	
	/**
	 * Event: onBeforeSave
	 */
	public function beforeSave()
	{
		$this->owner->{$this->attribute}=new \CDbExpression('NOW()');
		
		return true;
	}	
}