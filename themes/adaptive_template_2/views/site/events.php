<?php
/**
 * @var $events Event[]
 * @var $pages CPagination
 */

$currentYear = Yii::app()->request->getQuery('year', 0);

?>

<h1 class="heading"><?=D::cms('events_title', Yii::t('events','events_title'))?></h1>

<div class="two-columns inner-page">
    <div class="left-col">
        <div class="left-menu-box">
            <div class="left-menu__heading">Архив новостей</div>
            <ul class="left-menu">
                <?php foreach (range(date('Y'), 2011) as $year): ?>
                    <li class="<?= $currentYear == $year ? 'active' : '' ?>"><a href="<?= Yii::app()->createUrl('site/events', ['year' => $year]) ?>"><?= $year ?> год</a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="right-col">
        <div class="news-page">
            <div class="news__list">
                <?php foreach($events as $event): ?>
                    <?php
                    $link = Yii::app()->createUrl('site/event', ['id' => $event->id]);
                    ?>
                    <div class="news-list__item">
                        <?php if ($event->previewImg): ?>
                        <div class="news-item__left">
                            <div class="news-item__img">
                                <a href="<?= $link ?>">
                                    <img src="<?= $event->previewImg ?>" alt="<?=$event->title?>">
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="news-item__right">
                            <div class="news-item__heading">
                                <span class="news-item__date"><?php echo $event->date; ?></span>
                                <a href="<?= $link ?>"><?=$event->title?></a>
                            </div>
                            <div class="news-item__text">
                                <div><?php echo $event->intro; ?></div>
                                <a href="<?= $link ?>" class="news-item__button">Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
    </div>
</div>
