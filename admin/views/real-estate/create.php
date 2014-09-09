<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstate $model
 * @var \common\models\Addres $addressModel
 */
$this->title = 'Новый объект';
$this->params['breadcrumbs'][] = ['label' => 'Вся недвижимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-list-alt fa-fw "></i>
            <?= Html::encode($this->title) ?>
        </h1>
    </div>
</div>

<div class="well">
    <?php
    if ($model->targetId === null) {
        $targets = ['' => 'Выбирете тип'] + $targets;
    }
    ?>
    <?= Html::beginForm(['real-estate/create'], 'get', ['id' => 'selectTargetForm', 'class' => 'smart-form']) ?>
    <section>
        <?= Html::dropDownList('targetId', $model->targetId, $targets, ['id' => 'selectTarget']) ?>
    </section>
    <?= Html::endForm() ?>
</div>


<section id="widget-grid">
    <div class="row">
        <article class="col-xs-12 sortable-grid ui-sortable">
            <div id="wid-id-0" class="jarviswidget jarviswidget-sortable"  data-widget-editbutton="false" data-widget-colorbutton="false" >
                <header>
                    <span class="widget-icon"> <i class="fa fa-building"></i> </span>
                    <h2>Карточка объекта недвижимости</h2>
                </header>
                <div>
                    <div class="widget-body no-padding">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                            'addressModel' => $addressModel,
                            'targets' => $targets
                        ])
                        ?>                        
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>


