<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Country $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Адресный классификатор', 'url' => ['index']];
$this->params['breadcrumbs'] = array_merge($this->params['breadcrumbs'], $breadcrumbs);
?>
    <div class="<?= $config['name'] ?>-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Изменить', ['update', 'modelName' => $config['name'], 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'modelName' => $config['name'], 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить элемент?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
            ],
        ]) ?>
    </div>

<?php
if (isset($child)) {
    require '_list.php';
}
