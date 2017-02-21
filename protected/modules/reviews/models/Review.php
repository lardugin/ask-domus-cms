<?php
namespace reviews\models;

use common\components\helpers\HYii as Y;
use common\components\helpers\HHtml;
use reviews\models\Settings;

class Review extends \DActiveRecord
{
	/**
	 * @var int|NULL запись имеет детальный текст.
	 */
	public $has_detail_text=null;

	/**
	 * (non-PHPdoc)
	 * @see \CActiveRecord::tableName()
	 */
	public function tableName()
	{
		return 'reviews';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CModel::behaviors()
	 */
	public function behaviors()
	{
		$t=Y::ct('ReviewsModule.models/review');
		
		return [
			'activeBehavior'=>[
				'class'=>'\common\ext\active\behaviors\ActiveBehavior',
				'attribute'=>'published',
				'attributeLabel'=>$t('label.published')
			],
			'aliasBehavior'=>['class'=>'\DAliasBehavior'],
			'metaBehavior'=>['class'=>'\MetadataBehavior'],
			'imageBehavior'=>[
				'class'=>'\ext\D\image\components\behaviors\ImageBehavior',
				'attribute'=>'image',
				'attributeLabel'=>$t('label.image'),
 				'attributeEnable'=>'image_enable',
 				'attributeEnableLabel'=>$t('label.imageEnable'),
 				'tmbWidth'=>Settings::model()->tmb_width,
 				'tmbHeight'=>Settings::model()->tmb_height
			]	
		];
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \DActiveRecord::rules()
	 */
	public function rules()
	{
		return parent::rules([
			['author, detail_text', 'required', 'on'=>'frontend_insert'],
			['preview_text', 'required', 'except'=>'frontend_insert'],
			['author', 'length', 'max'=>255],
			['detail_text, publish_date, comment, email', 'safe'],
            ['email', 'email'],
		]);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \DActiveRecord::scopes()
	 */
	public function scopes()
	{
		return parent::scopes([
			'hasDetailTextColumn'=>[
				'select'=>'IF(LENGTH(`t`.`detail_text`) > 0, 1, 0) AS `has_detail_text`'
			],
			'listingColumns'=>[
				'select'=>'`t`.*'
			],
			'byCreateDateDesc'=>[
				'order'=>'`create_time` DESC'
			],
			'byPublishDateDesc'=>[
				'order'=>'`publish_date` DESC'
			]
		]);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \DActiveRecord::attributeLabels()
	 */
	public function attributeLabels()
	{
		$t=Y::ct('ReviewsModule.models/review');
		return parent::attributeLabels([
			'author'=>$t('label.author'),
			'preview_text'=>$t('label.preview_text'),
			'detail_text'=>$t('label.detail_text'),
			'publish_date'=>$t('label.publish_date'),
			'create_time'=>$t('label.create_time'),
			'comment'=>$t('label.comment'),
            'email' => 'Ваш e-mail',
		]);
	}

	/**
	 * (non-PHPdoc)
	 * @see \CActiveRecord::beforeSave()
	 */
	public function beforeSave()
	{
		if(($this->scenario=='frontend_insert') && !empty(Settings::model()->auto_generate_preview_text)) {
			$this->preview_text=HHtml::getIntro($this->detail_text, Settings::model()->preview_text_length);
		}

		return parent::beforeSave();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CActiveRecord::afterDelete()
	 */
	public function afterDelete()
	{
		parent::afterDelete();
		
		$params=[
			'model'=>strtolower(\CHtml::modelName($this)),
			'item_id'=>$this->id
		];		
		$items=array_merge(
			\CImage::model()->findAllByAttributes($params),
			\File::model()->findAllByAttributes($params)
		);		
		foreach($items as $item) {
			$item->delete();
		}
		
		return true;
	}
}
