<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\Article $searchModel
 */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoryId',
            'title',
            'introText:ntext',
            'text:ntext',
            // 'tags',
            // 'authorId',
            // 'createdAt',
            // 'updaterAt',
            // 'createdBy',
            // 'updatedBy',
            // 'isPublished',
            // 'publishedAt',
            // 'publishedBy',
            // 'isDeleted',
            // 'deletedAt',
            // 'deletedBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
