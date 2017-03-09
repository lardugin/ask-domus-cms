<?php
/**
 * @var $model AdviceCategory
 */
?>

<h1 class="heading"><?= $model->getMetaH1() ?></h1>

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
	</div>
</div>
