<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('YiiStrap', dirname(__FILE__) . '/../../vendor/crisu83/yiistrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'搜狐焦点后台系统',
	'theme' => 'sohu',
	'preload'=>array('log,YiiStrap'),
	'defaultController'=>'evaluation/admin',

	'aliases' => array(
        // 'BootStrap' => realpath(__DIR__ . '/../../vendor/crisu83/yiistrap'), // change if necessary
        'Dist' => realpath(__DIR__ . '/../../vendor/twbs/bootstrap/dist'), // change if necessary
    ),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'YiiStrap.*',
        'YiiStrap.components.*',
        'YiiStrap.behaviours.*',
        'YiiStrap.helpers.*',
        'YiiStrap.behaviors.*',
        'YiiStrap.widgets.*',
        'YiiStrap.helpers.TbHtml',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('YiiStrap.gii'),
		),
	),

	'components'=>array(
		'request'=>array(
			'class'=>'WHttpRequest',
            'enableCsrfValidation'=>true,
            'enableCookieValidation'=>true,
            'noCsrfValidationRoutes'=>array(
            	'post/test', 
            	'stock/quote',
            	'login/login',
            	'webServer/quote',
            	'some/te3t',
            ),
        ),
		'user'=>array(
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' =>array('/index.php?r=login'),
        ),
		'YiiStrap' => array(
	        'class' => 'YiiStrap.components.TbApi',
	    ),
		'db'=>require(dirname(__FILE__).'/database.php'),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// 'trace';用于调试环境，追踪程序执行流程  
				// 'warning';警告信息  
				// 'error';致命错误信息  
				// 'info';普通提示信息  
				// 'profile';性能调试信息 
				array(  
		            'class'=>'CWebLogRoute',  
		            'levels'=>'warning',  
		            'categories'=>'system.db.*'
		        ),  
			 	// array(
     //                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',  
     //            ), 
			),
		),
		'session'=>array(
		    'class'=>'application.components.WHttpSession',
		    'timeout'=>3,
		    // 'timeout'=>3600*24*3,
		 //    'class'=>'application.components.WHttpSession',  CDbHttpSession
		 //    'sessionName' => 'SiteSession',
			// 'autoCreateSessionTable'=> false,
			// 'connectionID' => 'db',
			// 'sessionTableName' => 't_yii_session',
			// 'useTransparentSessionID'   =>($_POST['PHPSESSID']) ? true : false,
			// 'autoStart' => 'false',
			// 'cookieMode' => 'only',
			// 'timeout' => 3600*24*7

		),
	),
	'params'=>require(dirname(__FILE__).'/params.php'),
);
