<?php

/**
 * This is the model class for table "advice".
 *
 * The followings are the available columns in table 'advice':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property integer $category_id
 * @property AdviceCategory $category
 */
class Advice extends DActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advice';
	}

    public function behaviors()
    {
        return array(
            'aliasBehavior'=>array('class'=>'DAliasBehavior'),
            'metaBehavior'=>array('class'=>'MetadataBehavior'),
            'sortBehavior'=>['class'=>'\ext\D\sort\behaviors\SortBehavior']
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return parent::rules(array(
            array('title, alias, category_id', 'required'),
            ['description', 'safe'],
            array('category_id', 'numerical', 'integerOnly'=>true),
            array('title, alias', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, alias, description, category_id', 'safe', 'on'=>'search'),
        ));
	}

    public function scopes()
    {
        return array(
            'lastRecord'=>array(
                'order'=>'id DESC',
                'limit'=>1,
            ),
        );
    }

    public function relations()
    {
        return parent::relations(array(
            'category'=>array(self::BELONGS_TO, 'AdviceCategory', 'category_id'),
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
            'category_id' => 'Категория',
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
		$criteria->compare('category_id',$this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCategories()
    {
        $cats_list = AdviceCategory::model()->findAll(array('order'=>'root, lft'));;
        if (isset(Yii::app()->params['subcategories'])) {
            $cats_list = CmsCore::prepareTreeSelect($cats_list);
        }
        $categories = CHtml::listData($cats_list, 'id', 'title');
        return $categories;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Advice|DActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
