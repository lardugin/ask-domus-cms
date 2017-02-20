<?php
namespace common\behaviors;

use common\components\helpers\HYii as Y;
use common\components\helpers\HDb;
use common\components\helpers\HModel;
use common\components\helpers\HHook;
use common\components\helpers\HAjax;

class ARControllerBehavior extends \CBehavior
{
	/**
	 * Сохранение модели
	 * @param \CActiveRecord $model модель
	 * @param array $attributes атрибуты, значения которых будут возвращены при ajax запросе.
	 * @param string $formId id формы (для ajax валидации).
	 * @param array $handlers массив обработчиков (name=>function).
	 * Доступны следующие обработчики:
	 * "beforeSave" обработчик который будет вызван до сохранения модели. По умолчанию действия произведено не будет.
	 * "save" обработчик который будет вызван для сохранения модели. По умолчанию будет вызван $model->save().
	 * "afterSave" будет вызван после сохранения (если запрос не является ajax-запросом). По умолчанию будет вызвран метод refresh().
	 * @return boolean
	 */
	protected function save($model, $attributes=[], $formId=null, $handlers=null)
	{
		if(HModel::isFormRequest($model)) {
			$model=HDb::massiveAssignment($model);
	
			HHook::exec($handlers, 'beforeSave', [$model]);
			$hSave=HHook::get($handlers, 'save', function() use ($model) { return $model->save(); });
			if(Y::request()->isAjaxRequest) {
				HModel::performAjaxValidation($model, $formId);
	
				if($success=HHook::hexec($hSave, [$model])) {
					HHook::exec($handlers, 'afterSave', [$model]);
				}
				HAjax::end(
					$success, 
					['isNewRecord'=>$model->isNewRecord, 'attributes'=>$model->getAttributes($attributes)], 
					$model->getErrors()
				);
			}
			elseif(HHook::hexec($hSave, [$model])) {
				HHook::exec($handlers, 'afterSave', [$model], function() { $this->refresh(); });
			}
		}
	
		return false;
	}
	
	/**
	 * Загрузка модели
	 * @param mixed $className имя класса модели или объект модели \CActiveRecord
	 * @param mixed $id идентификатор модели
	 * @param mixed $exception бросить исключение, если модель не найдена. По умолчанию TRUE.
	 * Может быть передан массив вида
	 * array(
	 * 	class=>класс исключения. По умолчанию \CHttpException.
	 *  code=>код исключения. По умолчанию 404.
	 *  message=>сообщение исключения. По умолчанию NULL.
	 * );
	 * В массиве могут быть переданы не все параметры.
	 * Любое пустое значение интерпретируется как FALSE.
	 * @param mixed объект критерия(\CDbCriteria или array) для запроса получения модели. По умолчанию NULL(не задан).
	 * @see \CActiveRecord::findByPk()
	 * @throws CHttpException
	 * @return mixed объект найденой модели. Если $throwException=FALSE и модель не найдена, возвратит NULL.
	 * @FIXME имя первичного ключа для запроса поиска модели задано жестко "id".
	 */
	public function loadModel($className, $id, $exception=true, $criteria=null)
	{
		if(empty($criteria) || is_array($criteria))
			$criteria=new \CDbCriteria($criteria?:array());
	
		$criteria->params[':id']=$id;
		$criteria->addCondition('id=:id');
		$model=$className::model()->find($criteria);
	
		if(!empty($exception) && ($model===null)) {
			$isA=is_array($exception);
			$class=($isA && isset($exception['class'])) ? $exception['class'] : '\CHttpException';
			$code=($isA && isset($exception['code'])) ? $exception['code'] : 404;
			$msg=($isA && isset($exception['message'])) ? $exception['message'] : null;
	
			throw new $class($code, $msg);
		}
	
		return $model;
	}
} 