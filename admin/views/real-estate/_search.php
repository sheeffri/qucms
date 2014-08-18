<?php

use yii\helpers\Html;
use \siasoft\qucms\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\RealEstate $model
 * @var siasoft\qucms\widgets\ActiveForm $form
 */
?>

<div data-widget-deletebutton="false" data-widget-colorbutton="false" data-widget-fullscreenbutton="false"
     data-widget-editbutton="false" data-widget-togglebutton="false" id="wid-id-0" class="jarviswidget">
<header>
    <span class="widget-icon"> <i class="glyphicon glyphicon-search txt-color-darken"></i> </span>

    <h2>Поиск </h2>
    <ul id="myTab" class="nav nav-tabs pull-right in">
        <li class="active">
            <a href="#s1" data-toggle="tab"><i class="fa fa-building "></i> <span class="hidden-mobile hidden-tablet">Недвижимость</span></a>
        </li>

        <li>
            <a href="#s2" data-toggle="tab"><i class="fa fa-group "></i> <span class="hidden-mobile hidden-tablet">Клиенты</span></a>
        </li>

        <li>
            <a href="#s3" data-toggle="tab"><i class="fa  fa-map-marker "></i> <span
                    class="hidden-mobile hidden-tablet">По карте</span></a>
        </li>

        <li>
            <a href="#s4" data-toggle="tab"><i class="fa fa-star "></i> <span class="hidden-mobile hidden-tablet">Избранное</span></a>
        </li>
    </ul>
</header>

<!-- widget div-->
<div class="no-padding">
<!-- widget edit box -->
<div class="jarviswidget-editbox">

    test
</div>
<!-- end widget edit box -->

<div class="widget-body no-padding-bottom ">
<!-- content -->

<div class="tab-content" id="myTabContent">
<!--Поиск недвижимости-->
<div id="s1" class="tab-pane fade active in no-padding-bottom">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]) ?>

    <fieldset>
        <div class="row">
            <div class="col col-sm-3">
                <?= $form->field($model, 'priceFrom')->placeholder() ?>
            </div>
            <div class="col col-sm-3">
                <?= $form->field($model, 'priceTo')->placeholder() ?>
            </div>
            <div class="col col-sm-6">
                <?= $form->field($model, 'rooms', ['options' => ['class' => 'inline-group']])->checkboxList(['1', '2', '3', '4', '5+']) ?>
            </div>
        </div>

        <div class="row margin-top-10">
            <div class="col col-sm-3">
                <?= $form->field($model, 'id')->placeholder() ?>
            </div>
            <div class="col col-sm-3">
                <?= $form->field($model, 'targetId')->dropDownList(['Тип недвижимости', 'Квартира', 'Дом'])->label(false) ?>
            </div>

            <section class="col col-3">
                <label class="select">
                    <select name="month">
                        <option value="0" selected="" disabled="">Тип сделки</option>
                        <option value="1">Купля</option>
                        <option value="1">Продажа</option>
                    </select> <i></i> </label>
            </section>
            <section class="col col-3">
                <label class="select">
                    <select name="month">
                        <option value="0" selected="">Менеджер</option>
                        <option value="1">Иван Стрельцов</option>
                        <option value="1">Ктото Другой</option>
                    </select> <i></i> </label>
            </section>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">
            <div class="col col-sm-2">
                <?= $form->field($model, 'price')->placeholder() ?>
            </div>
            <section class="col col-2">
                <label class="select">
                    <select name="country">
                        <option value="239" selected="">Россия</option>
                    </select> <i></i> </label>
            </section>

            <section class="col col-2">
                <label class="input">
                    <input type="text" name="city" placeholder="Город" value="Сургут">
                </label>
            </section>

            <section class="col col-6">
                <label for="address2" class="input">
                    <input type="text" name="address2" id="address2" placeholder="Адрес">
                </label>
            </section>

        </div>
    </fieldset>
    <fieldset>


        <section>

            <!--<label class="label">Количество комнат</label>-->
            <div class="inline-group">
                <label class="checkbox">
                    <input type="checkbox" name="radio-inline">
                    <i></i>Не первый/последний этаж</label>
                <label class="checkbox">
                    <input type="checkbox" name="radio-inline">
                    <i></i>Ипотека</label>
                <label class="checkbox">
                    <input type="checkbox" name="radio-inline">
                    <i></i>Молодая семья</label>
                <label class="checkbox">
                    <input type="checkbox" name="radio-inline">
                    <i></i>Новостройка</label>
                <label class="checkbox">
                    <input type="checkbox" name="radio-inline">
                    <i></i>Только моя недвижимость</label>

            </div>

        </section>

    </fieldset>


    <footer>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i> Поиск
        </button>
        <a href="#" class="btn btn-link">Очистить форму поиска</a>
    </footer>
    <?php ActiveForm::end() ?>

</div>
<!--Конец.Поиск недвижимости-->

<div id="s2" class="tab-pane fade">
    <div class="widget-body-toolbar bg-color-white no-padding">
        <form id="checkout-form" class="smart-form" novalidate="novalidate">
            <fieldset>
                <div class="row">
                    <section class="col col-3">
                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                            <input type="tel" name="phone" placeholder="Телефон" data-mask="(999) 999-9999">
                        </label>
                    </section>
                    <section class="col col-3">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="tetextl" name="phone" placeholder="ФИО">
                        </label>
                    </section>

                    <section class="col col-2">
                        <label class="input">
                            <i class="icon-prepend fa fa-file"></i>
                            <input type="text" name="city" placeholder="Договор">
                        </label>
                    </section>

                    <section class="col col-2">
                        <label for="address2" class="input">
                            <input type="text" name="address2" id="address2" placeholder="Паспорт">
                        </label>
                    </section>
                    <section class="col col-2">

                        <!--<label class="label">Количество комнат</label>-->
                        <div class="inline-group">
                            <label class="checkbox">
                                <input type="checkbox" name="radio-inline">
                                <i></i>Мои клиенты</label>

                        </div>

                    </section>
                </div>
            </fieldset>

            <footer>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> Поиск
                </button>
                <a href="#" class="btn btn-link">Очистить форму поиска</a>
            </footer>
        </form>
    </div>


</div>
<!-- end s2 tab pane -->

<div id="s3" class="tab-pane fade">

    <div id="rev-toggles" class="widget-body-toolbar bg-color-white smart-form">

        <div class="inline-group">

            <label class="checkbox" for="gra-0">
                <input type="checkbox" checked="checked" id="gra-0" name="gra-0">
                <i></i> Target </label>
            <label class="checkbox" for="gra-1">
                <input type="checkbox" checked="checked" id="gra-1" name="gra-1">
                <i></i> Actual </label>
            <label class="checkbox" for="gra-2">
                <input type="checkbox" checked="checked" id="gra-2" name="gra-2">
                <i></i> Signups </label>
        </div>

        <div class="btn-group hidden-phone pull-right">
            <a data-toggle="dropdown" class="btn dropdown-toggle btn-xs btn-default"><i class="fa fa-cog"></i> More
                <span class="caret"> </span> </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="padding-10">
        <div class="chart-large has-legend-unique" id="flotcontainer"></div>
    </div>
</div>
<!-- end s3 tab pane -->
</div>

<!-- end content -->
</div>

</div>
<!-- end widget div -->
</div>

<div class="real-estate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'targetId') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'subCategoryId') ?>

    <?= $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'ownerId') ?>

    <?php // echo $form->field($model, 'contractorId') ?>

    <?php // echo $form->field($model, 'contactId') ?>

    <?php // echo $form->field($model, 'roomCount') ?>

    <?php // echo $form->field($model, 'floor') ?>

    <?php // echo $form->field($model, 'floors') ?>

    <?php // echo $form->field($model, 'squareAll') ?>

    <?php // echo $form->field($model, 'squareLiving') ?>

    <?php // echo $form->field($model, 'squareKitchen') ?>

    <?php // echo $form->field($model, 'squareBalcony') ?>

    <?php // echo $form->field($model, 'squareBathroom') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dateSale') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'priceHidden') ?>

    <?php // echo $form->field($model, 'auction') ?>

    <?php // echo $form->field($model, 'isRented') ?>

    <?php // echo $form->field($model, 'isDeleted') ?>

    <?php // echo $form->field($model, 'toSite') ?>

    <?php // echo $form->field($model, 'forExport') ?>

    <?php // echo $form->field($model, 'countryId') ?>

    <?php // echo $form->field($model, 'regionId') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'buildMaterialId') ?>

    <?php // echo $form->field($model, 'apartmentLayoutId') ?>

    <?php // echo $form->field($model, 'conditionId') ?>

    <?php // echo $form->field($model, 'bathroomCount') ?>

    <?php // echo $form->field($model, 'ceilingHeight') ?>

    <?php // echo $form->field($model, 'yearBuild') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'descriptionForSite') ?>

    <?php // echo $form->field($model, 'descriptionNear') ?>

    <?php // echo $form->field($model, 'rentedWith') ?>

    <?php // echo $form->field($model, 'rentedTo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
