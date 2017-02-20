<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="command-page">
	<div class="command">
		<?php foreach (Team::model()->findAll(['order' => 'sort']) as $item): ?>
		<div class="command__item">
			<div class="person">
				<div class="person__foto">
					<img src="<?= ResizeHelper::resize($item->imageBehavior->getSrc(), 285, 285) ?>" alt="<?= $item->title ?>">
				</div>
				<div class="person__info">
					<div class="person__name"><?= $item->title ?></div>
					<div class="person__position"><?= $item->position ?></div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="content">
	<?= $page->text ?>
</div>
