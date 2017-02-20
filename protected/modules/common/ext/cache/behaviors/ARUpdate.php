<?php
/**
 * Поведение обновления кэша.
 */
namespace common\ext\cache\behaviors;

class ARUpdate extends \CBehavior
{
	public $cache=null;
	
	public $attributeId='id';
	
	/**
	 * (non-PHPdoc)
	 * @see \CBehavior::events()
	 */
	public function events()
	{
		return [
			'onAfterSave'=>'afterSave',
			'onAfterDelete'=>'afterDelete'
		];
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CBehavior::attach()
	 */
	public function attach($owner)
	{
		if(!$this->cache) {
			$this->cache=\Yii::app()->kcache;
		}
		return parent::attach($owner);
	}
	
	/**
	 * Event: afterSave
	 * @return boolean
	 */
	public function afterSave()
	{
		$this->cache->update([
			'id'=>$this->owner->{$this->attributeId},
			'table'=>$this->owner->tableName()
		]);
		
		return true;
	}
	
	/**
	 * Event: afterDelete
	 * @return boolean
	 */
	public function afterDelete()
	{
		$this->cache->update([
			'id'=>$this->owner->{$this->attributeId},
			'table'=>$this->owner->tableName()
		]);
		
		return true;
	}
}