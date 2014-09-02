<?php

return array(
    ['label' => 'Главная', 'url' => ['site/index'], 'icon' => 'home'],
    [
        "label" => "Недвижимость",
        "items" => [
            ["label" => "Вся недвижимость", "url" => ["real-estate/index"], 'icon' => 'building'],
            ["label" => "Создать новый", "url" => ["real-estate/create"], 'icon' => 'plus'],
            ["label" => "Типы недвижимости", "url" => ["real-estate-target/index"], 'icon' => 'book'],
            ["label" => "Категории", "url" => ["real-estate-category/index"], 'icon' => 'book'],
            ["label" => "Характеристики", "url" => ["real-estate-feature-group/index"], 'icon' => 'book'],
        ],
        'icon' => 'building'
    ],
    [
        "label" => "Клиенты и контакты",
        "items" => [
            ["label" => "Контакты", "url" => ["contact/index"], 'icon' => 'phone '],
            ["label" => "Контрагенты", "url" => ["contractor/index"], 'icon' => 'users']
        ],
        'icon' => 'group',
    ],
    ["label" => "Календарь задач !", "url" => ["tasks/index"], 'icon' => 'calendar'],
    ["label" => "Сообщения !", "url" => ["messages/index"], 'icon' => 'comment'],
    [
        "label" => "Доступ",
        "items" => [
            "users" => ["label" => "Пользователи", "url" => ["user/index"], 'icon' => 'users'],
            "permissions" => ["label" => "Права", "url" => ["permission/index"], 'icon' => 'key']
        ],
        'icon' => 'key',
    ],
    ["label" => "КЛАДР", "url" => ["kladr/index"], 'icon' => 'book'],
    [
        "label" => "Публикации",
        "items" => [
            ["label" => "Категории", "url" => ["article-category/index"], 'icon' => 'book'],
            ["label" => "Статьи", "url" => ["article/index"], 'icon' => 'file'],
        ],
        'icon' => 'file',
    ],
    ["label" => "Настройки", "url" => ["settings/index"], 'icon' => 'gears'],
);
