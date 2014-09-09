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
//    $this->registerJs("jQuery('#show_on_map').toggle(function(){jQuery('#map').show();},function(){jQuery('#map').hide();});");
    if ($model->targetId === null) {
        return;
    }
    admin\assets\JQueryDeserializeAsset::register($this);
    $this->registerJs("setInterval(saveState, 60000);");
    $this->registerJs("jQuery('#selectTargetForm').submit(function(form){saveState();});");
    $this->registerJs("jQuery('#save-draw').click(saveState);");
    $this->registerJs("jQuery('#clean').click(function(){localStorage.removeItem('real-estate-form');location.reload()});");
    $this->registerJsFile("http://maps.googleapis.com/maps/api/js?key=AIzaSyAEMwuVSplIa1LuupkWIjNT1Yi33Q8b3Z8&sensor=false");
    $this->registerJs('initialize(); $("#find").click(codeAddress); ');

    $this->registerJs(
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
        '));
    ?>
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
            geocoder.geocode({'address': address}, function(results, status) {
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



<!--<p>
    <button id="save-draw" class="btn btn-primary"><i class="fa fa-save"></i> Сохранить</button>
    
</p>-->

    <?php $form = ActiveForm::begin(['class' => 'smart-form']); ?>

    <?php
    $this->registerJs("function saveState(){ localStorage.setItem('real-estate-form', jQuery('#$form->id').serialize());}");
    $this->registerJs("jQuery('#$form->id').deserialize(localStorage.getItem('real-estate-form'));");
    ?>


    <header>
        Основное
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">
                <div  class="col col-4">
                    <?= $form->field($model, 'categoryId')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'real_estate_category', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?>
                    <!-- <?= $form->field($model, 'subCategoryId')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'real_estate_sub_category', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?> -->
                </div>
                <div  class="col col-4">
                    <?= $form->field($model, 'contractorId')->textInput(['left-icon' => 'user']) ?>
                </div>
                <div  class="col col-4">
                    <?= $form->field($model, 'contactId')->textInput(['left-icon' => 'user']) ?>
                </div>
            </div>
        </section>
    </fieldset>

    <header>
        Адрес
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">
                <div  class="col col-3">
                    <?= $form->field($addressModel, 'country')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'country', 'label' => 'title', 'value' => 'id', 'dependency' => []]]) ?>
                </div>
                <div  class="col col-3">
                    <?= $form->field($addressModel, 'region')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'region', 'label' => 'title', 'value' => 'id', 'dependency' => ['countryId' => Html::getInputId($addressModel, 'countryValue')]]]) ?>
                </div>
                <div  class="col col-3">
                    <?= $form->field($addressModel, 'city')->widget(AutoComplete::className(), ['sourceConfig' => ['table' => 'city', 'label' => 'title', 'value' => 'id', 'dependency' => ['regionId' => Html::getInputId($addressModel, 'regionValue')]]]) ?>
                </div>
                <div  class="col col-3">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>
                </div>

                <!--    
                <?= $form->field($model, 'descriptionNear')->textarea(['rows' => 4]) ?>
    
                <?= $form->field($model, 'lat')->textInput() ?>
    
                <?= $form->field($model, 'lng')->textInput() ?>
                    <button id="find" class="btn btn-success">Найти на карте</button>
                -->
            </div>
            <a href="#" id="show_on_map" class="">Показать на карте</a>
            <div style="display: none;" id="map" class="padding-10">
                <div id="map_canvas" style="width:100%; height:500px"></div>
            </div>
        </section>
    </fieldset>




    <?php
    foreach ($model->features as $name => $group) {
        ?>
        <header>
            <?= Html::encode($name) ?>
        </header>
        <fieldset>
            <?php
            $count = count($group);
            $max = 4
            ?>
            <section class="no-margin">
                <div class="row">
                    <?php
                    foreach ($group as $feature) {
                        echo "<div class='col col-" . 12 / $max . "'>";

                        if (\yii\helpers\ArrayHelper::getValue($feature, 'predetermined', false)) {
                            echo $form->field($model, $feature['name']);
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </section>
        </fieldset>
        <?php
    }
    ?>

    <header>
        Цена
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">
                <div class="col col4">
                    <div class="form-group">
                        <?= $form->field($model, 'price')->textInput(['placeholder' => 'Напр.: 3.400.000'])->label(false) ?>
                    </div> 
                </div>
                <div class="col col4" style="padding-top: 3px">
                    <?= $form->field($model, 'priceHidden')->checkbox() ?>
                </div>
                <div class="col col4" style="padding-top: 3px">
                    <?= $form->field($model, 'auction')->checkbox() ?>
                </div>
            </div>
        </section>
    </fieldset>

    <header>
        Дополнительно
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">

                <div class="col col3">
                    <?= $form->field($model, 'toSite')->checkbox() ?>
                </div>
                <div class="col col3">
                    <?= $form->field($model, 'forExport')->checkbox() ?>

                </div>
                <div class="col col3">
                    <?= $form->field($model, 'status')->checkbox() ?>
                </div>
            </div>
        </section>
    </fieldset>

    <header>
        Аренда
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">
                <div class="col col3" style="padding-top: 3px">
                    <?= $form->field($model, 'isRented')->checkbox() ?>
                </div>

                <div class="col col3">
                    <?= $form->field($model, 'rentedWith')->textInput(['placeholder' => 'Сдана с'])->label(false) ?>
                </div>
                <div class="col col3">
                    <?= $form->field($model, 'rentedTo')->textInput(['placeholder' => 'сдана по'])->label(false) ?>
                </div>
                <div class="col col3">
                    <?= $form->field($model, 'dateSale')->textInput(['placeholder' => 'Дата продажи'])->label(false) ?>
                </div>
            </div>
        </section>
    </fieldset>


    <!-- <?= $form->field($model, 'conditionId')->textInput() ?> -->
    <header>
        Описание
    </header>
    <fieldset>
        <section class="no-margin">
            <div class="row">
                <div class="col col6">
                    <?= $form->field($model, 'description')->textarea(['class' => 'custom-scroll', 'row' => 3]) ?>
                </div>

                <div class="col col6">
                    <?= $form->field($model, 'descriptionForSite')->textarea() ?>
                </div>

            </div>
        </section>
    </fieldset>

    <header>
        Изображения
    </header>
    <fieldset>
        <section class="no-margin">
            <?= $form->field($model, 'images')->widget(\siasoft\qucms\widgets\ImageUploader::className())->label(false) ?>
        </section>
    </fieldset>
</div>
<hr />
<div class="form-group padding-10">
    <?= Html::submitButton('<i class="fa fa-save fa-lg"></i> ' . ($model->isNewRecord ? 'Создать объект' : 'Сохранить изменения'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    <button id="clean" class="btn">Сбросить форму</button>
</div>

<?php ActiveForm::end(); ?>


