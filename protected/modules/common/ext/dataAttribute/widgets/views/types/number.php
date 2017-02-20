<?php
/**
 * Тип поля "Число".
 * 
 * В $params может быть передан параметр "step" - шаг. По умолчанию 1(единица).
 *
 * @var \common\ext\dataAttribute\widgets\DataAttribute $this 
 * @var string $name имя поля
 * @var string $value значение поля
 * @var string|array $data данные типа
 * @var string $view шаблон отображения
 * @var array $params дополнительные параметры
 * @var boolean $isTemplate генерируется шаблон нового элемента.
 */
use common\components\helpers\HArray as A;

echo \CHtml::numberField($name, $value, [
	'class'=>'daw-inpt form-control', 
	'step'=>A::get($params, 'step', 1), 
	'maxlength'=>255, 
	'disabled'=>$isTemplate
]);
?>