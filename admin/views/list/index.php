<?php
/**
 * @var yii\web\View $this
 */
?>
<h1>list/index</h1>
<?= \yii\helpers\Inflector::camelize($listName) ?>
<p>
    <?= \siasoft\qucms\widgets\ListView::widget() ?>
</p>
