<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Редактирование страницы';
$this->params['breadcrumbs'][] = ['label' => 'Списки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\jui\SortableAsset::register($this);
ob_start();
?>
<xml>
    <rows>
        <row>
            <column/>
        </row>
        <row>
            <column class="col-sm-6"/>
            <column class="col-sm-6"/>
        </row>
        <row>
            <column class="col-sm-4"/>
            <column class="col-sm-4"/>
            <column class="col-sm-4"/>
        </row>
        <row>
            <column/>
        </row>
    </rows>
</xml>
<?php
$template = simplexml_load_string(ob_get_clean());
?>

<?php \yii\helpers\VarDumper::dump($template, 10, true) ?>

<style>
    .sortable-grid:empty {
        min-height: 150px;
    }
</style>

<section id="widget-grid">
    <div class="row">
        <article class="col-xs-12 sortable-grid ui-sortable">
            <p class="bg-color-blueLight">Main block</p>
        </article>
    </div>
    <div class="row">
        <article class="col-xs-12 col-sm-6 sortable-grid ui-sortable">
            <p class="bg-color-blueLight">Left block</p>

            <div data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false"
                 data-widget-togglebutton="false" id="wid-id-7"
                 class="jarviswidget jarviswidget-sortable jarviswidget-color-pink"
                 style="position: relative; opacity: 1; left: 0px; top: 0px;" role="widget"
                 data-widget-attstyle="jarviswidget-color-pink">
                <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                -->
                <header role="heading">
                    <h2><strong>Widget</strong> <i>Colors</i></h2>
                    <span class="jarviswidget-loader" style="display: none;"><i
                            class="fa fa-refresh fa-spin"></i></span>
                </header>
                <div role="content">
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body">
                    </div>
                </div>
            </div>
        </article>
        <article class="col-xs-12 col-sm-6 sortable-grid ui-sortable">
            <p class="bg-color-blueLight">Right block</p>
        </article>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <p class="bg-color-blueLight">Right block</p>
            <article class="sortable-grid ui-sortable"></article>
        </div>
        <div class="col-xs-12 col-sm-4">
            <p class="bg-color-blueLight">Right block</p>
            <article class="sortable-grid ui-sortable"></article>
        </div>
        <div class="col-xs-12 col-sm-4">
            <p class="bg-color-blueLight">Right block</p>
            <article class="sortable-grid ui-sortable"></article>
        </div>
    </div>
    <div class="row">
        <article class="col-xs-12 sortable-grid ui-sortable">
            <p class="bg-color-blueLight">Footer block</p>
        </article>
    </div>
</section>