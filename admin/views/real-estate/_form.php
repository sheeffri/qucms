<?php

use yii\helpers\Html;
use siasoft\qucms\widgets\ActiveForm;
use siasoft\qucms\widgets\AutoComplete;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstate $model
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\Addres $addressModel
 * @var array $targets
 */
?>

<div class="real-estate-form">

<?php
$this->registerJs("jQuery('#selectTarget').change(function(){jQuery('#selectTargetForm').submit();});");
if ($model->targetId === null) {
    return;
}
admin\assets\JQueryDeserializeAsset::register($this);
$this->registerJs("setInterval(saveState, 60000);");
$this->registerJs("jQuery('#selectTargetForm').submit(function(form){saveState();});");
$this->registerJs("jQuery('#save-draw').click(saveState);");
$this->registerJs("jQuery('#clean').click(function(){localStorage.removeItem('real-estate-form');location.reload()});");
?>
<p></p>

<p>
    <button id="save-draw" class="btn btn-success">Сохранить</button>
    <button id="clean" class="btn btn-warning">Сбросить</button>
</p>

<?php $form = ActiveForm::begin(); ?>

<?php
$this->registerJs("function saveState(){ localStorage.setItem('real-estate-form', jQuery('#$form->id').serialize());}");
$this->registerJs("jQuery('#$form->id').deserialize(localStorage.getItem('real-estate-form'));");
?>

<?php ob_start(); ?>

<fieldset>

    <?= $form->field($model, 'categoryId')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'real_estate_category', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?>

    <?= $form->field($model, 'subCategoryId')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'real_estate_sub_category', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?>

</fieldset>

<?php $main = ob_get_clean(); ?>

<?php $this->registerJs(
    trim('
var countries = null;
var regions = null;
var cities = null;
var getCountries = function(request, response) {
    if (countries === null) {
         $.getJSON( "' . \yii\helpers\Url::toRoute(['kladr/get-countries']) . '", request, function( data, status, xhr ) {
            countries = data;
            response( data );
         });
    }
    else {
        response(countries);
    }
};
        ')); ?>

<?php ob_start(); ?>

<div class="padding-10">

    <div class="row">

        <div class="col-sm-6">
            <fieldset>
                <?= $form->field($addressModel, 'country')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'country', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?>

                <?= $form->field($addressModel, 'region')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'region', 'label' => 'title', 'value' => 'id', 'dependency' => ['countryId' => Html::getInputId($addressModel, 'countryValue')]]]) ?>

                <?= $form->field($addressModel, 'city')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'city', 'label' => 'title', 'value' => 'id', 'dependency' => ['regionId' => Html::getInputId($addressModel, 'regionValue')]]]) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>
            </fieldset>

        </div>

        <div class="col-sm-6">
            <fieldset>

                <?= $form->field($model, 'descriptionNear')->textarea(['rows' => 4]) ?>

                <?= $form->field($model, 'lat')->radio() ?>

                <?= $form->field($model, 'lng')->radio() ?>
            </fieldset>

        </div>

        <button id="find" class="btn btn-success">Найти на карте</button>

    </div>

    <div id="map_canvas" style="width:100%; height:500px"></div>

    <script>
        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 8,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        }

        function codeAddress() {
            var address = $('#realestate-address').val();
            geocoder.geocode({ 'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    $("#realestate-lat").val(results[0].geometry.location.lat());
                    $("#realestate-lng").val(results[0].geometry.location.lng())
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
            return false;
        }
    </script>
</div>

<?php $this->registerJsFile("http://maps.googleapis.com/maps/api/js?key=AIzaSyAEMwuVSplIa1LuupkWIjNT1Yi33Q8b3Z8&sensor=false");
$this->registerJs('initialize(); $("#find").click(codeAddress); ');
?>

<?php $address = ob_get_clean() ?>

<?php ob_start() ?>

<?= $form->field($model, 'contractorId')->textInput(['left-icon' => 'user', 'right-icon' => 'user']) ?>

<?= $form->field($model, 'contactId')->textInput() ?>

<?php $contractor = ob_get_clean() ?>

<?php ob_start() ?>

<?php
foreach ($model->features as $name => $group) {
    ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= Html::encode($name) ?></div>
        <div class="panel-body">
            <?php
            foreach ($group as $feature) {
                if (\yii\helpers\ArrayHelper::getValue($feature, 'predetermined', false)) {
                    echo $form->field($model, $feature['name']);
                }
            } ?>
        </div>
    </div>
<?php
}
?>

<?php $features = ob_get_clean() ?>

<?php ob_start() ?>

<?= $form->field($model, 'toSite')->checkbox() ?>

<?= $form->field($model, 'forExport')->checkbox() ?>

<?php $export = ob_get_clean() ?>

<?php ob_start() ?>

<?= $form->field($model, 'conditionId')->textInput() ?>

<?= $form->field($model, 'price')->textInput() ?>

<?= $form->field($model, 'priceHidden')->textInput() ?>

<?= $form->field($model, 'auction')->textInput() ?>

<?= $form->field($model, 'isRented')->checkbox() ?>

<?= $form->field($model, 'dateSale')->textInput() ?>

<?= $form->field($model, 'rentedWith')->textInput() ?>

<?= $form->field($model, 'rentedTo')->textInput() ?>

<?= $form->field($model, 'status')->textInput() ?>

<?php $hz = ob_get_clean() ?>

<?php $description = $form->field($model, 'description')->widget('\siasoft\qucms\widgets\Summernote')->label(false) ?>

<?php $descriptionForSite = $form->field($model, 'descriptionForSite')->widget('\siasoft\qucms\widgets\Summernote')->label(false) ?>

<?=
\yii\jui\Tabs::widget(['items' => [
    [
        'label' => 'Основные',
        'content' => $main],
    [
        'label' => 'Адрес',
        'content' => $address],
    [
        'label' => 'Клиент',
        'content' => $contractor],
    [
        'label' => 'Характеристики',
        'content' => $features],
    [
        'label' => 'Описание',
        'content' => $description],
    [
        'label' => 'Описание для сайта',
        'content' => $descriptionForSite],
    [
        'label' => 'Экспорт',
        'content' => $export],
    [
        'label' => 'Пока хз',
        'content' => $hz],
]]) ?>

<div class="form-group">
    <?= Html::submitButton('<i class="fa fa-save fa-lg"></i> ' . ($model->isNewRecord ? 'Создать' : 'Изменить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
