<?php
/**
 * @var $page Page
 * @var $this SiteController
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="two-columns inner-page">
    <div class="left-col">
        <div class="left-menu-box">
            <div class="left-menu__heading">Делимся опытом</div>
            <?php if($this->beginCache('advice_list')): ?>
            <?php $this->widget('widget.nested.MenuWidget'); ?>
            <?php $this->endCache(); endif; ?>
        </div>
    </div>

    <div class="right-col">
        <div class="content">
            <?= $page->text ?>
        </div>
    </div>
</div>