<?php
/**
 * @var $model Advice
 * @var $this SovetyController
 */
?>

<h1 class="heading"><?= $model->getMetaH1() ?></h1>

<div class="two-columns inner-page">
	<div class="left-col">
		<div class="left-menu-box">
			<div class="left-menu__heading">Делимся опытом</div>
			<?php if($this->beginCache('advice_list_item', ['id' => $model->id])): ?>
				<?php $this->widget('widget.nested.MenuWidget', [
					'activeCategory' => $model->category_id,
				]); ?>
			<?php $this->endCache(); endif; ?>
		</div>
	</div>

	<div class="right-col">
		<div class="content">
			<div class="catalog-element">
				<?= $model->description ?>
			</div>
		</div>
	</div>
</div>
