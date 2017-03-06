<?php
/**
 * @var $page Page
 */
?>

<h1 class="heading"><?=$page->getMetaH1()?></h1>

<div class="partners-page">
	<div class="partners-list">
		<?php if ($partners = Partner::model()->findAll(['order' => 'sort'])): ?>
			<?php foreach ($partners as $partner): ?>
				<?php
				$linkTitle = $partner->link;

				if (filter_var($linkTitle, FILTER_VALIDATE_URL)) {
					$linkTitle = strtr($linkTitle, ['https://' => '', 'http://' => '', 'www.' => '']);
					$linkTitle = preg_replace('{/$}', '', $linkTitle);
				}
				?>
				<div class="partners-list__item">
					<div class="partners-item__img">
						<img src="<?= $partner->imageBehavior->getSrc() ?>" alt="<?= $linkTitle ?>">
					</div>
					<div class="partners-item__text">
						<div class="content">
							<p><?= $partner->description ?></p>
						</div>
						<?php if ($partner->link): ?>
							<div class="partners-item__link">
								<a href="<?= $partner->link ?>" rel="nofollow" target="_blank"><?= $linkTitle ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

<div class="content">
	<?=$page->text?>
</div>
