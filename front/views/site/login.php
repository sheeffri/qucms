<?php
use yii\helpers\Html;
use siasoft\qucms\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="padding-10">
    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
        <legend><?= Html::encode($this->title) ?></legend>
        <?= $form->field($model, 'username')->icon('left', 'user') ?>
        <?= $form->field($model, 'password')->passwordInput()->icon('left', 'lock') ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
        <?= Html::a('Сбросить пароль', ['site/request-password-reset']) ?>
    </fieldset>

    <?php ActiveForm::end(); ?>
</div>

