<?php
/**
 * @var $products Product[]
 * @var $pages CPagination
 * @var $category Category
 */
?>

<h1 class="heading"><?= $category->getMetaH1() ?></h1>

<div class="inner-page">
    <div class="portfolio-page">
        <div class="work" id="work-disabled">
            <?php
            $this->renderPartial('//shop/_category_list', [
                'checkActive' => true,
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

        <div class="pjax-links">
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
    </div>

    <div class="content">
        <div id="category-description" class="category-description"><?= $category->description ?></div>
    </div>
</div>