<?php
/**
 * @var $checkActive bool
 */
?>

<div class="pjax-links">
    <div class="work__tab-list">
        <?php foreach (Category::model()->roots()->findAll(['order' => 'ordering']) as $category): ?>
            <?php
            $class = 'work__tab-item';

            if ($checkActive && Yii::app()->request->getQuery('id') == $category->id) {
                $class .= ' active';
            }
            ?>
            <div class="<?= $class ?>">
                <?= CHtml::link($category->title, ['shop/category', 'id' => $category->id]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
