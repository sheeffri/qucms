<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList($parents) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'introText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget('\siasoft\qucms\widgets\Summernote', ['clientOptions' => ['height' => 600, 'lang' => 'ru-RU']]) ?>

    <?= $form->field($model, 'authorId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
