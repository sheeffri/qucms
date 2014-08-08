<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 07.08.14
 * Time: 12:32
 */

namespace siasoft\qucms\widgets;


use common\models\User;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\jui\Widget;

class ListView extends Widget {
    public function run()
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $reaEstate = new User();

        return GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => array_keys($reaEstate->attributes),
            'options' => ['class' => 'table-responsive'],
            'tableOptions' => ['class' => 'table-bordered']
        ]);
    }
} 