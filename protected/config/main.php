<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'搜狐焦点后台系统',
	'theme' => 'sohu',
	'preload'=>array('log'),
	'defaultController'=>'evaluation/admin',

	'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../../vendor/crisu83/yiistrap'), // change if necessary
        'Dist' => realpath(__DIR__ . '/../../vendor/twbs/bootstrap/dist'), // change if necessary
    ),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.*',
        'bootstrap.components.*',
        'bootstrap.behaviours.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*',
        'bootstrap.helpers.TbHtml',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
	),

	'components'=>array(
		'user'=>array(
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' =>array('/index.php?r=login'),
        ),
		'bootstrap' => array(
	        'class' => 'bootstrap.components.TbApi',
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
			 	array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',  
                ), 
			),
		),
	),
	'params'=>require(dirname(__FILE__).'/params.php'),
);