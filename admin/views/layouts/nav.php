<?php
use yii\helpers\Html;
?>
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="/img/male.png" alt="me" class="online" /> 
                <span>
                    <?=\Yii::$app->user->identity->username ?>
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 
        </span>
    </div>

    <nav>
        <?php
        function setLabel(&$items, $root = true) {
            foreach($items as &$item) {
                if (isset($item['items'])) {
                    setLabel($item['items'], false);
                }
                $item['label'] =
                    (isset($item['icon']) ? "<i class=\"fa fa-lg fa-fw fa-$item[icon]\"></i>" : "") .
                    ($root ? '<span class="menu-item-parent">' : "") .
                    Html::encode($item['label']) .
                    ($root ? "<span>" : "");
            }
            unset($item);
        }
        $items = require 'nav_data.php';
        $items[] = ['label' => 'Страница', 'items' =>[
            ['label' => 'Настройки'],
            ['label' => 'Список', 'items' => [
                ['label' => 'Настройка'],
                ['label' => 'Фильтр']
            ]]
        ]];
        setLabel($items);
        ?>
        <?= \yii\widgets\Menu::widget([
            'labelTemplate' => '<a href="#">{label}</a>',
            'activateParents' => true,
            'encodeLabels' => false,
            'items' => $items]) ?>
    </nav>

    <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
<!-- END NAVIGATION -->