<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Contact $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

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
            'fio',
            'type',
            'birthDay',
            'sex',
            'workPhone',
            'mobilePhone',
            'homePhone',
            'skype',
            'email:email',
            'countryId',
            'stateId',
            'cityId',
            'postIndex',
            'address',
            'lat',
            'lng',
            'useEmail:email',
            'usePhone',
            'usePost',
            'useSms',
        ],
    ]) ?>

</div>
