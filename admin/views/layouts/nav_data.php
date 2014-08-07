<?php

return array(
    "mainPage" => [
        'title' => 'Главная',
        'url' => '/',
        'icon' => 'home',
        'active' => (Yii::$app->request->url == '/') ? true : false,
    ],
    "realEstates" => [
        "title" => "Недвижимость",
        "sub" => [
            "realEstate" => [
                "title" => "Вся недвижимость",
                "url" => "/real-estate",
                'active' => (Yii::$app->request->url === '/real-estate') ? true : false,
                'icon' => 'fa-building',
            ],
            "realEstateCreate" => [
                "title" => "Создать новый",
                "url" => "/real-estate/create",
                'active' => (Yii::$app->request->url === '/real-estate/create') ? true : false,
                'icon' => 'fa-plus',
            ],
            "realEstateTarget" => [
                "title" => "Типы недвижимости",
                "url" => "/real-estate-target",
                'active' => (Yii::$app->request->url === '/real-estate-target') ? true : false,
                'icon' => 'fa-book',
            ],
            "realEstateCategories" => [
                "title" => "Категории",
                "url" => "/real-estate-category",
                'active' => (Yii::$app->request->url === '/real-estate-category') ? true : false,
                'icon' => 'fa-book',
            ],
            "features" => [
                "title" => "Характеристики",
                "url" => "/real-estate-feature-group",
                'active' => (Yii::$app->request->url === '/real-estate-feature-group') ? true : false,
                'icon' => 'fa-book',
            ],
            
        ],
        'icon' => 'building',
//        'active' => (strpos(Yii::$app->request->url,'real-estate') !== 0) ? true : false,
    ],
    "contacts" => [
        "title" => "Клиенты и контакты",
        "sub" => [
            "contact" => [
                "title" => "Контакты",
                "url" => "/contact",
                'active' => (Yii::$app->request->url === '/contact') ? true : false,
                'icon' => 'fa-phone ',
            ],
            "contractor" => [
                "title" => "Контрагенты",
                "url" => "/contractor",
                'active' => (Yii::$app->request->url === '/contractor') ? true : false,
                'icon' => 'fa-users',]
        ],
        'icon' => 'group',
    ],
    "tasks" => [
        "title" => "Календарь задач !",
        "url" => "/tasks",
        'icon' => 'calendar',
    ],
    "messages" => [
        "title" => "Сообщения !",
        "url" => "/messages",
        'icon' => 'comment ',
        'icon_badge' => 5,
    ],
    "userPermissions" => [
        "title" => "Доступ",
        "sub" => [
            "users" => [
                "title" => "Пользователи",
                "url" => "/user",
                'active' => (Yii::$app->request->url === '/user') ? true : false,
                'icon' => 'fa-users ',
                ],
            "permissions" => [
                "title" => "Права",
                "url" => "/permission",
                'active' => (Yii::$app->request->url === '/permission') ? true : false,
                'icon' => 'fa-key ',
                ]
        ],
        'icon' => 'key',
    ],
    "address" => [
        "title" => "КЛАДР",
        "url" => "/kladr",
        'active' => (Yii::$app->request->url === '/kladr') ? true : false,
        'icon' => 'book',
    ],
    "articles" => [
        "title" => "Публикации",
        "sub" => [
            "articleCategory" => [
                "title" => "Категории",
                "url" => "/article-category",
                'active' => (Yii::$app->request->url === '/article-category') ? true : false,
                'icon' => 'fa-book ',
                ],
            "article" => [
                "title" => "Статьи",
                "url" => "/article",
                'active' => (Yii::$app->request->url === '/article') ? true : false,
                'icon' => 'fa-file ',
                ],
        ],
        'icon' => 'file',
    ],
    "settings" => [
        "title" => "Настройки",
        "url" => "/settings",
        'active' => (Yii::$app->request->url === '/settings') ? true : false,
        'icon' => 'gears',
    ],
);
