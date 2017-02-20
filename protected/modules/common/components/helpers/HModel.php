<?php
/**
 * Model helper
 */
namespace common\components\helpers;

use common\components\helpers\HYii as Y;

class HModel
{
	/**
	 * Массовое присваивание.
	 * @param mixed $model объект или имя класса модели
	 * @param bool $forciblyReturnModel в любом случае, возвращать модель. По умолчанию FALSE.
	 * @param bool $isPost указывает, что данные переданы исключительно методом POST. По умолчанию TRUE.
	 * @return mixed объект модели, либо false, если не задано принудительное создание модели
	 * и не переданы значения для массового присваивания.
	 */
	public static function massiveAssignment($model, $forciblyReturnModel=false, $isPost=true)
	{
		$name = \CHtml::modelName($model);
		$isset = $isPost ? isset($_POST[$name]) : isset($_REQUEST[$name]);
		if($isset) {
			if(is_string($model)) $model = new $model();
	
			$model->attributes = $isPost ? $_POST[$name] : $_REQUEST[$name];
	
			return $model;
		}
	
		return $forciblyReturnModel ? (is_object($model) ? $model : new $model()) : false;
	}
	
	/**
	 * Получить значение свойства модели.
	 * @param mixed $model объект модели.
	 * @param string $property имя свойства.
	 * @param mixed $default значение по умолчанию, которое будет возвращено, 
	 * если свойство не найдено.
	 * @param boolean $forcibly принудительно получать значение свойства, даже если 
	 * его не существует. Требуется для свойств, которые получаются динамически, 
	 * например через магический метод __get(). 
	 * Для моделей наследуемых от \CComponent проверка осуществляется через метод
	 * hasProperty().
	 * @return string
	 */
	public static function getProperty($model, $property, $default=null, $forcibly=false)
	{
		if(is_object($model)
			&& ((($model instanceof \CComponent) && $model->hasProperty($property))
				|| (($model instanceof \CActiveRecord) && $model->hasAttribute($property))
				|| $forcibly || property_exists($model, $property))) 
		{
			return $model->$property;
		}
		
		return $default;
	}

	/**
	 * Проверка, отправлены ли в запросе данные для модели из формы.
	 * @param CModel|string $model модель или имя класса модели.
	 * @param boolean $isPost проверять только POST данные. По умолчанию FALSE.
	 * @return boolean
	 */
	public static function isFormRequest($model, $isPost=false)
	{
		$name=\CHtml::modelName($model);
	
		return $isPost ? isset($_POST[$name]) : isset($_REQUEST[$name]);
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param mixed $model the model to be validated.
	 * @param string $formId form id.
	 * @param boolean $isPost Получить данные только из POST запроса.
	 * @return string Если запрос является проверкой на валидацию
	 * выводится результат CActiveForm::validate() и скрипт завершается.
	 */
	public static function performAjaxValidation($model, $formId, $isPost=true)
	{
		if (self::isAjaxValidation($formId, $isPost)) {
			echo \CActiveForm::validate($model);
			Y::end();
		}
	}
	
	/**
	 * Проверка, является ли текущий запрос, запросом валидации формы.
	 * @param string $formId id формы.
	 * @param boolean $isPost Получить данные только из POST запроса.
	 * @return boolean
	 */
	public static function isAjaxValidation($formId, $isPost=true)
	{
		$ajax = $isPost ? Y::request()->getPost('ajax') : Y::request()->getParam('ajax');
		return (!empty($formId) && $ajax === $formId);
	}
}