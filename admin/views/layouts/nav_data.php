<?php

return array(
    "userPermissions" => [
        "title" => "Доступ",
        "sub" => [
            "users" => [
                "title" => "Пользователи",
                "url" => "/user"],
            "permissions" => [
                "title" => "Права",
                "url" => "/permission"]
        ]
    ],
    "address" => [
        "title" => "Адресный классификатор",
        "url" => "/kladr"
    ],
    "articles" => [
        "title" => "Публикации",
        "sub" => [
            "articleCategory" => [
                "title" => "Категории",
                "url" => "/article-category"],
            "article" => [
                "title" => "Статьи",
                "url" => "/article"],
        ]
    ],
    "contacts" => [
        "title" => "Клиенты\\Контакты",
        "sub" => [
            "contact" => [
                "title" => "Контакты",
                "url" => "/contact"],
            "contractor" => [
                "title" => "Контрагенты",
                "url" => "/contractor"]
        ]
    ],
    "images" => [
        "title" => "Изображения",
        "sub" => [
            "sections" => [
                "title" => "Разделы",
                "url" => "/image-section"],
        ]
    ],
    "realEstates" => [
        "title" => "Недвижимость",
        "sub" => [
            "realEstateTarget" => [
                "title" => "Типы недвижимости",
                "url" => "/real-estate-target"
            ],
            "realEstateCategories" => [
                "title" => "Категории",
                "url" => "/real-estate-category"
            ],
            "features" => [
                "title" => "Характеристики",
                "url" => "/real-estate-feature-group"
            ],
            "realEstate" => [
                "title" => "Объекты",
                "url" => "/real-estate"
            ]
        ]
    ]
);
