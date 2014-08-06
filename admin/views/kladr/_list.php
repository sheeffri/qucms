<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 24.07.14
 * Time: 12:58
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\Country $searchModel
 */
?>

<div class="<?= $child['name'] ?>-index">
    <h2><?= Html::encode($child['title']) ?></h2>

    <p>
        <?= Html::a('Создать', ['create', 'modelName' => $child['name'], 'parentId' => isset($id) ? $id : 0], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            ['class' => 'yii\grid\ActionColumn', 'urlCreator' => function ($action, $model, $key, $index) use ($child) {
                    return Url::toRoute(["kladr/$action", 'modelName' => $child['name'], 'id' => $key]);
                }],
        ],
    ]); ?>
</div>