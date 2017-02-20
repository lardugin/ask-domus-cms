<?php
/**
 * Виджет поля формы "Дата".
 *
 */
namespace common\widgets\form;

use common\components\widgets\form\BaseField;

class DateField extends BaseField
{
	/**
	 * (non-PHPDoc)
	 * @see \CJuiDatePicker::$language
	 */
	public $language='ru';
	
	
	/**
	 * (non-PHPDoc)
	 * @see \CJuiDatePicker::$options
	 */
	public $options=['dateFormat'=>'yy-mm-dd'];
	
	/**
	 * @var array HTML options CJuiDateTimePicker
	 * @see \CJuiDatePicker::$htmlOptions
	*/
	public $htmlOptions=['class'=>'form-control', 'readonly'=>true];
	
	/**
	 * (non-PHPDoc)
	 * @see \common\components\widgets\form\BaseField::$view
	 */
	public $view='date-field';
}