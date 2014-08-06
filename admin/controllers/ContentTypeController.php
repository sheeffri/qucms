<?php

namespace admin\controllers;

class ContentTypeController extends \yii\web\Controller
{
    public function getContentTypes($aliases, &$result)
    {
        foreach($aliases as $alias => $path) {
            if (is_array($path)) {
                $this->getContentTypes($path, $result);
                continue;
            }
            if (file_exists($path . '/QuCMS-package.php')) {
                $packageDescription = require($path . '/QuCMS-package.php');
                if (isset($packageDescription['contentTypes'])) {
                    $child = [];
                    foreach($packageDescription['contentTypes'] as $contentType) {
                        $description = require $path . '/' . $contentType;
                        $child[] = [
                                "name" => $description['name'],
                                "path" => strtr($alias . '/' . $contentType, ['@' => '', '.php' => ''])
                            ];
                    }
                    $result[] = [
                        "group" => $packageDescription['name'],
                        "contentTypes" => $child];
                }
            }
        }
    }

    public function actionIndex()
    {
        $contentTypes = [];
        $this->getContentTypes(\Yii::$aliases, $contentTypes);
        return $this->render('index', ['contentTypes' => $contentTypes]);
    }

    public function actionView($ContentType)
    {
        $ContentTypeDefinition = require \Yii::getAlias("@$ContentType.php");
        return $this->render('view', ["model" => $ContentTypeDefinition]);
    }
}
