<?use common\components\helpers\HYii as Y;?>
<!DOCTYPE html>
<html lang="ru">
<head>
<!--	<meta id="myViewport" name="viewport" content="width=750">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="top-line">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 col-md-8">
                            <a href="https://yandex.ru/maps/213/moscow/?ol=biz&oid=1189178535&from=1org_photo&ll=37.634433%2C55.799859&z=15" rel="nofollow" target="_blank" class="top-line__item">
                                <?= strip_tags(D::cms('address')) ?>
                            </a>
                            <a href="https://yandex.ru/maps/213/moscow/?ol=biz&oid=1189178535&from=1org_photo&ll=37.634433%2C55.799859&z=15" rel="nofollow" target="_blank" class="top-line__item">
                                <img src="/images/m-orange.png" alt="метро Алексеевская">
                                Алексеевская
                            </a>
                        </div>
                        <div class="col-sm-3 col-md-4 text-right">
                            <span class="phone-top"><?= D::cms('phone') ?></span>
                        </div>
                    </div>
                </div>
            </div>
			<section class="container">
				<div class="row header">
                    <div class="col-sm-2 col-lg-3">
                        <div class="logo">
                            <a href="/" title="<?=CHtml::encode(D::cms('sitename'))?>">
                                <svg version="1.1" id="Слой_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 355.00882 216.62683" xml:space="preserve">
                                    <style type="text/css">
                                        .st0{fill:#4582C9;}
                                        .st1{fill:#464746;}
                                        .st2{fill:#9FA1A4;}
                                    </style>
                                    <polygon class="st0" points="98,0 97.99872,0.00592 0.02869,93.0047 0.06799,103.97876 95,14.0047 97.69543,1.4259 95.00989,14 353,113 353,99 "/>
                                    <polygon class="st1" points="95,23.0047 0.03467,112.99902 0,113.0047 0,198.0047 49,198.0047 49,105.0047 123.36084,33.89069 "/>
                                    <rect y="187.0047" class="st1" width="353" height="11"/>
                                    <polygon class="st1" points="296,105.0047 95,29.0047 95,23.0047 296,99.0047 "/>
                                    <g>
                                        <path class="st1" d="M115.39288,146.43707c0,4.55943-0.88868,8.51514-2.66333,11.87117
			c-1.7751,3.3515-4.08575,6.09657-6.93242,8.24194c-2.87511,2.13861-6.09431,3.73715-9.67522,4.80014
			c-3.57639,1.05576-7.27154,1.58499-11.08184,1.58499H62.00983v-2.6832c0.75863,0,1.74213-0.06819,2.95684-0.21179
			c1.21516-0.13231,2.01534-0.29306,2.40775-0.46962c0.78075-0.32648,1.35379-0.81372,1.7024-1.4554
			c0.35719-0.6394,0.53329-1.41745,0.53329-2.32375v-38.70494c0-0.85752-0.15398-1.62924-0.45202-2.30614
			c-0.29758-0.68367-0.895-1.22374-1.78368-1.62744c-0.8092-0.37931-1.68433-0.65477-2.62359-0.82907
			c-0.93925-0.17611-1.75298-0.29081-2.42987-0.34364v-2.68365h24.28469c3.34248,0,6.63032,0.50259,9.8712,1.49513
			c3.23501,0.99435,6.05728,2.33504,8.45825,4.02389c3.26527,2.24473,5.82112,5.17944,7.67751,8.80641
			C114.46446,137.25134,115.39288,141.52449,115.39288,146.43707 M105.79713,146.41946c0-3.6053-0.49627-6.85521-1.48836-9.76329
			c-0.99435-2.90852-2.43845-5.44632-4.35037-7.61383c-1.80129-2.06364-4.0126-3.68431-6.63664-4.87283
			c-2.62359-1.18175-5.5407-1.7751-8.75132-1.7751c-1.07608,0-2.27995,0.01807-3.62245,0.05961
			c-1.34972,0.03522-2.34814,0.0727-2.99884,0.09483v41.20525c0,2.28899,0.69225,3.87849,2.07719,4.76039
			c1.38224,0.8801,3.51002,1.32309,6.38512,1.32309c3.31629,0,6.21353-0.56897,8.69397-1.70421
			c2.47864-1.12891,4.4872-2.70352,6.03291-4.71884c1.61615-2.11649,2.80016-4.55945,3.54523-7.34651
			C105.42685,153.28773,105.79713,150.06628,105.79713,146.41946"/>
                                        <path class="st1" d="M167.13315,125.64703c2.452,2.46916,4.37024,5.45039,5.75699,8.94054
			c1.38269,3.49059,2.07269,7.35146,2.07269,11.58714c0,4.2596-0.70354,8.1295-2.11243,11.60204
			c-1.41339,3.48155-3.36913,6.4384-5.87575,8.88588c-2.42987,2.41632-5.24583,4.28625-8.46278,5.58946
			c-3.21016,1.31406-6.62761,1.96431-10.25909,1.96431c-3.86539,0-7.43275-0.6945-10.71156-2.09436
			c-3.27655-1.39578-6.0898-3.34067-8.44244-5.83871c-2.34859-2.44298-4.19594-5.40884-5.54115-8.90125
			c-1.34702-3.4906-2.01533-7.22774-2.01533-11.20737c0-4.36166,0.7058-8.24422,2.11468-11.66391
			c1.41339-3.41338,3.35377-6.36571,5.83421-8.86377c2.45605-2.4696,5.30498-4.36166,8.56166-5.66668
			c3.24539-1.30999,6.65199-1.96476,10.19994-1.96476c3.67981,0,7.15233,0.6638,10.41805,1.99998
			C161.9361,121.35175,164.7543,123.23026,167.13315,125.64703 M161.29442,163.67282
			c1.46216-2.28897,2.52921-4.89044,3.19301-7.78362c0.66335-2.89949,0.99661-6.13812,0.99661-9.71449
			c0-3.68025-0.36848-7.05795-1.11357-10.13176c-0.74507-3.07153-1.8347-5.69513-3.26978-7.86264
			c-1.43552-2.14539-3.23907-3.81211-5.40659-5.0074c-2.1675-1.1971-4.65021-1.79678-7.44133-1.79678
			c-3.13341,0-5.79266,0.68999-7.98862,2.08126c-2.19371,1.38676-3.9819,3.23682-5.36865,5.55424
			c-1.30548,2.21584-2.27589,4.81323-2.91711,7.78995c-0.63535,2.96994-0.95732,6.09431-0.95732,9.37312
			c0,3.62695,0.33958,6.90576,1.01648,9.82693c0.68141,2.92162,1.75298,5.52127,3.21513,7.78993
			c1.40889,2.21628,3.17947,3.94487,5.32486,5.19255c2.13861,1.24586,4.70078,1.87444,7.67523,1.87444
			c2.79112,0,5.31583-0.63309,7.56055-1.89206C158.0558,167.70529,159.88554,165.93922,161.29442,163.67282"/>
                                        <path class="st1" d="M248.83156,172.93532h-24.56059v-2.68771c0.88867-0.02213,2.03294-0.11244,3.42647-0.2601
			c1.4003-0.14992,2.35716-0.36623,2.88188-0.64168c0.8092-0.47821,1.40437-1.02505,1.78369-1.64459
			c0.37479-0.61774,0.56897-1.38947,0.56897-2.3242v-39.01155h-0.59111l-18.95758,45.69922h-1.95572l-18.05807-46.64254h-0.50935
			v32.01501c0,3.09773,0.20274,5.45943,0.6105,7.07106c0.40596,1.61389,1.02325,2.76944,1.8591,3.47298
			c0.57303,0.53329,1.76155,1.03815,3.56284,1.51228c1.8013,0.47867,2.97672,0.73199,3.52808,0.75412v2.68771h-22.44365v-2.68771
			c1.17496-0.09483,2.4118-0.28448,3.70192-0.56445c1.29193-0.27545,2.29079-0.68999,2.99432-1.24586
			c0.91261-0.70309,1.54118-1.78821,1.87851-3.24991c0.33957-1.46397,0.51163-3.90694,0.51163-7.33342V130.4115
			c0-1.58951-0.19418-2.88596-0.58885-3.89159c-0.38789-1.00744-0.95235-1.82974-1.68253-2.45832
			c-0.8092-0.68141-1.80354-1.18626-2.97626-1.51274c-1.17543-0.32829-2.33504-0.51794-3.48608-0.56852v-2.68139h18.95126
			l15.91901,40.25697l13.59119-33.67767c0.49628-1.23232,0.91713-2.52425,1.27432-3.87397
			c0.35086-1.35153,0.536-2.2533,0.56445-2.70532h18.11993v2.68139c-0.72748,0.02845-1.66222,0.14089-2.80016,0.34364
			c-1.13342,0.20275-1.96251,0.38834-2.48271,0.56445c-0.88867,0.3021-1.4906,0.8092-1.80128,1.51274
			c-0.31744,0.70535-0.46962,1.47301-0.46962,2.30389v38.67197c0,0.88416,0.15218,1.62518,0.46962,2.22937
			c0.31068,0.60194,0.91261,1.13298,1.80128,1.58499c0.46964,0.25378,1.30548,0.48724,2.5071,0.70128
			c1.19936,0.21631,2.15396,0.33281,2.8575,0.35493V172.93532z"/>
                                        <path class="st0" d="M312.51572,121.98033c-0.73199,0.02619-1.8013,0.17611-3.21017,0.45608
			c-1.41339,0.27591-2.55994,0.69451-3.45087,1.24587c-0.88416,0.58206-1.49921,1.7751-1.83652,3.58949
			c-0.33957,1.81484-0.51163,4.03292-0.51163,6.65652v23.32375c0,2.96994-0.64166,5.55424-1.91824,7.74342
			c-1.28333,2.19415-2.96768,3.99771-5.05344,5.40659c-2.06412,1.36282-4.23569,2.3373-6.52014,2.93021
			c-2.28629,0.59109-4.47141,0.88867-6.56171,0.88867c-3.34067,0-6.31693-0.41905-8.92789-1.26799
			c-2.61499-0.8399-4.80417-1.98192-6.5838-3.41969c-1.74619-1.43553-3.06476-3.07787-3.95117-4.93471
			c-0.88824-1.85187-1.33167-3.77914-1.33167-5.80305v-31.70885c0-0.88416-0.15445-1.62067-0.45203-2.21131
			c-0.30209-0.59335-0.90628-1.14246-1.82343-1.64505c-0.65024-0.35719-1.48608-0.63715-2.50256-0.85345
			c-1.021-0.21133-1.85638-0.34364-2.50935-0.39648v-2.68365h23.1472v2.68365c-0.73199,0.02619-1.64911,0.13863-2.76041,0.34364
			c-1.1113,0.19868-1.92728,0.38834-2.44748,0.56445c-0.88867,0.3021-1.48611,0.80288-1.78369,1.50822
			c-0.30209,0.7076-0.452,1.47527-0.452,2.30659v29.61404c0,1.431,0.16299,2.93471,0.49399,4.51112
			c0.32379,1.57642,0.96997,3.04265,1.93588,4.3987c1.02051,1.38449,2.4032,2.51791,4.14941,3.39983
			c1.75296,0.8801,4.15619,1.32309,7.20789,1.32309c2.87735,0,5.28284-0.44299,7.22998-1.32309
			c1.94037-0.88191,3.47705-2.037,4.60144-3.47253c1.06931-1.36057,1.82794-2.78705,2.27136-4.26863
			c0.44299-1.48836,0.66336-2.98756,0.66336-4.49171v-21.98712c0-2.79564-0.20728-5.07559-0.62811-6.8552
			c-0.41455-1.77465-1.03003-2.93878-1.83698-3.49466c-0.91711-0.62812-2.16299-1.11988-3.73941-1.473
			c-1.58093-0.35042-2.79156-0.55091-3.62695-0.60374v-2.68365h22.71912V121.98033z"/>
                                        <path class="st0" d="M351.5625,148.32866c1.17542,1.25896,2.0415,2.64165,2.6019,4.14085
			c0.56445,1.49919,0.84442,3.24583,0.84442,5.23227c0,4.73827-1.81482,8.6434-5.4418,11.71901
			c-3.62921,3.07605-8.13177,4.61047-13.51395,4.61047c-2.48047,0-4.95865-0.37029-7.4436-1.11581
			c-2.47818-0.74057-4.61951-1.63828-6.42081-2.70081l-1.68433,2.76041h-3.13339l-0.54684-18.37552h3.17087
			c0.65479,2.27318,1.41339,4.32147,2.28854,6.14264c0.87558,1.83244,2.03293,3.53891,3.46844,5.12434
			c1.35831,1.4861,2.9433,2.6701,4.76041,3.55428c1.81439,0.87964,3.9223,1.32307,6.32144,1.32307
			c1.80582,0,3.37772-0.22487,4.72293-0.68141c1.34476-0.45653,2.43393-1.09819,3.26978-1.92908
			c0.83585-0.83585,1.45313-1.81032,1.86542-2.93472c0.40143-1.12485,0.59967-2.41676,0.59967-3.87848
			c0-2.1499-0.62405-4.14537-1.87399-6.00175c-1.25897-1.85231-3.12439-3.26118-5.60303-4.21806
			c-1.69968-0.65477-3.64005-1.37592-5.84052-2.16751c-2.18964-0.78932-4.08124-1.53441-5.67572-2.24019
			c-3.13297-1.35831-5.56735-3.13748-7.30676-5.34473c-1.73312-2.20499-2.59967-5.08009-2.59967-8.63435
			c0-2.04153,0.42764-3.94669,1.29193-5.70869c0.86203-1.76155,2.08578-3.33571,3.68027-4.72292
			c1.51227-1.30502,3.30499-2.3391,5.36456-3.08012c2.06366-0.74057,4.21762-1.11582,6.46008-1.11582
			c2.56219,0,4.85522,0.37932,6.87735,1.13343c2.0239,0.75863,3.8717,1.64053,5.54068,2.65249l1.60306-2.57527H353v17.80474h-3.51471
			c-0.57303-2.03972-1.21921-3.99094-1.93585-5.86086c-0.7189-1.8609-1.64911-3.54975-2.80466-5.06249
			c-1.1199-1.46172-2.48904-2.62811-4.10971-3.49466c-1.62067-0.87107-3.60303-1.30954-5.95117-1.30954
			c-2.4827,0-4.59735,0.77173-6.34357,2.31292c-1.75296,1.53442-2.62811,3.41292-2.62811,5.62694
			c0,2.31924,0.56445,4.24426,1.68436,5.76558c1.12259,1.52583,2.75861,2.78073,4.89948,3.76154
			c1.90515,0.8801,3.77463,1.64279,5.61609,2.28899c1.84329,0.64166,3.62247,1.32713,5.34653,2.05913
			c1.56784,0.65071,3.07605,1.39578,4.52469,2.22711C349.23422,146.25192,350.48868,147.21736,351.5625,148.32866"/>
                                    </g>
                                    <polygon class="st0" points="261.61823,105.0047 119,51.0047 62,105.0047 "/>
                            </svg>
                            </a>
                            <div class="slogan_min">
                                Архитектурно-строительная
                                компания
                            </div>
                        </div>
                    </div>
					<div class="col-sm-10 col-lg-9">
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
                                <div class="top-hiden__phone-button">
                                    <a href="tel:+74952203844" class="button button_green">Позвонить</a>
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
<!--				<div class="info__form">
					<?#php
//                        $this->widget('\feedback\widgets\FeedbackWidget', array(
//                            'id' => 'callback2',
//                            'view' => '//feedback/info',
//                            'formHtmlOptions' => [
//                                'class' => 'form ajaxform'
//                            ],
//                        ));
					?>
				</div>-->
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
<script >
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
