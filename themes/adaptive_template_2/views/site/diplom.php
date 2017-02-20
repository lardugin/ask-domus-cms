<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="sertificates-page">
	<div class="sertificates-list">
		<?php foreach (Diplom::model()->findAll(['order' => 'sort']) as $item): ?>
			<div class="sertificates-list__item">
				<a href="<?= $item->imageBehavior->getSrc() ?>" class="sertificat fancybox" rel="sertificates">
					<img src="<?= ResizeHelper::resize($item->imageBehavior->getSrc(), 700, 1000) ?>">
				</a>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="sertificates-video-list">
		<div class="sertificates-video-list__item">
			<div class="video">
				<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wkqFL3Edmvk" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="sertificates-video-list__item">
			<div class="video">
				<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wkqFL3Edmvk" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>

</div>

<div class="content">
	<?= $page->text ?>
</div>