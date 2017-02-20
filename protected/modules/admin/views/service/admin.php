<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Услуги на главной'=>array('index'),
	'Управление',
);
?>
<h1>Редактирование услуг</h1>

<a href="/cp/service/create" type="button" class="btn btn-primary">Добавить услугу</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped  table-bordered table-hover items_sorter',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'preview',
		'link',
		'sort',
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'updateButtonImageUrl'=>false,
            'deleteButtonImageUrl'=>false,
            'buttons'=>array
            (
                'delete' => array
                (   
                    'label'=>'<span class="glyphicon glyphicon-remove"></span> ',
                    'options'=>array('title'=>'Удалить'),
                ),
                'update' => array
                (      
                    'label'=>'<span class="glyphicon glyphicon-pencil"></span> ',
                    'options'=>array('title'=>'Редактировать'),
                ),
            ),
        ),
	),
)); ?>
