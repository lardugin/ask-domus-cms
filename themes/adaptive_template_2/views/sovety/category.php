<?php
/**
 * @var $model AdviceCategory
 */
?>

<h1 class="heading"><?= $model->getMetaH1() ?></h1>

<div class="content">
	<div class="advice-list">
		<ul>
			<?php foreach ($model->getAdviceList(5) as $advice): ?>
				<li><?= CHtml::link($advice->title, ['/sovety/advice', 'id' => $advice->id]) ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="catalog-element">
		<?= $model->description ?>
	</div>
</div>
