<?php
/**
 * Основной класс для контроллеров модуля администрирования модуля "Настройки". 
 *
 */
namespace settings\modules\admin\components;

use common\components\helpers\HYii as Y;
use common\components\helpers\HArray as A;
use settings\components\helpers\HSettings;

\Yii::import('admin.components.AdminController');

abstract class BaseController extends \AdminController
{
	/**
	 * @var string путь к шаблонам контроллера.
	 */
	public $viewPathPrefix='settings.modules.admin.views.';
	
	/**
	 * (non-PHPdoc)
	 * @see \CController::behaviors()
	 */
	public function behaviors()
	{
		return A::m(parent::behaviors(), [
			'arControllerBehavior'=>['class'=>'\common\behaviors\ARControllerBehavior']
		]);
	} 
	
	/**
	 * (non-PHPDoc)
	 * @see \CController::__construct()
	 */
	public function __construct($id, $module=null)
	{
		Y::module('settings')->getModule('admin');
		
		parent::__construct($id, $module);
	}
	
	protected function loadConfigModel($id)
	{
		if(!($model=HSettings::getById($id))) {
			throw new \CHttpException(404);
		}
		
		return $model;
	} 
}