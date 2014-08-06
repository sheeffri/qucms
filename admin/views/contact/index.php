<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\Contact $searchModel
 */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fio',
            'type',
            'birthDay',
            'sex',
            // 'workPhone',
            // 'mobilePhone',
            // 'homePhone',
            // 'skype',
            // 'email:email',
            // 'countryId',
            // 'stateId',
            // 'cityId',
            // 'postIndex',
            // 'address',
            // 'lat',
            // 'lng',
            // 'useEmail:email',
            // 'usePhone',
            // 'usePost',
            // 'useSms',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
