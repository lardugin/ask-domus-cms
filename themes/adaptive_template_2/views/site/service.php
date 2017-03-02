<?php
/**
 * @var $model Service
 */
?>

<h1 class="heading"><?= $model->getMetaH1() ?></h1>

<div class="two-columns inner-page">
	<div class="left-col">
		<div class="left-menu-box">
			<div class="left-menu__heading">Услуги</div>
			<ul class="left-menu">
				<?php foreach (Service::model()->findAll(['order' => 'sort']) as $service): ?>
					<li class="<?= Yii::app()->request->getQuery('id') == $service->id ? 'active' : '' ?>"><a href="<?= Yii::app()->createUrl('/site/service', ['id' => $service->id]) ?>"><?= $service->title ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="right-col">
		<div class="content">
			<?= $model->description ?>
		</div>

		<?php $this->renderPartial('//site/service/text-' . Yii::app()->request->getQuery('id'), ['service' => $model]); ?>
	</div>
</div>
