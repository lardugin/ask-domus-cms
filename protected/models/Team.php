<?php
use common\components\helpers\HArray as A;

/**
 * This is the model class for table "team".
 *
 * The followings are the available columns in table 'team':
 * @property integer $id
 * @property string $title
 * @property string $position
 * @property string $preview
 * @property integer $sort
 */
class Team extends DActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return parent::rules(array(
            array('title, position', 'required'),
            ['preview', 'safe'],
            array('sort', 'numerical', 'integerOnly'=>true),
            array('title, position, preview', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, position, preview, sort', 'safe', 'on'=>'search'),
        ));
	}

    public function behaviors()
    {
        return A::m(parent::behaviors(), [
        	'imageBehavior'=>[
                'class'=>'\common\ext\file\behaviors\FileBehavior',
                'attribute'=>'preview',
                'attributeLabel'=>'Изображение',
//                'attributeEnable'=>'image_enable',
//                'attributeAlt'=>'image_alt',
                'imageMode'=>true
            ],
        ]);
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return parent::attributeLabels(array(
            'id' => 'ID',
            'title' => 'ФИО',
            'position' => 'Должность',
            'preview' => 'Изображение',
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
		$criteria->compare('position',$this->position,true);
		$criteria->compare('preview',$this->preview,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
