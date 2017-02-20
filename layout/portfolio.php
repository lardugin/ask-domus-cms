<!DOCTYPE html>
<html>
<head>
	<meta id="myViewport" name="viewport" content="width=750">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
	<title>Портфолио</title>
	<?php include "lessComp/compact.php"; ?>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&subset=cyrillic" rel="stylesheet">
	<!--[if IE 8]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<?php include "./header.php"; ?>

<div class="content-box">
	<section class="container">
		<div class="breadcrumbs">
			<div class="breadcrumbs__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a href="/" itemprop="url"><span itemprop="title">Главная</span></a>
			</div>
			<div class="breadcrumbs__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				<span itemprop="title">Портфолио</span>
			</div>
		</div>
		
		<h1 class="heading">Портфолио</h1>
		
		<div class="inner-page">
			<div class="portfolio-page">
				<div class="work" id="work">
					<div class="work__tab-list">
						<div class="work__tab-item active"><a href="javascript:;">Квартиры</a></div>
						<div class="work__tab-item"><a href="javascript:;">Загородные дома</a></div>
						<div class="work__tab-item"><a href="javascript:;">Кухни</a></div>
						<div class="work__tab-item"><a href="javascript:;">Кабинеты</a></div>
						<div class="work__tab-item"><a href="javascript:;">Гостиные</a></div>
						<div class="work__tab-item"><a href="javascript:;">Спальни</a></div>
						<div class="work__tab-item"><a href="javascript:;">Прихожии</a></div>
						<div class="work__tab-item"><a href="javascript:;">Детские</a></div>
						<div class="work__tab-item"><a href="javascript:;">Ванные и санузлы</a></div>
					</div>
					<div class="work__cont-list">
						<?php include "work/rooms.php"; ?> <!-- Квартиры -->
						<?php include "work/house.php"; ?> <!-- Загородные дома -->
					</div>
				</div>
			</div>

			<div class="content">
				<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>
				<p>Разрабатываем документацию и проводим закупки для государственных и муниципальных заказчиков, в т.ч. техническую часть, проект контракта, план закупок, протоколы, а также ведем представительство интересов заказчика в УФАС (ФАС РФ).</p>
				<p><b>Осуществляем тендерное</b> обслуживание участников и сопровождение заказчиков в рамках 223-ФЗ и 44-ФЗ. </p>
				<h3>Курьерист - это скорая курьерская помощь.</h3>
				<p>В т.ч. выдачу ЭП, подбор закупок, анализ аукционной и конкурсной документации, подготовку первых и вторых частей заявок, оказываем юридическое сопровождение и предоставляем интересы в органах надзора, а также содействуем в финансовом обеспечении на всех этапах.</p>
				<p>Уважаемые коллеги, обращаем ваше внимание, что мы зафиксировали ряд компаний и недобросовестных конкурентов, которые представляются сотрудниками нашей <i>компании и предлагают "серые" банковские гарантии!</i></p>
			</div>
		</div>
	</section>
</div>

<?php include "./footer.php"; ?>

</body>
</html>
