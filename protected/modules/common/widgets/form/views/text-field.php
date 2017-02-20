<?
/** @var \common\widgets\form\TextField $this */

echo $this->openTag();
echo $this->labelTag();

echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
if(!empty($this->unit)) {
	echo \CHtml::tag($this->unitTag, $this->unitOptions, $this->unit);
}

echo $this->errorTag();
echo $this->closeTag();
