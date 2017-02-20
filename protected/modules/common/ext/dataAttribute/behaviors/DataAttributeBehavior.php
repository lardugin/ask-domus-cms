<?php
/**
 * Атрибут табличных данных.
 * PHP >=5.4
 *
 * Модель должна быть наследуемой от \common\components\base\ActiveRecord
 */
namespace common\ext\dataAttribute\behaviors;

use common\components\helpers\HYii as Y;
use common\components\helpers\HArray as A;
use common\components\helpers\HDb;

class DataAttributeBehavior extends \CBehavior
{
	/**
	 * @var string имя атрибута
	 * По умолчанию "data".
	 */
	public $attribute = 'data';
	
	/**
	 * @var string название атрибута.
	 * По умолчанию (NULL) из заданных в данном расширении.
	 */
	public $attributeLabel=null;

	/**
	 * @var boolean разрешены пустые записи или нет. 
	 * По умолчанию (FALSE) не разрешены.
	 */
	public $allowEmpty = false;
	
	/**
	 * Опция безопасного получения значения. 
	 * Если значение данного атрибута модели будет не возможно распаковать, 
	 * то возвращается пустой массив.
	 * @var boolean
	 * По умолчанию (TRUE) включена.
	 */
	public $safeGet = true;
	
	/**
	 * @var boolean добавить автоматически в таблицу базы данных поле для хранения данных 
	 * данного атрибута. 
	 * По умолчанию (TRUE) добавить.
	 */
	public $addColumn=true;

	/**
  	 * (non-PHPDoc)
  	 * @see \CBehavior::events();
	 */
	public function events() 
	{
		return [
			'onBeforeSave'=>'beforeSave'
		];
	}
	
	/**
	 * (non-PHPDoc)
	 * @see CBehavior::attach($owner)
	 */
	public function attach($owner)
	{
		parent::attach($owner);

		if($this->attributeLabel === null) {
			$t=Y::ct('\common\ext\dataAttribute\Messages.common', 'common');
			$this->attributeLabel=$t('default.label');
		}
		
		if($this->addColumn) {
			if($table=HDb::getTable($this->owner->tableName(), true)) {
				if(!$table->getColumn($this->attribute)) {
					HDb::execute(HDb::schema()->addColumn(
						$this->owner->tableName(),
						$this->attribute,
						'TEXT'
					));
				}
			}
		}
	}
	
	/**
	 * (non-PHPDoc)
	 * @see CModel::rules()
	 */
	public function rules()
	{
		return [
			[$this->attribute, 'safe']
		];
	}

	/**
	 * (non-PHPDoc)
	 * @see CModel::attributeLabels()
	 */
	public function attributeLabels()
	{
		return [
			$this->attribute=>$this->attributeLabel
		];
	}

	/**
	 * Before save
	 * @return boolean
	 */
	public function beforeSave()
	{ 
		return $this->set($this->owner->{$this->attribute});		
	}
	
	/**
	 * Получить элементы атрибута.
	 * @param boolean $returnActive возврщать только активные элементы.
	 * По умолчанию (FALSE) возвращать все.
	 * @param boolean $preserveKeys сохранять ключи. По умолчанию (FALSE) не сохранять.
	 * @return mixed
	 */
	public function get($returnActive=false, $preserveKeys=false)
	{
		try {
			$value=$this->owner->{$this->attribute};
			if(is_array($value)) $data=$value;
			else $data=unserialize($value);
			
			if($returnActive && !empty($data)) {
				$actived = [];
				foreach($data as $idx=>$item) {
					if(A::get($item, 'active')) {
						if($preserveKeys) $actived[$idx] = $item;
						else $actived[] = $item;
					}
				}
				$data=$actived;
			}

			if(empty($data)) $data=[];
		}
		catch(\Exception $e) {
			if($this->safeGet) return array();
			else throw $e;
		}
		
		return is_array($data) ? $data : array();
	}
	
	/**
	 * Set attribute
	 * @param array $value
	 */
	public function set($value)
	{	
		if(is_array($value)) {
			if(!$this->allowEmpty) {
				foreach($value as $idx=>$data) {
					if(empty($data) || (is_array($data) && !array_filter($data, function($v) {
						return !empty($v);
					}))) 
					{
						unset($value[$idx]);
					}
					elseif(!isset($data['active'])) {
						$value[$idx]['active']=0;
					}
				}
			}
		}
		elseif($this->safeGet) {
			$value = array();
		}

		$this->owner->{$this->attribute} = serialize($value);

		return true;
	}
	
	/**
	 * Получить список значений.
	 * @param string $fieldValue имя поля значений (ключа)
	 * @param string $fieldText имя поля подписи (значения)
	 * @param boolean $returnActive возвращать только активные элементы. 
	 * По умолчанию (TRUE) только активные. Если передано FALSE будут
	 * возвращены все элементы. 
	 * @return arary
	 */
	public function listData($fieldValue, $fieldText, $returnActive=true)
	{
		$listData=[];
		
		$data=$this->get($returnActive);
		if(!empty($data)) {
			foreach($data as $idx=>$item) {
				$listData[A::get($item, $fieldValue)]=A::get($item, $fieldText);
			}
		}
		
		return $listData;
	}
	
	/**
	 * Получить объект \CArrayDataProvider
	 * @param boolean $returnActive возврщать только активные элементы.
	 * По умолчанию (FALSE) возвращать все.
	 * @param boolean $preserveKeys сохранять ключи. По умолчанию (FALSE) не сохранять.
	 * @param array $options массив параметров для \CArrayDataProvider.
	 * @return \CArrayDataProvider
	 */
	public function getDataProvider($returnActive=false, $preserveKeys=false, $options=[])
	{
		return new \CArrayDataProvider($this->get($returnActive, $preserveKeys), $options);
	}
}
