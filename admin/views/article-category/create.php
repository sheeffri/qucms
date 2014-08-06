<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 * @var array $parents
 */

$this->title = 'Новая категория';
$this->params['breadcrumbs'][] = ['label' => 'Article Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parents' => $parents
    ]) ?>

</div>
