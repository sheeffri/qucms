<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */
$this->title = $name;
?>
<div class="padding-10">

    <div class="site-error">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            Сервер не может выполнить данный запрос. Вы можете вернуться на предыдущюю страницу. </p>
        <p><a class="btn btn-info" href="<?= $_SERVER['HTTP_REFERER'] ?>">Вернуться назад</a>
        </p>

    </div>
</div>