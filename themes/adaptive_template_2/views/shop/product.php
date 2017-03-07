<?php
/**
 * @var $product Product
 */

$criteria = Product::model()->search(true, $product->category_id, 'id');
//$criteria->addCondition('`t`.`id` != ' . $product->id);
$criteria->addCondition('`t`.`inner_page` = 1');

$productIDs = array_keys(Product::model()->findAll($criteria));

$prev = end($productIDs);
$next = $productIDs[0];

$prev = $next = false;

foreach ($productIDs as $key => $productID) {
    if ($productID == $product->id) {
        if (isset($productIDs[$key + 1])) {
            $next = $productIDs[$key + 1];
        }

        if (isset($productIDs[$key - 1])) {
            $prev = $productIDs[$key - 1];
        }
    }
}

reset($productIDs);
?>

<h1 class="heading"><?= $product->getMetaH1() ?></h1>

<div class="inner-page">
    <div class="portfolio-inner-page">
        <div class="object-slider">
            <ul id="object-slider">
                <li><img src="<?= $product->getFullImg() ?> alt="<?=$product->title?>"></li>

                <?php foreach($product->moreImages as $id=>$img): ?>
                    <li><img src="<?= $img->url ?>" alt="<?=$img->description?>"></li>
                <?php endforeach; ?>
            </ul>
            <div class="object-slider_control"></div>
        </div>
    </div>
    <div class="portfolio-inner-description">
        <h5 class="heading-min"><?= $product->title ?></h5>
        <div class="portfolio-inner-description__param"><?= $product->subtitle ?> м<sup>2</sup></div>
    </div>

    <div class="content">
        <?= $product->description ?>
    </div>

    <div class="other-objects">
        <?php if ($prev): ?>
            <a href="<?= Yii::app()->createUrl('shop/product', ['id' => $prev]) ?>" class="prev-object">&laquo; Предыдущая работа</a>
        <?php endif; ?>

        <?php if ($next): ?>
            <a href="<?= Yii::app()->createUrl('shop/product', ['id' => $next]) ?>" class="next-object">Следующая работа &raquo;</a>
        <?php endif; ?>
    </div>

    <?php if ($productIDs): ?>
        <?php
        shuffle($productIDs);

        $productIDs = array_slice($productIDs, 0, 4);
        ?>
        <div class="objects-page__portfolio">
            <h3 class="heading-min center">Другие наши проекты</h3>
            <div class="portfolio">
                <?php $i = 1; foreach ($productIDs as $productID): ?>
                    <?php
                    if ($i > 3 || $productID == $product->id) {
                        continue;
                    }

                    $other = Product::model()->findByPk($productID);
                    ?>
                    <div class="portfolio__item">
                        <a href="<?= Yii::app()->createUrl('shop/product', ['id' => $other->id]) ?>">
                            <img src="<?= ResizeHelper::resize($other->getFullImg(false, false), 368, 257) ?>" alt="<?= $other->title ?>">
                            <div class="portfolio-mask">
                                <div class="mask__inner">
                                    <div class="portfolio-mask__heading"><?= $other->title ?></div>
                                    <div class="portfolio-mask__square"><?= $other->subtitle ?> м<sup>2</sup></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
