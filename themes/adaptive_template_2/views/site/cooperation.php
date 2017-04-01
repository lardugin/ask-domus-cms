<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="cooperation-page">
	<div class="cooperation row">
        <div class="col-xs-6">
            <a href="sotrudnichestvo/postovshchikam/" class="cooperation__link">
                Наши партнеры
            </a>
        </div>
        <div class="col-xs-6">
            <a href="/sotrudnichestvo/nashi-partnery" class="cooperation__link">
                Поставщикам
            </a>
        </div>
	</div>
</div>

<div class="content">
	<?= $page->text ?>
</div>
