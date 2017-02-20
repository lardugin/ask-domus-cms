<?php
/**
 * Тип поля "Выпадающий список".
 *
 * @var \common\ext\dataAttribute\widgets\DataAttribute $this 
 * @var string $name имя поля
 * @var string $value значение поля
 * @var string|array $data данные типа
 * @var array $params дополнительные параметры
 * @var string $view шаблон отображения
 * @var boolean $isTemplate генерируется шаблон нового элемента.
 */

echo \CHtml::dropDownList($name, $value, $data, ['class'=>'daw-inpt form-control', 'disabled'=>$isTemplate]);
?>