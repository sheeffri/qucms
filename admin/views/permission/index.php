<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \admin\models\AuthItem */

$this->title = 'Разрешения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permissions-index">
    <script>
        "use strict";
        var permissionModule = angular.module("permission", []);
        permissionModule.controller("PermissionController", function () {
            this.items = <?= \yii\helpers\Json::encode(new \siasoft\angular\JsonWrapper(['value' => $m, 'fields' => ['name', 'description', 'authItemChild.parent' => 'parentName']])) ?>;

            this.setParent = function (item) {
                var parent = undefined;
                for (var i = 0, len = this.items.length; i < len; i++){
                    if (this.items[i].name === item.parentName){
                        parent = this.items[i]; // Return as soon as the object is found
                    }
                }
                if (parent == undefined) {
                    return true;
                }
                if (!("items" in parent)) {
                    parent.items = [];
                }
                parent.items.push(item);
                item.parent = parent;
            }

            this.setParents = function () {
                this.items.forEach(function (item) {
                    this.setParent(item);
                }, this);
            }

            this.setParents();

            this.edit = function (item) {
                this.isNew = false;
                this.editable = {
                    name: item.name,
                    description: item.description,
                    parent: item.parent
                }
                $("#formDialog").dialog("open");
            }

            this.rootOnly = function (item) {
                return item.parent == undefined;
            }

            this.new = function () {
                this.isNew = true;
                this.editable = { };
                $("#formDialog").dialog("option", "title", "Новый элемент").dialog("open");
            }

            this.add = function () {
                $.post('<?= \yii\helpers\Url::to(['create']) ?>', $("#permissionForm").serializeArray());
                this.items.push(this.editable);
                this.setParent(this.editable);
                this.editable = { parentName: this.editable.parentName};
            }

            this.save = function () {
                var newItem = this.editableItem;
                if (newItem.type == "group") {
                    this.items.push({name: newItem.name, items: []});
                } else {
                    newItem.parent.items.push({name: newItem.name, desc: newItem.description});
                }
                this.editableItem = {
                    type: newItem.type,
                    name: "",
                    description: "",
                    parent: newItem.parent
                };
            };
        });
    </script>

    <!--    Диалог нового элемента  -->
    <div id="permission" ng-app="permission" ng-controller="PermissionController as permission">
        <?php \yii\jui\Dialog::begin(["options" => [
            "id" => "formDialog",
            "style" => "display: none;"], "clientOptions" => [
            "modal" => true,
            "autoOpen" => false,
            "width" => 600]]) ?>
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            "id" => "permissionForm",
            "beforeSubmit" => 'function($form) { angular.element($("#permission")).scope().$apply("permission.add()"); return false; }',
            "validationUrl" => ["validate"],
            "options" => ["autocomplete" => "off"]]); ?>
        <?=
        $form->field($model, "parentName")->dropDownList(["" => "--Корень--"], [
            "ng-model" => "permission.editable.parentName",
            "ng-options" => "item.name as item.name for item in permission.items"]); ?>
        <?=
        $form->field($model, "name", [
            "enableAjaxValidation" => true])->textInput([
                "ng-model" => "permission.editable.name"]
        ); ?>
        <?= $form->field($model, "description")->textarea(["ng-model" => "permission.editable.description"]) ?>
        <span ng-show="permission.isNew">
            <button type="submit" class="btn btn-success">Добавить</button>
        </span>
        <span ng-hide="permission.isNew">
            <button type="submit" class="btn btn-success">Пременить</button>
            <a class="btn btn-danger">Отменить</a>
        </span>
        <a class="btn btn-warning">Сбросить</a>
        <?php $form = \yii\bootstrap\ActiveForm::end(); ?>
        <?php \yii\jui\Dialog::end() ?>
        <!--    Конец диалога   -->

        <div>
            <script type="text/ng-template" id="itemTemplate">
                <button class="btn btn-warning btn-xs pull-right" ng-click="permission.edit(item)">
                    <i class="fa fa-pencil"></i>
                </button>
                <div class="pull-right" style="width: 800px">{{item.description}}</div>
                <div class="clearfix">{{item.name}}</div>
                <div ng-repeat="item in item.items" style="padding-left: 15px" ng-include="'itemTemplate'"></div>
            </script>
            <h1><?= Html::encode($this->title) ?></h1>
            <button class="btn btn-success" ng-click="permission.new()">Создать</button>
            <div>
                <div ng-repeat="item in permission.items | filter:permission.rootOnly"
                     ng-include="'itemTemplate'"></div>
            </div>
        </div>
    </div>
</div>