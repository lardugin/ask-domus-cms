<?
/** @var \common\widgets\form\CheckboxField $this */

echo $this->openTag();

echo $this->form->checkBox($this->model, $this->attribute, $this->htmlOptions) . '&nbsp;';
echo $this->labelTag();
echo $this->errorTag();

echo $this->closeTag();