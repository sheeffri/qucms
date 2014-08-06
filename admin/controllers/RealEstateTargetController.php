<?php

namespace admin\controllers;

use common\models\RealEstate;
use Yii;
use common\models\RealEstateTarget;
use admin\models\search\RealEstateTarget as RealEstateTargetSearch;
use yii\db\Expression;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RealEstateTargetController implements the CRUD actions for RealEstateTarget model.
 */
class RealEstateTargetController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all RealEstateTarget models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RealEstateTargetSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single RealEstateTarget model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RealEstateTarget model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RealEstateTarget;
        $features = null;
        if (isset($_POST['used']) || isset($_POST['required'])) {
            $features = $this->getSelectedFeatures();
            $model->fieldsFromArray($features);
        }


        $model->load(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'features' => $this->getFeatures($model, $features)
            ]);
        }
    }

    /**
     * Updates an existing RealEstateTarget model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $features = null;
        if (isset($_POST['used']) || isset($_POST['required'])) {
            $features = $this->getSelectedFeatures();
            $model->fieldsFromArray($features);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'features' => $this->getFeatures($model, $features)
            ]);
        }
    }

    /**
     * Deletes an existing RealEstateTarget model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function getSelectedFeatures()
    {
        $features = array_flip(ArrayHelper::getColumn(RealEstate::$mainFeature, 0));
        foreach ($features as &$feature) {
            $feature = [
                'used' => false,
                'required' => false
            ];
        }
        unset($feature);

        $selectedFeature = Yii::$app->request->post('used', []);
        foreach ($selectedFeature as $value) {
            $features[$value]['used'] = true;
        }
        $selectedFeature = Yii::$app->request->post('required', []);
        foreach ($selectedFeature as $value) {
            $features[$value] = [
                'used' => true,
                'required' => true
            ];
        }
        return $features;
    }

    /**
     * @param RealEstateTarget $model
     * @param null $fromPost
     * @return array
     */
    protected function getFeatures($model, $fromPost = null)
    {
        $features = [];
        $realEstate = new RealEstate();
        foreach (RealEstate::$mainFeature as $index => $feature) {
            list($name, ,$group) = $feature;
            $value = 1 << $index;
            $features[] = [
                'title' => '<b>' . $realEstate->getAttributeLabel($name) . '</b>',
                'name' => $name,
                'group' => RealEstate::$groups[$group],
                'used' => ($value & $model->fields) > 0,
                'required' => ($value & $model->requiredFields) > 0,
                'predefined' => 'true'
            ];
        }
        $additionFeatures = (new Query())
            ->select('f.name title, f.id name, g.name group')
            ->from('real_estate_feature f')
            ->leftJoin('real_estate_feature_group g', 'f.groupId = g.id');
        if ($fromPost === null) {
            $subQuery = (new Query())
                ->select('real_estate_feature reid, required')
                ->from('real_estate_target_feature')
                ->where(['real_estate_target' => $model->id]);
            $additionFeatures->addSelect([
                new Expression('`tf`.`reid` IS NOT NULL AS `used`'),
                new Expression('IFNULL(`tf`.`required`, 0) AS `required`')
            ])
                ->leftJoin(['tf' => $subQuery], 'f.id = tf.reid');
        } else {
            $additionFeatures->addSelect([
                new Expression('0 used'),
                new Expression('0 required')]);
        }
        $features = array_merge($features, $additionFeatures->all());
        $features = ArrayHelper::map($features, 'name', function($array, $default) use ($fromPost) {
            $name = $array['name'];
            unset($array['group']);
            if (isset($array['predefined'])) {
                unset($array['predefined']);
            }
            else {
                $array['title'] = Html::encode($array['title']);
            }
            if ($fromPost !== null && isset($fromPost[$name])) {
                $array = array_merge($array, $fromPost[$name]);
            }

            return $array;
        }, 'group');
        return $features;
    }

    /**
     * Finds the RealEstateTarget model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RealEstateTarget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RealEstateTarget::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
