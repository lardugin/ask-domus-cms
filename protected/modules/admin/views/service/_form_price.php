<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */

$prices = [
    'price_sale_date',
    'price1',
    'price1_old',
    'price2',
    'price2_old',
    'price3',
    'price3_old',
]
?>

<?php foreach ($prices as $price): ?>
    <div class="row">
        <?php echo $form->label($model, $price); ?>
        <?php echo $form->textField($model, $price, array('class'=>'form-control')); ?>
        <?php echo $form->error($model, $price); ?>
    </div>
<?php endforeach; ?>