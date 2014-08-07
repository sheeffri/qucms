<?php
return [
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'language' => 'ru-RU',
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                'list/<listName\w+>' => 'list/index'
            ]
        ],
    ]
];