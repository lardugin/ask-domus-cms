<?php
/**
 * @var $categories AdviceCategory[]
 */
?>

<?php if (isset(Yii::app()->params['subcategories']) || !isset($model)): ?>
<div id="category-list-module">
  <ul class="category_list_button">
    <li>
      <?php
        if (!isset($model))
          echo CHtml::link('Новая категория', array('advice/categoryCreate'),array('class'=>'btn btn-primary btn-lg'));
        else
          echo CHtml::link('Новая категория', array('advice/categoryCreate', 'parent_id'=>$model->id),array('class'=>'btn btn-primary btn-lg'));
      ?>
    </li>
    <li>
      <?if(isset($model) || $categories) echo CHtml::link('Сортировать категории', array('advice/categorySort'), array('class'=>'btn btn-info btn-lg'));?>
    </li>
  </ul>
  <ul id="category-list" class="category-list">
    <?php foreach($categories as $c): ?>
    <li id="shop-category-<?php echo $c->id ?>"><?php echo CHtml::link($c->title, array('category', 'id'=>$c->id), array('class'=>'btn btn-default')); ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>

<div class="category-buttons" style="margin-bottom: 20px;">
  <?php
    $route = array('advice/productCreate');
    if (isset($model))
        $route['category_id'] = $model->id;
    ?>
  <?if(isset($model) || $categories) echo CHtml::link('Новый совет', $route, array('class'=>'add btn btn-primary')).'&nbsp;'?>
  <?php if (isset($model)) echo CHtml::link('Редактировать категорию', array('advice/categoryUpdate', 'id'=>$model->id), array('class'=>'add btn btn-info')); ?>
</div>
