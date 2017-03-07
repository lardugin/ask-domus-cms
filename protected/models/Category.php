<?php
use common\components\helpers\HDb;

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $ordering
 */
class Category extends DActiveRecord
{
    public function behaviors()
    {
        return array(
            'NestedSetBehavior'=>array(
                'class'=>'ext.yiiext.behaviors.trees.NestedSetBehavior',
                'leftAttribute'=>'lft',
                'rightAttribute'=>'rgt',
                'levelAttribute'=>'level',
                'hasManyRoots'=>true
            ),
        	'aliasBehavior'=>array('class'=>'DAliasBehavior'),
        	'metaBehavior'=>array('class'=>'MetadataBehavior')
        );
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return parent::rules(array(
			array('title', 'required'),
			//array('ordering', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('description, parent_id', 'safe'),
			array('id, title, description, ordering', 'safe', 'on'=>'search'),
		));
	}
    
	public function relations()
	{
		return parent::relations(array(
            'tovars'=>array(self::HAS_MANY, 'Product', 'category_id'),
			'images'=>array(self::HAS_MANY, 'CImage', 'item_id',
					'condition'=>'model = :model',
					'params'=>array(':model' => strtolower(get_class($this))),
					'order'=>'images.ordering'
			),
			'mainImg'=>array(self::HAS_ONE, 'CImage', 'item_id',
				'condition'=>'model = :model',
				'params'=>array(':model' => strtolower(get_class($this))),
				'order'=>'mainImg.ordering'
			),
			'productCount'=>[self::STAT, 'Product', 'category_id']
		));
	}

    /**
     * Scope: выбор категорий по ЧПУ бренда
     * @param string $alias ЧПУ бренда
     */
    public function byBrandAlias($alias)
    {
    	$cacheId=md5('brand_'.$alias.'_categoryIDs');
    	$categoryIDs=\Yii::app()->cache->get($cacheId);
    	if(!$categoryIDs && !is_array($categoryIDs)) {
    	     $categoryIDs=HDb::queryColumn(
    	     	'SELECT `t`.`category_id` FROM `product` AS `t`'
    	     	. ' INNER JOIN `brand` as `b` ON (`t`.`brand_id`=`b`.`id`)'
    	     	. ' WHERE `b`.`alias`=:alias GROUP BY `t`.`category_id`',
    	     	[':alias'=>$alias]
    	     );
    	     \Yii::app()->cache->set($cacheId, $categoryIDs);
    	}

    	$criteria=new CDbCriteria;
    	if(!empty($categoryIDs)) {
	    	$criteria->addInCondition('`t`.`id`', $categoryIDs);
	    }
	    else {
	    	$criteria->AddCondition('`t`.`id`<>`t`.`id`');
	    }
    	$this->getDbCriteria()->mergeWith($criteria);

    	return $this;
    }

    /**
     * Scope: выбор категорий по id бренда
     * @param string $id id бренда
     */
    public function byBrandId($id)
    {
    	$cacheId=md5('brand_id_'.$id.'_categoryIDs');
    	$categoryIDs=\Yii::app()->cache->get($cacheId);
    	if(!$categoryIDs && !is_array($categoryIDs)) {
    	     $categoryIDs=HDb::queryColumn(
    	     	'SELECT `t`.`category_id` FROM `product` AS `t` WHERE `t`.`brand_id`=:id GROUP BY `t`.`category_id`',
    	     	[':id'=>$id]
    	     );
    	     \Yii::app()->cache->set($cacheId, $categoryIDs);
    	}

    	$criteria=new CDbCriteria;
    	if(!empty($categoryIDs)) {
	    	$criteria->addInCondition('`t`.`id`', $categoryIDs);
	    }
	    else {
	    	$criteria->AddCondition('`t`.`id`<>`t`.`id`');
	    }
    	$this->getDbCriteria()->mergeWith($criteria);

    	return $this;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return parent::attributeLabels(array(
			'id' => 'ID',
			'title' => 'Название',
			'description' => 'Описание',
			'ordering' => 'Порядок',
            'parent_id'=>'Родитель'
		));
	}
	
	public function afterSave()
	{
		// очистка всего кэша
		\Yii::app()->cache->flush();
		
		return parent::afterSave();
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ordering',$this->ordering);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getMaxPrice(){
		$price = Yii::app()->db->createCommand('SELECT max(price) from product where category_id='.Yii::app()->request->getParam('id'))->queryRow();
		return (int)$price['max(price)'];
	}
	
	public function getMinPrice(){
		$price = Yii::app()->db->createCommand('SELECT min(price) from product where category_id='.Yii::app()->request->getParam('id'))->queryRow();
		return (int)$price['min(price)'];
	}

	public function getProductsCount($criteria=null, $descendantsLevel=null)
	{
        $categoryIDs=[];
        if($descendantsLevel !== 0) {
	       	$descendants=$this->descendants($descendantsLevel)->findAll(['index'=>'id', 'select'=>'id']);
       		if($descendants) {
    	    	$categoryIDs=array_keys($descendants);
	        }
        }
        $categoryIDs[]=$this->id;

        if($criteria === null) {
        	$criteria=new \CDbCriteria();
        } 
        elseif(!($criteria instanceof \CDbCriteria)) {
        	$criteria=new \CDbCriteria($criteria);
        }

	    $criteria->addInCondition('`t`.`category_id`', $categoryIDs);
        $criteria->mergeWith(Product::model()->getRelatedCriteria($categoryIDs), 'OR');
        $criteria->select='`t`.`id`';

        return Product::model()->count($criteria);
	}
}
