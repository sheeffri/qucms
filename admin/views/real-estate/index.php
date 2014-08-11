<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\RealEstate $searchModel
 */

$this->title = 'Real Estates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Real Estate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'targetId',
            'categoryId',
            'subCategoryId',
            //'createdBy',
            // 'ownerId',
            // 'contractorId',
            // 'contactId',
             'roomCount',
             'floor',
            // 'floors',
            // 'squareAll',
            // 'squareLiving',
            // 'squareKitchen',
            // 'squareBalcony',
            // 'squareBathroom',
            // 'createdAt',
            // 'updatedAt',
            // 'updatedBy',
            // 'status',
            // 'dateSale',
            // 'price',
            // 'priceHidden',
            // 'auction',
            // 'isRented',
            // 'isDeleted',
            // 'toSite',
            // 'forExport',
            // 'countryId',
            // 'regionId',
            // 'cityId',
            // 'address',
            // 'lat',
            // 'lng',
            // 'buildMaterialId',
            // 'apartmentLayoutId',
            // 'conditionId',
            // 'bathroomCount',
            // 'ceilingHeight',
            // 'yearBuild',
            // 'description:ntext',
            // 'descriptionForSite:ntext',
            // 'descriptionNear:ntext',
            // 'rentedWith',
            // 'rentedTo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
