<?php

/**
 * This is the model class for table "advice_category".
 *
 * The followings are the available columns in table 'advice_category':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property integer $ordering
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 */
class AdviceCategory extends DActiveRecord
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

    public function relations()
    {
        return parent::relations(array(
            'productCount'=>[self::STAT, 'Advice', 'category_id']
        ));
    }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advice_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return parent::rules(array(
            array('title, alias', 'required'),
            ['description, root, lft, rgt, level', 'safe'],
            array('ordering, root, lft, rgt, level', 'numerical', 'integerOnly'=>true),
            array('title, alias', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, alias, description, ordering, root, lft, rgt, level', 'safe', 'on'=>'search'),
        ));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return parent::attributeLabels(array(
            'id' => 'ID',
            'title' => 'Заголовок',
            'alias' => 'URL',
            'description' => 'Описание',
            'ordering' => 'Ordering',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
        ));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('root',$this->root);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
        $criteria->select='`t`.`id`';

        return Advice::model()->count($criteria);
    }

    public function getAdviceList($descendantsLevel = null)
    {
        $categoryIDs=[];

        if($descendantsLevel !== 0) {
            $descendants = $this->descendants($descendantsLevel)->findAll(['index'=>'id', 'select'=>'id']);
            if($descendants) {
                $categoryIDs = array_keys($descendants);
            }
        }

        $categoryIDs[] = $this->id;

        $criteria=new \CDbCriteria();

        $criteria->addInCondition('`t`.`category_id`', $categoryIDs);
        $criteria->select = '`t`.`id`, `t`.`id`, `t`.`title`';
        $criteria->order = 'title';

        return Advice::model()->findAll($criteria);
    }

    public function afterSave()
    {
        // очистка всего кэша
        \Yii::app()->cache->flush();

        return parent::afterSave();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdviceCategory|DActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
