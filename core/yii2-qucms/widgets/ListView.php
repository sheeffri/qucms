<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 07.08.14
 * Time: 12:32
 */

namespace siasoft\qucms\widgets;


use common\models\RealEstate;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\VarDumper;
use yii\jui\Widget;

class ListView extends Widget {
    public function run()
    {
        $query = RealEstate::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $reaEstate = new RealEstate();

        return '<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-001" data-widget-editbutton="false"><header><span class="widget-icon"> <i class="fa fa-table"></i></span><h2>Недвижимость</h2></header><div>' . GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => array_keys($reaEstate->attributes),
            'tableOptions' => ['class' => 'table-bordered smart-form']
        ]) . '</div></div>';
    }
} 