<?php
return array(
	'basePath'=>dirname(__FILE__).DS.'..',
	'name'=>'Новый сайт',

	'preload'=>array('log', 'kontur_common_init', 'd'),

	'aliases'=>array(
		'widget'=>'application.widget',
		'widgets'=>'application.widget',
 		'reviews'=>'application.modules.reviews',
 		'feedback'=>'application.modules.feedback',
	),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.behaviors.*',
		'application.components.filters.*',
		'application.components.helpers.*',
		'application.components.models.*',
		'application.components.validators.*',
        'ext.*',
        'ext.helpers.*',
        'ext.sitemap.*',
        'ext.CmsMenu.*',
        'ext.ContentDecorator.*'
	),

	'modules'=>array(
		'modules'=>array(
		    'actions',
		),
        'admin',
        'devadmin',
        'common',
        'reviews'=>['class'=>'reviews.ReviewsModule'],
        'settings'=>[
			'class'=>'application.modules.settings.SettingsModule',
			'config'=>[
				'shop'=>[
					'class'=>'\ShopSettings',
					'title'=>'Настройки магазина',
					'menuItemLabel'=>'Настройки',
					'viewForm'=>'admin.views.settings._shop_form'
				]
			]
		],
        /*'gii'=>array(
             'class'=>'system.gii.GiiModule',
             'password'=>'1',
             'generatorPaths'=>array(
                 'application.gii',   // псевдоним пути
             ),
              'ipFilters'=>false,
             // 'newFileMode'=>0666,
             // 'newDirMode'=>0777,
         ),*/
	),

	// application components
	'components'=>array(
		'kontur_common_init'=>['class'=>'\common\components\Init'],
		'd'=>array(
			'class'=>'DApi',
			'modules'=>@include(dirname(__FILE__).DS.'modules.php')?:array(),
			'configDCart'=>include(dirname(__FILE__).DS.'dcart.php')
		),
			
		'user'=>array(
			'class'=>'DWebUser',
			'allowAutoLogin'=>true,
            'loginUrl' => array('admin/default/login'),
		),

        'cache'=>array(
            'class'=>'system.caching.CFileCache',
         ),

        'settings'=>array(
            'class'     => 'CmsSettings',
            'cacheId'   => 'global_website_settings',
            'cacheTime' => 84000,
        ),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>include(dirname(__FILE__).DS.'urls.php'),
			'urlSuffix' => '/', 
		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix' => ''
		),

		'errorHandler'=>YII_DEBUG ? [] : array(
            'errorAction'=>'error/error',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// yii debug toolbar
	            /* array(
    	            'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
        	        // Access is restricted by default to the localhost
            	    //'ipFilters'=>array('127.0.0.1','192.168.1.*', 88.23.23.0/24),
	            ) /**/
			)
		),

        'email' => array(
            'class'=>'ext.email.Email',
            'delivery'=>'php' //debug|php
  		),

        'image' => array(
            'class'=>'ext.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            //'params'=>array('directory'=>"C:\ImageMagick\\"),
        ),
		'ih'=>array(
        	'class'=>'CImageHandler',
	    ),
        'clientScript' => array(
            'class' => 'ext.minify.EClientScript',
            'combineScriptFiles' => false,
            'combineCssFiles' => false,
            'optimizeCssFiles' => false,
            'optimizeScriptFiles' => false,
//            'coreScriptPosition'=>CClientScript::POS_BEGIN,
            'defaultScriptPosition'=>CClientScript::POS_END,
            'defaultScriptFilePosition'=>CClientScript::POS_END,
            /*'packages'=>array(
            	'jquery.ui'=>array(
                    'depends'=>array('jquery'),
                    'position'=>CClientScript::POS_END
                ),
        	),*/
        ),
        'assetManager'=>array(
			'class'=>'ext.EAssetManager.EAssetManager',
			'lessCompile'=>true,
			'lessCompiledPath'=>'webroot.assets.css',
			'lessFormatter'=>'compressed',
			'lessForceCompile'=>false,
		),		
	),

	'params'=>array(
	    'localauth' => true,
		'clientCombineScriptFiles'=>false,
		'uploadSettingsPath' => '/files/settings/',
		'adaptiveTemplate'=>true,
        'month' => true,
		'adminEmail'            => '',
        'menu_limit'            => 5,
        'news_limit'            => 7,
        'posts_limit'           => 10,
        'hide_news'             => false,
        'tmb_height'            => 380,
        'tmb_width'             => 350,
        'max_image_width'       => 1400,
        'dev_year'              => 2016,
        'subcategories'         => true,
	),

    'language'=>'ru',
);
 
