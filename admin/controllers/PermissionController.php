<?php

namespace admin\controllers;

use admin\models\AuthItem;
use admin\models\Permission;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\rbac\DbManager;
use yii\web\Controller;
use yii\web\Response;

/**
 * Permission controller
 */
class PermissionController extends Controller
{
    /**
     * List all permissions
     * @return string
     */
    public function actionIndex()
    {
        $model = new Permission();
        $permissions = AuthItem::find()->with('authItemChild')->all();
        return $this->render("index", ["model" => $model, "m" => $permissions]);
    }

    public function actionValidate()
    {
        $model = new Permission();
        $model->load($_POST);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

    /**
     * Create new permissions
     * @return string
     */
    public function actionCreate()
    {
        $auth = Yii::$app->authManager;
        $model = new Permission();
        $model->load($_POST);
        $permission = $auth->createPermission($model->name);
        $permission->description = $model->description;
        $auth->add($permission);
        if ($model->parentName) {
            $auth->addChild($auth->getPermission($model->parentName), $permission);
        }
    }

    /**
     * Update permission
     * @param int $id name off permission
     * @return type
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
     *
     * @param type $id
     * @return string;
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
