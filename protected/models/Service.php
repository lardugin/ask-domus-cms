<?php

/**
 * This is the model class for table "service".
 *
 * The followings are the available columns in table 'service':
 * @property integer $id
 * @property string $title
 * @property string $preview
 * @property string $link
 * @property integer $sort
 */
class Service extends DActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service';
	}

	public function behaviors()
    {
        return [
            'imageBehavior'=>[
                'class'=>'\common\ext\file\behaviors\FileBehavior',
                'attribute'=>'preview',
                'attributeLabel'=>'Изображение',
//                'attributeEnable'=>'image_enable',
//                'attributeAlt'=>'image_alt',
                'imageMode'=>true
            ],
        ];
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return parent::rules(array(
            array('title, link', 'required'),
            ['preview', 'safe'],
            array('sort', 'numerical', 'integerOnly'=>true),
            array('title, preview, link', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, preview, link, sort', 'safe', 'on'=>'search'),
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
            'preview' => 'Изображение',
            'link' => 'Ссылка',
            'sort' => 'Порядок сортировки',
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
		$criteria->compare('preview',$this->preview,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Service the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
