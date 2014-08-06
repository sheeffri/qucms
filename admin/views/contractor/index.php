<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\Contractor $searchModel
 */

$this->title = 'Contractors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contractor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'alterName',
            'parentContractorId',
            'ownerId',
            // 'isVip',
            // 'ownershipId',
            // 'phone',
            // 'phoneAdd',
            // 'fax',
            // 'skype',
            // 'email:email',
            // 'site',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
