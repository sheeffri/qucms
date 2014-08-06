<?php
/**
 * @var yii\web\View $this
 * @var array $contentTypes
 */
?>

<?php foreach ($contentTypes as $group) { ?>
    <div class="panel panel-default">
    <div class="panel-heading"><?= $group['group'] ?></div>
    <div class="list-group">
        <?php foreach ($group['contentTypes'] as $contentType) {
            echo \yii\helpers\Html::a($contentType['name'], ['view', 'contentType' => $contentType['path']], ["class" => "list-group-item"]);
        }
        ?>
    </div>
    </div><?php
}
?>
<pre><?php var_export(Yii::$aliases) ?></pre>