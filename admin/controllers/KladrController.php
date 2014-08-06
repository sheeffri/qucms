<?php

namespace admin\controllers;

use common\models\City;
use common\models\Country;
use common\models\Region;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use \yii\web\Controller;

class KladrController extends Controller
{
    protected $config = [
        'country' => [
            'name' => 'country',
            'model' => 'common\models\Country',
            'searchModel' => 'admin\models\search\Country',
            'title' => 'Страны',
            'newTitle' => 'Новая страна',
            'child' => 'region'
        ],
        'region' => [
            'name' => 'region',
            'model' => 'common\models\Region',
            'searchModel' => 'admin\models\search\Region',
            'title' => 'Регионы',
            'newTitle' => 'Новый регион',
            'parent' => 'country',
            'parentField' => 'countryId',
            'child' => 'city'
        ],
        'city' => [
            'name' => 'city',
            'model' => 'common\models\City',
            'searchModel' => 'admin\models\search\City',
            'title' => 'Города',
            'newTitle' => 'Новый город',
            'parent' => 'region',
            'parentField' => 'regionId'
        ]
    ];

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'deleteCountry' => ['post'],
                    'deleteRegion' => ['post'],
                    'deleteCity' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', $this->search($this->config['country']));
    }

    public function actionView($modelName, $id)
    {
        $config = $this->config[$modelName];
        $model = $this->findModel($config['model'], $id);
        return $this->render("view", array_merge([
            'model' => $model,
            'breadcrumbs' => $this->getBreadcrumbs($model, $config),
            'config' => $config,
            'id' => $id
        ], isset($config['child']) ? $this->search($this->config[$config['child']], $id) : []));
    }

    public function actionCreate($modelName, $parentId = 0)
    {
        $config = $this->config[$modelName];
        $model = \Yii::createObject($config['model']);
        if ($parentId > 0) {
            $model{$config['parentField']} = $parentId;
        }
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["view", 'modelName' => $modelName, 'id' => $model->id]);
        } else {
            $breadcrumbs = [];
            if (isset($config['parent'])) {
                $parentConfig = $this->config[$config['parent']];
                $parent = $this->findModel($parentConfig['model'], $parentId);
                $breadcrumbs = $this->getBreadcrumbs($parent, $parentConfig, true);
            }
            return $this->render('create', [
                'model' => $model,
                'config' => $config,
                'breadcrumbs' => $breadcrumbs
            ]);
        }
    }

    public function actionUpdate($modelName, $id)
    {
        $config = $this->config[$modelName];
        $model = $this->findModel($config['model'], $id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'modelName' => $modelName, 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'breadcrumbs' => $this->getBreadcrumbs($model, $config, true)
            ]);
        }
    }

    public function actionDelete($modelName, $id)
    {
        $config = $this->config[$modelName];
        $model = $this->findModel($config['model'], $id);
        $url = ['index'];
        if (isset($config['parent'])) {
            $url = ['view', 'modelName' => $config['parent'], 'id' => $model->{$config['parentField']}];
        }
        $model->delete();
        return $this->redirect($url);
    }

    public function actionGetCountries($term)
    {
        return json_encode(ArrayHelper::getColumn(Country::find()->select('title')->asArray()->all(), 'title'));
    }

    public function actionGetRegions($term)
    {
        return json_encode(ArrayHelper::getColumn(Region::find()->select('title')->where(['like', 'title', $term . '%', false])->asArray()->all(), 'title'));
    }

    public function actionGetCities()
    {
        return json_encode(ArrayHelper::getColumn(City::find()->select('title')->asArray()->all(), 'title'));
    }

    protected function getBreadcrumbs($model, $config, $link = false)
    {
        if (isset($config['parent'])) {
            $breadcrumbs = $this->getBreadcrumbs($model->{$config['parent']}, $this->config[$config['parent']], true);
        }
        $breadcrumbs[] = $link ? ['label' => $model->title, 'url' => ['view', 'modelName' => $config['name'], 'id' => $model->id]] : $model->title;
        return $breadcrumbs;
    }

    protected function search($config, $id = 0)
    {
        $searchModel = \Yii::createObject($config['searchModel']);
        $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());
        if ($id > 0) {
            $dataProvider->query->andFilterWhere([$config['parentField'] => $id]);
        }
        return [
            'child' => $config,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ];
    }

    protected function findModel($modelName, $id)
    {
        if (($model = call_user_func([$modelName, 'findOne'], $id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
