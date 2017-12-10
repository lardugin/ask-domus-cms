<?use common\components\helpers\HYii as Y;?>
<!DOCTYPE html>
<html>
<head>
	<meta id="myViewport" name="viewport" content="width=750">
	<?= Y::getHeadScripts(); ?>
	<?php
		CmsHtml::head();
	?>
	<meta name="google-site-verification" content="rcwA5qPamUiEia67RHMs29W2lUi2aIuR3A7ON1lzCj8" />
    <meta name="yandex-verification" content="8f7443d55d4c23a0" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&subset=cyrillic" rel="stylesheet">
	<!--[if IE 8]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type='application/ld+json'> 
		{
		  "@context": "http://www.schema.org",
		  "@type": "HomeAndConstructionBusiness",
		  "name": "ASK-Domus",
		  "url": "https://ask-domus.ru",
		  "logo": "https://ask-domus.ru/images/logo.png",
		  "image": "https://ask-domus.ru/images/screen.png",
		  "description": "Качественный дизайн интерьера в студии дизайна DOMUS. Наша фирма занимается дизайном и ремонтом квартир, загородных домов и коттеджей.",
		  "address": {
		    "@type": "PostalAddress",
		    "streetAddress": "Проспект мира, дом 102, стр. 12",
		    "addressLocality": "Москва",
		    "postalCode": "107051",
		    "addressCountry": "Россия"
		  },
		  "geo": {
		    "@type": "GeoCoordinates",
		    "latitude": "55.80157425593313",
		    "longitude": "37.637663330841065"
		  },
		  "hasMap": "Yes",
		  "openingHours": "Mo, Tu, We, Th, Fr 09:00-21:00 Sa, Su 10:00-19:00",
		  "priceRange": "30.00 - 300000.00",
		  "contactPoint": {
		    "@type": "ContactPoint",
		    "telephone": "+74952203844",
		    "contactType": "customer support"
		  },
		  "telephone": "<?= strip_tags(D::cms('phone')) ?>"
		}
 	</script>

 	<?php if (Yii::app()->request->getQueryString() && !isset($_GET['p'])): ?>
 		<link rel="canonical" href="https://ask-domus.ru/<?= Yii::app()->request->getPathInfo() ? Yii::app()->request->getPathInfo() . '/' : Yii::app()->request->getPathInfo() ?>">
 	<?php endif; ?>
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
                <div class="info__heading info__heading_strip">квартир и загородных домов</div>
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

<?php
Y::runLoader();
?>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/magnific-popup.js"></script>

<script src="/themes/adaptive_template_2/js/scripts.js"></script>
<script src="/js/main.js"></script>

<script src="/js/masonry.pkgd.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.bxslider.min.js"></script>
<script src="/js/scripts.js"></script>

<script src="/js/jquery.pjax.js"></script>

<script>
	$(document).pjax('.pjax-links a', '#page-inner-content', {
		timeout: 1300
	});
</script>

<?= D::cms('counter') ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter38644505 = new Ya.Metrika({
                    id:38644505,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/38644505" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Google Analytics counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65726851-4', 'auto');
  ga('send', 'pageview');
</script>
<!-- /Google Analytics counter -->

</body>
</html>
