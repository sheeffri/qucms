<?php

namespace admin\controllers;

use common\models\Addres;
use common\models\RealEstateTarget;
use Yii;
use common\models\RealEstate;
use admin\models\search\RealEstate as RealEstateSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RealEstateController implements the CRUD actions for RealEstate model.
 */
class RealEstateController extends Controller
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
     * Lists all RealEstate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RealEstateSearch;

        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        if (count($_GET)) {
            VarDumper::dump($searchModel, 10, true);
            die();
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single RealEstate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function getAdditionalData()
    {
        return [
            'targets' => ArrayHelper::map(RealEstateTarget::find()->select('id, title')->asArray()->all(), 'id', 'title')
        ];
    }

    /**
     * Creates a new RealEstate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param null $targetId
     * @return mixed
     */
    public function actionCreate($targetId = null)
    {
        $model = new RealEstate;
        $model->targetId = $targetId;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->post('action', '') === 'save' && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', array_merge([
                'model' => $model,
                'addressModel' => new Addres()
            ], $this->getAdditionalData()));
        }
    }

    /**
     * Updates an existing RealEstate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RealEstate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RealEstate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RealEstate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RealEstate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
