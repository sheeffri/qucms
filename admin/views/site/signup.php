<?php
use yii\helpers\Html;
use siasoft\qucms\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\SignupForm $model
 */
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
    <header>
        <?= Html::encode($this->title) ?>
    </header>

    <fieldset>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
    </fieldset>
    <footer>
        <?= Html::submitButton('Зарегестрировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </footer>
<?php ActiveForm::end(); ?>
