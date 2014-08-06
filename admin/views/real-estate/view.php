<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstate $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Real Estates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'targetId',
            'categoryId',
            'subCategoryId',
            'createdBy',
            'ownerId',
            'contractorId',
            'contactId',
            'roomCount',
            'floor',
            'floors',
            'squareAll',
            'squareLiving',
            'squareKitchen',
            'squareBalcony',
            'squareBathroom',
            'createdAt',
            'updatedAt',
            'updatedBy',
            'status',
            'dateSale',
            'price',
            'priceHidden',
            'auction',
            'isRented',
            'isDeleted',
            'toSite',
            'forExport',
            'countryId',
            'regionId',
            'cityId',
            'address',
            'lat',
            'lng',
            'buildMaterialId',
            'apartmentLayoutId',
            'conditionId',
            'bathroomCount',
            'ceilingHeight',
            'yearBuild',
            'description:ntext',
            'descriptionForSite:ntext',
            'descriptionNear:ntext',
            'rentedWith',
            'rentedTo',
        ],
    ]) ?>

</div>
