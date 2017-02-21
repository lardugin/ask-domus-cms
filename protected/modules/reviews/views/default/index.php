<?
/** @var \reviews\controllers\DefaultController $this */
/** @var \CActiveDataProvider[\reviews\models\Review] $dataProvider */
use reviews\models\Settings;
?>

<h1 class="heading"><?= $this->getHomeTitle(); ?></h1>

<div class="reviews-page">
	<?php if ($images = ReviewImage::model()->findAll(['order' => 'sort'])): ?>
		<div class="reviews-carousel">
			<ul class="" id="reviews-carousel">
				<?php foreach ($images as $image): ?>
					<li class="reviews-carousel__item">
						<a class="fancybox" rel="reviews" href="<?= $image->imageBehavior->getSrc() ?>">
							<img src="<?= ResizeHelper::resize($image->imageBehavior->getSrc(), 250) ?>">
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="reviews-carousel__control"></div>
		</div>
	<?php endif; ?>

	<?php $this->renderPartial('_reviews_listview', compact('dataProvider')); ?>

	<?php $this->widget('\reviews\widgets\NewReviewForm', ['actionUrl'=>$this->createUrl('addReview')]); ?>
</div>
