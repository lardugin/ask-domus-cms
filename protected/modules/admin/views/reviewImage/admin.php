<?php
/* @var $this ReviewImageController */
/* @var $model ReviewImage */

$this->breadcrumbs=array(
	'Отзывы (картинки)'=>array('index'),
	'Управление',
);
?>
<h1>Редактирование отзывов</h1>

<a href="/cp/reviewImage/create" type="button" class="btn btn-primary">Создать отзыв</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'review-image-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped  table-bordered table-hover items_sorter',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'preview',
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
