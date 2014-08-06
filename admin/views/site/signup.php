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
        <?= $form->field($model, 'username')->icon('user') ?>
        <?= $form->field($model, 'email')->icon('envelope') ?>
        <?= $form->field($model, 'password')->passwordInput()->icon('lock') ?>
        <?= $form->field($model, 'repeatPassword')->passwordInput()->icon('lock') ?>
    </fieldset>
    <footer>
        <?= Html::submitButton('Зарегестрировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </footer>
<?php ActiveForm::end(); ?>
