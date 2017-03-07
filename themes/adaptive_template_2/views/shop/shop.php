<?php
/**
 * @var $products Product[]
 * @var $pages CPagination
 */

use settings\components\helpers\HSettings;
$settings = HSettings::getById('shop');
?>

<h1 class="heading"><?= $settings->meta_h1 ?: D::cms('shop_title',Yii::t('shop','shop_title')) ?></h1>

<div class="inner-page">
    <div class="portfolio-page">
        <div class="work" id="work-disabled">
            <?php
            $this->renderPartial('//shop/_category_list', [
                'checkActive' => false,
            ]);
            ?>
            <div class="work__cont-list">
                <div class="clearfix">
                    <?php foreach ($products as $product): ?>
                        <?php
                        $this->renderPartial('//shop/_products', [
                            'data' => $product,
                        ]);
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php $this->widget('DLinkPager', array(
            'header' => '',
            'pages' => $pages,
            'internalPageCssClass' => '',
            'firstPageCssClass' => 'hidden',
            'lastPageCssClass' => 'hidden',
            'nextPageLabel' => '',
            'prevPageLabel' => '',
            'nextPageCssClass' => 'page-pager__next',
            'previousPageCssClass' => 'page-pager__prev',
            'selectedPageCssClass' => 'active',
            'hiddenPageCssClass' => 'disabled',
            'cssFile' => false,
            'htmlOptions' => array('class'=>'page-pager')
        )); ?>
    </div>

    <div class="content">
        <?php if($settings->main_text): ?>
            <div id="category-description" class="category-description"><?=$settings->main_text?></div>
        <?php endif; ?>
    </div>
</div>




