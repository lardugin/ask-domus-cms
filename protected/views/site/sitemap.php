
<div class="sitemap_page">
	<h1>Карта сайта</h1>
	<h3>Меню сайта</h3>

	<?php
	$this->widget('\menu\widgets\menu\MenuWidget', array(
		'rootLimit' => D::cms('menu_limit'),
		'cssClass' => 'site-map clearfix',
		'sovety' => true,
	));
	?>

	<div>
		<?= D::cms('sitemap') ?>
	</div>
</div>