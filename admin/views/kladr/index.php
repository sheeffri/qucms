<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\search\Country $searchModel
 */

$this->title = 'Страны';
$this->params['breadcrumbs'][] = 'Адресный классификатор';

require '_list.php';