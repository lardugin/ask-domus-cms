<?use common\components\helpers\HYii as Y;?>
<!DOCTYPE html>
<html>
<head>
	<meta id="myViewport" name="viewport" content="width=750">
	<?= Y::getHeadScripts(); ?>
	<?php
		CmsHtml::head();

		Y::runLoader();
	?>
	
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&subset=cyrillic" rel="stylesheet">
	<!--[if IE 8]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

<div class="top-box" id="top">
	<div class="header-wrapper">
		<header>
			<section class="container">
				<div class="row header">
					<div class="col-sm-2 col-md-2">
						<div class="logo">
							<a href="/"><img src="/images/logo.png" alt="<?=CHtml::encode(D::cms('sitename'))?>"></a>
							<div class="slogan_min">
								Архитектурно-строительная
								<br>
								компания
							</div>
						</div>
					</div>

					<div class="col-sm-10 col-md-10">
						<div class="top-line">
							<div class="row">
								<div class="col-sm-9 col-md-8">
									<a href="https://yandex.ru/maps/213/moscow/?ol=biz&oid=1189178535&from=1org_photo&ll=37.634433%2C55.799859&z=15" rel="nofollow" target="_blank" class="top-line__item">
										<?= strip_tags(D::cms('address')) ?>
									</a>
									<a href="https://yandex.ru/maps/213/moscow/?ol=biz&oid=1189178535&from=1org_photo&ll=37.634433%2C55.799859&z=15" rel="nofollow" target="_blank" class="top-line__item">
										<img src="/images/m-orange.png">
										Алексеевская
									</a>
								</div>
								<div class="col-sm-3 col-md-4 text-right">
									<span class="phone-top"><?= D::cms('phone') ?></span>
								</div>
							</div>
						</div>

						<div class="top-menu">
							<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<button type="button" class="navbar-toggle" >
										<span class="sr-only"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<div class="menu_wrap collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<?php
									$this->widget('\menu\widgets\menu\MenuWidget', [
										'rootLimit' => D::cms('menu_limit'),
										'cssClass' => 'menu nav nav-justified'
									]);
									?>
								</div>
							</nav>
							<!--<div class="top-hiden__phone-button">
								<a href="tel:+7 (495) 220-38-44" class="button">+7 (495) 220-38-44</a>
							</div>-->
						</div>
					</div>
				</div>
			</section>
		</header>
	</div>

	<?php if ($this->isIndex()): ?>
		<div class="info-box">
			<section class="container">
				<h1 class="info__heading"><?= strip_tags(D::cms('slogan'), '<br><br/>') ?></h1>
				<div class="info__heading_min">От идеи до реализации</div>
				<div class="info__form">
					<?php
					$this->widget('\feedback\widgets\FeedbackWidget', array(
						'id' => 'callback2',
						'view' => '//feedback/info',
						'formHtmlOptions' => [
							'class' => 'form ajaxform'
						],
					));
					?>
				</div>
			</section>
		</div>
	<?php endif; ?>
</div>

<?= $content ?>

<?php
$this->renderPartial('//site/partial/_footer');
?>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/magnific-popup.js"></script>

<script src="/themes/adaptive_template_2/js/scripts.js"></script>
<script src="/js/main.js"></script>

<script src="/js/masonry.pkgd.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.bxslider.min.js"></script>
<script src="/js/scripts.js"></script>

<?= D::cms('counter') ?>

</body>
</html>