<?
/* @var AdminController $this */
/* @var CClientScript $cs */
use YiiHelper as Y;
use common\components\helpers\HYii;
use common\components\helpers\HArray as A;
use settings\components\helpers\HSettings;

$cs = Yii::app()->clientScript;
$baseUrl = $this->module->assetsUrl;

?>
<!DOCTYPE html>
<html>
<head>
	<?= HYii::getHeadScripts(); ?>
  <meta charset="utf-8" />
  <title><?=CHtml::encode($this->pageTitle)?></title>
  <link rel="shortcut icon" href="<?=$baseUrl?>/images/favicon.png" />
<!--   <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>/css/bootstrap-theme.css" /> -->
  <?php $cs->registerCssFile($baseUrl.'/css/bootstrap.css'); ?>
  <?php $cs->registerCssFile($baseUrl.'/css/elements.css'); ?>
  <?php $cs->registerCssFile($baseUrl.'/css/modules.css'); ?>
  <?php $cs->registerCssFile($baseUrl.'/css/style.css'); ?>
  
  <?php $cs->registerCoreScript('jquery.ui'); ?>
  <?php $cs->registerScriptFile($baseUrl.'/js/admin_main.js'); ?>
  <?php #$cs->registerScriptFile($baseUrl.'/js/jquery.simplemodal.1.4.4.min.js'); ?>
  <?php $cs->registerScriptFile('/js/jquery-migrate-1.2.1.min.js'); ?>
  <?php $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js'); ?>
  
  <?php 
    $shopMenuItems = [];
    if(D::cms('shop_enable_carousel') == 1) {
    	$shopMenuItems[]=[
    		'label'=>'Популярные товары',
    		'url'=>['shop/carousel'],
    		'active'=>Y::isAction($this, 'shop', 'carousel'),
    	];
    }
   	$shopMenuItems = A::m($shopMenuItems, HSettings::getMenuItems($this, 'shop', 'settings/index'));

    $adminMenuItems = array(
      array('label'=>'Страницы', 'url'=>array('page/index'), 'active' => Yii::app()->controller->getId() == 'page'),
      array('label'=>(D::cms('events_title') ?: \Yii::t('AdminModule.event', 'title')), 'url'=>array('event/index'), 'active' => Yii::app()->controller->getId() == 'event'),
      array(
      	'label'=>D::cms('shop_title', 'Каталог') . (empty($shopMenuItems) ? '' : ' <b class="caret"></b>'), 
      	'encodeLabel'=>false,
        'url'=>array('shop/index'), 
        'active' => Yii::app()->controller->getId() == 'shop', 
      	'visible'=>D::yd()->isActive('shop'),
      	'itemOptions'=>['onmouseover'=>'$(this).find(".dropdown-menu").show()', 'onmouseout'=>'$(this).find(".dropdown-menu").hide()'],
      	'items'=>$shopMenuItems
      )
    );    
      

    HYii::loadModule('reviews');
    $modulesMenu = array(
        array('label'=>'<img src="/images/accordian.png" style="width: 20px;"> Аккордеон', 'url'=>array('accordion/index')),
      	array('label'=>'Вопрос-ответ', 'url'=>array('question/index'), 'visible'=>D::yd()->isActive('question')),
      	array(
			'label'=>D::cms('gallery_title') ?: \Yii::t('AdminModule.gallery', 'title'), 
			'url'=>array('gallery/index'), 
			'active' => Yii::app()->controller->getId() == 'gallery',
			'visible'=>D::yd()->isActive('gallery')
		),
      	array('label'=>'Слайдер', 
	        'url'=>array('slider/index'), 
	        'visible'=>D::yd()->isActive('slider'), 
	        'active' => Yii::app()->controller->getId() == 'slider'),
        array('label'=>'Услуги',
            'url'=>array('service/index'),
            'active' => Yii::app()->controller->getId() == 'service'),
        array('label'=>'Партнеры',
            'url'=>array('partner/index'),
            'active' => Yii::app()->controller->getId() == 'partner'),
        array('label'=>'Наша команда',
            'url'=>array('team/index'),
            'active' => Yii::app()->controller->getId() == 'team'),
        array('label'=>'Отзывы (картинки)',
            'url'=>array('reviewImage/index'),
            'active' => Yii::app()->controller->getId() == 'reviewImage'),
        array('label'=>'Дипломы',
            'url'=>array('diplom/index'),
            'active' => Yii::app()->controller->getId() == 'diplom'),
      	//Аттрибуты
      	array('label'=>'Атрибуты товаров',
	        'active' => Yii::app()->controller->getId() == 'attributes',  
	        'visible'=>D::cms('shop_enable_attributes', false),
	        'url'=>array('attributes/index')
		),
      	array('label'=>D::cms('sale_title', \Yii::t('AdminModule.admin', 'module.sale')),
	        'active' => Yii::app()->controller->getId() == 'sale',  
	        'visible'=>D::yd()->isActive('sale'),
	        'url'=>array('sale/index')
		)
	);
	if(D::yd()->isActive('reviews')) {
		$modulesMenu[]=[
    	  	'label'=>\Yii::t('ReviewsModule.common', 'module.name'),
	        'active' => Yii::app()->controller->getId() == 'reviews',
	        'visible'=>D::yd()->isActive('reviews'),
	        'url'=>array('reviews/index')
		];
    };
    if(HYii::module('settings')) {
	    $modulesMenu[]=['label'=>'', 'itemOptions'=>['class'=>'divider']];
	    $modulesMenu = A::m($modulesMenu, \settings\components\helpers\HSettings::getMenuItems($this, null, 'settings/index'));
    }
	?>

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
  <![endif]-->
  <? HYii::runLoader(); ?>
</head>
  <body>

      <nav class="top_menu navbar-fixed-top navbar navbar-inverse" role="navigation">
      <div class="container">

        <div class="row">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="logo navbar-brand" href="<?=$this->createUrl('default/index')?>" title="Перейти на главную страницу панели администрирования">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.0" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 104 104" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                  <path class="fil0" d="M0 65l0 -26 13 0 0 26 -13 0zm30 39l-30 0 0 -26 13 0 0 13 17 0 0 13zm35 0l-26 0 0 -13 26 0 0 13zm39 -26l0 26 -30 0 0 -13 17 0 0 -13 13 0zm0 -39l0 26 -13 0 0 -26 13 0zm-30 -38l30 0 0 26 -13 0 0 -13 -17 0 0 -13zm-35 0l26 0 0 13 -26 0 0 -13zm-39 0l30 0 0 13 -17 0 0 13 -13 0 0 -26zm39 25l9 0 0 22 10 -22 9 0 -11 24 11 28 -9 0 -10 -26 0 26 -9 0 0 -52z"/>
                </g>
              </svg>
            </a>
            <div class="sitename navbar-brand">
              <a href="/" target="_blank" title="Перейти на главную страницу сайта">На сайт <i class="glyphicon glyphicon-upload"></i></a>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php 
              $this->widget('zii.widgets.CMenu', array(
                'items'=>$adminMenuItems,
                'htmlOptions'=>array('class'=>'nav navbar-nav'),
                'submenuHtmlOptions'=>['class'=>'dropdown-menu']
              ));
            ?>
            <? #if(D::yd()->isActives(array('slider','question','gallery'), true) || D::cms('shop_enable_attributes', false)):?>
            <ul class="nav navbar-nav">
              <li class="dropdown <?=HtmlHelper::getActiveClass('question', 'gallery', 'slider', 'review')?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Модули <b class="caret"></b></a>
                <?php 
                  $this->widget('zii.widgets.CMenu', array(
                    'items'=>$modulesMenu,
                    'encodeLabel'=>false,
                    'htmlOptions'=>array('class'=>'dropdown-menu')
                  ));
                ?>
              </li>
              <li class="<?=HtmlHelper::getActiveClass('advice')?>"><a href="/cp/advice">Советы</a></li>
            </ul>
            <? #endif?>
            <ul class="nav navbar-nav navbar-right">
            <?php if(D::yd()->isActive('feedback') || D::yd()->isActive('question') || D::yd()->isActive('shop')): ?>
              <li class="dropdown nav_notification">
                <?
                $count_state = false;
                if(D::yd()->isActive('feedback')) {
                  foreach(\feedback\components\FeedbackFactory::getFeedbackIds() as $id):
                  $count = \feedback\components\FeedbackFactory::factory($id)->getModelFactory()->getModel()->uncompleted()->count();
                  if($count>0){
                    $count_state = true;
                    break;
                  }
                  endforeach;
                }

                if(D::yd()->isActive('shop')) {
                  $orders = \DOrder\models\DOrder::model()->uncompleted()->count();
                  if((int)$orders > 0){
                    $count_state = true; 
                  }  

                  if(D::cms('shop_enable_reviews', false)) {
                  	$reviews_count = (int)ProductReview::model()->unpublished()->count();
                  	if($reviews_count > 0) $count_state = true;
                  } 
                }

                if(Question::getCount() > 0) $count_state = true;
                ?>

                <?if($count_state):?>
                <span class="notification_warning glyphicon glyphicon-exclamation-sign"></span>
                <?endif?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Уведомления <b class="caret"></b></a>
                <ul class="dropdown-menu feedbacks">
                  <?if(D::yd()->isActive('feedback')):
	                  foreach(\feedback\components\FeedbackFactory::getFeedbackIds() as $id):?>
	                    <?$count = \feedback\components\FeedbackFactory::factory($id)->getModelFactory()->getModel()->uncompleted()->count();?>
	                    <?$title = \feedback\components\FeedbackFactory::factory($id)->getTitle(); ?>
	                    <li>
	                      <a href="<?=Yii::app()->createUrl('/cp/feedback/' . $id )?>">
	                      <i class="glyphicon glyphicon-earphone"></i>
	                      <?=$title?><span class="notification_new_count feedback-<?=$id?>-count-in-title"><?=$count?></span>
	                      </a>
	                    </li>
	                  <?endforeach; 
                  endif;?>
                  
                  <?if(D::yd()->isActive('shop')):?>
                  	<?$this->widget('\DOrder\widgets\admin\OrderButtonWidget')?>
                  	<?if(D::cms('shop_enable_reviews')):?>
                  		<li><a href="<?=Yii::app()->createUrl('/cp/review/index')?>"><i class="glyphicon glyphicon-comment"></i> Отзывы на товар<span class="notification_new_count"><?=$reviews_count?></span></a></li>
                  	<?endif?>
                  <?endif?>
                 
                  <? if(D::yd()->isActive('question')): ?>
                    <li>
                      <a href="<?=Yii::app()->createUrl('/cp/question/index')?>">
                        <i class="glyphicon glyphicon-envelope"></i> Вопрос-ответ
                        <span class="notification_new_count notification-question-count"><?=Question::getCount()?></span>
                      </a>
                    </li>
                  <? endif;  ?>
                </ul>
              </li>
            <?php endif; ?>
              <?if(D::role('sadmin')):?>
              <li><a target="_blank" href="<?php echo $this->createUrl('/devcp/'); ?>">DEVCP <i class="glyphicon glyphicon glyphicon-lock"></i></a></li>
              <?endif;?>
              <li><a href="<?php echo $this->createUrl('default/settings'); ?>">Настройки <i class="glyphicon glyphicon-cog"></i></a></li>
              <li><a href="<?php echo $this->createUrl('default/logout'); ?>">Выход <i class="glyphicon glyphicon-off"></i></a></li>
            </ul>
          </div><!-- /.navbar-collapse -->  
        </div>
      </div>
    </nav>

    <div class="content_box">
      <div class="wrapper">

        <?
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Главная', Yii::app()->createUrl('cp')).' <span class="divider">/</span> ',
            'separator'=>'',
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
            'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
            'tagName'=>'ul',
            'separator'=>false,
            'encodeLabel'=>false,
            'htmlOptions'=>array('class'=>'breadcrumb')
        ));

        ?>

        <div id="main">
            <?php echo $content; ?>
        </div>

        <div id="footer">
          <div class="left">
              &copy; <a href="<?php echo $this->skinParam('support_url'); ?>" target="_blank"><?php echo $this->skinParam('support_name'); ?></a>
              &nbsp; <?php echo $this->skinParam('product_name'); ?> <?php readfile(Yii::getPathOfAlias('webroot').DS.'version.txt'); ?>
          </div>
          <div class="right">Служба поддержки клиентов: (383)<noskype></noskype> <?php echo $this->skinParam('support_phone'); ?></div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </body>
</html>


 
