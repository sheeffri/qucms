<?php

use yii\helpers\Html;
?>
<header id="header">
    <div id="logo-group">                
        <span id="logo"> <?= Html::img('/img/logo.png') ?> </span>
        <span class="activity-dropdown" id="activity"> <i class="fa fa-user"></i> <b class="badge bg-color-green bounceIn animated"> 21 </b> </span>
        <div class="ajax-dropdown">

            <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
            <div data-toggle="buttons" class="btn-group btn-group-justified">
                <label class="btn btn-default">
                    <input type="radio" id="ajax/notify/mail.html" name="activity">
                    Сообщ-я (14) </label>
                <label class="btn btn-default">
                    <input type="radio" id="ajax/notify/notifications.html" name="activity">
                    Уведом-ия (3) </label>
                <label class="btn btn-default">
                    <input type="radio" id="ajax/notify/tasks.html" name="activity">
                    Задачи (4) </label>
            </div>

            <!-- notification content -->
            <div class="ajax-notifications custom-scroll">

                <div class="alert alert-transparent">
                    <h4>Нажмите на кнопку сверху для чтения сообщений</h4>
                    This blank page message helps protect your privacy, or you can show the first message here automatically.
                </div>

                <i class="fa fa-lock fa-4x fa-border"></i>

            </div>
            <!-- end notification content -->

            <!-- footer: refresh area -->
            <span> Последнее уведомление: 12/12/2013 9:43AM
                <button class="btn btn-xs btn-default pull-right" data-loading-text="&lt;i class='fa fa-refresh fa-spin'&gt;&lt;/i&gt; Loading..." type="button">
                    <i class="fa fa-refresh"></i>
                </button> </span>
            <!-- end footer -->

        </div>
    </div>
    <div class="project-context hidden-xs">

        <span class="label">Быстрые ссылки:</span>
        <span data-toggle="dropdown" class="project-selector dropdown-toggle">Меню риэлтора <i class="fa fa-angle-down"></i></span>

        <!-- Suggestion: populate this list with fetch and push technique -->
        <ul class="dropdown-menu">
            <li>
                <a href="javascript:void(0);">Просмотр активных сделок</a>
            </li>
            <li>
                <a href="javascript:void(0);">Сделки, требующие внимания</a>
            </li>
            <li>
                <a href="javascript:void(0);">Создать новую сделку</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Выход из системы</a>
            </li>
        </ul>
        <!-- end dropdown-menu-->

    </div>
    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" title="Свернуть меню" data-action="toggleMenu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="/site/logout" title="Выйти" data-action="userLogout" data-logout-msg="Вы точно хотите выйти с базы данных агентства?"><i class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0)" title="Искать"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field -->
        <form action="/search.php" class="header-search pull-right">
            <input type="text" name="param" placeholder="Поиск по базе" id="search-fld">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <a href="javascript:void(0);" id="cancel-search-js" title="Отменить поиск"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" title="На весь экран" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->
    </div>
    <!-- end pulled right: nav area -->
</header>


<div id="shortcut">
    <ul>
        <li>
            <a href="/inbox.php" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
        </li>
        <li>
            <a href="/calendar.php" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
            <a href="/gmap-xml.php" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
            <a href="/invoice.php" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
        </li>
        <li>
            <a href="/gallery.php" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li>
        <li>
            <a href="/profile.php" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>