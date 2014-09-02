<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace siasoft\qucms\widgets;

use siasoft\qucms\web\FileUploadAsset;
use yii\base\Widget;
use yii\db\BaseActiveRecord;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\JsExpression;
use yii\web\Session;
use yii\web\View;

/**
 * Description of Image
 *
 * @author SW-PC1
 */
class ImageUploader extends Widget
{
    public $itemTemplate = '<div class="dz-preview dz-image-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name="">{fileName}</span></div><img data-dz-thumbnail="" alt="Chrysanthemum.jpg" src="{url}"></div><a class="btn btn-sm btn-danger btn-block" href="{removeUrl}">Удалить файл</a></div>';

    /**
     * target model
     * @var \yii\base\Model
     */
    public $model;
    /**
     * name of image behavior
     * @var string
     */
    public $attribute;

    public $options = [
        'multiple' => true
    ];

    public $clientOptions = [];

    public function init()
    {
        parent::init();
    }

    private function getSessionKey() {
        $pk = '';
        if (is_a($this->model, BaseActiveRecord::className())) {
            $pk = implode('_', array_values($this->model->getPrimaryKey(true)));
        }
        return strtr($this->model->className(), ['\\' => '_']) . '_' . $this->id . '_' . ($pk === '' ? 'new' : $pk);
    }

    private function imagesFromSession($key) {
        $session = new Session();
        $session->open();
        $result = $session->get($key, []);
        $session->close();
        return $result;
    }

    public function run()
    {
        $sessionKey = $this->getSessionKey();
        $jsTemplate = strtr($this->itemTemplate, [
            '{fileName}' => "'+data.result.name+'",
            '{url}' => "'+data.result.url+'",
            '{removeUrl}' => Url::to(['image/remove', 'key' => $sessionKey])
        ]);
        $options = array_merge([
            'dataType' => 'json',
            'url' => Url::to(['image/upload']),
            'dropZone' => "#$this->id-container",
            'formData' => [
                'key' => $sessionKey,
                'parameterName' => $this->id
            ],
            'done' => new JsExpression("function(e, data){jQuery('$jsTemplate').appendTo('#$this->id-container');}"),
            'dragover' => new JsExpression("function(e){jQuery('#$this->id-container').addClass('dz-drag-hover');}"),
            'drop' => new JsExpression("function(e){jQuery('#$this->id-container').removeClass('dz-drag-hover');}")
        ], $this->clientOptions);
        $this->options['id'] = $this->id;
        Html::addCssClass($this->options, 'hidden');
        echo Html::beginTag('div', ['id' => $this->id . '-container', 'class' => 'dropzone dz-clickable']);
        echo Html::tag('div', '', ['class' => 'dz-default dz-message']);
        $images = array_merge($this->model->{$this->attribute}, $this->imagesFromSession($sessionKey));
        foreach ($images as $image) {
            echo strtr($this->itemTemplate, [
                '{fileName}' => $image->name,
                '{url}' => $image->url,
                '{removeUrl}' => Url::to(['image/remove', 'key' => $sessionKey, 'file' => $image->name])
                ]
            );
        }
        echo Html::endTag('div');

        $this->view->on(View::EVENT_END_BODY, function() { echo Html::fileInput($this->id, null, $this->options); });
        FileUploadAsset::register($this->view);
        $options = Json::encode($options);
        $this->view->registerJs("jQuery('#{$this->id}-container').click(function(eventData){ if (jQuery(eventData.target).hasClass('dz-clickable')) { jQuery('#{$this->id}').click(); }});");
        $this->view->registerJs("jQuery('#$this->id').fileupload($options);");
        $this->view->registerJs("jQuery('#{$this->id}-container').on('dragleave', function(e){jQuery('#$this->id-container').removeClass('dz-drag-hover');});");
        $this->view->registerJs("jQuery('#{$this->id} a').click(function(){alert('');})");
    }
}
