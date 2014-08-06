<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateTarget $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="real-estate-target-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?php
    foreach ($features as $name => $group) {
        ?>
        <div class="panel panel-default">
            <div class="panel-heading"><?= Html::encode($name) ?></div>
            <div class="panel-body">
                <?=
                \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $group]),
                    'layout' => "{items}",
                    'columns' => [
                        [
                            'class' => \yii\grid\CheckboxColumn::className(),
                            'name' => 'used[]',
                            'headerOptions' => ['style' => "width: 25px;"],
                            'checkboxOptions' => function($model, $key, $index, $this) {
                                    return [
                                        'value' => $model['name'],
                                        'checked' => $model['used']
                                    ];
                                }
                        ],
                        [
                            'class' => \yii\grid\CheckboxColumn::className(),
                            'name' => 'required[]',
                            'headerOptions' => ['style' => "width: 25px;"],
                            'checkboxOptions' => function($model, $key, $index, $this) {
                                    return [
                                        'value' => $model['name'],
                                        'checked' => $model['required']
                                    ];
                                }
                        ],
                        [
                            'class' => \yii\grid\DataColumn::className(),
                            'attribute' => 'title',
                            'format' => 'html',
                            'label' => 'Характеристика'
                        ]
                    ]]) ?>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
