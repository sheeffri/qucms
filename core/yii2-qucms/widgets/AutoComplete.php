<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 31.07.14
 * Time: 18:18
 */

namespace siasoft\qucms\widgets;


use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Security;
use yii\helpers\Url;
use yii\web\JsExpression;
use Yii;

class AutoComplete extends \yii\jui\AutoComplete
{

    private static $sessionId;

    public $sourceConfig = [];


    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'form-control');
        $config = base64_encode(Security::encrypt(serialize($this->sourceConfig), self::$sessionId));
        $url = Url::to(['/auto-complete']);
        //$valueId = Html::getInputId($this->model, $this->attribute.'Value');
        //$this->clientOptions['select'] = new JsExpression("function( event, ui ){jQuery('#$valueId').val(ui.item.id);}");
        $condition = $this->sourceConfig['dependency'];
        foreach ($condition as &$value) {
            $value = new JsExpression("jQuery('#$value').val()");
        }
        unset($value);
        $condition = Json::encode($condition);
        $this->clientOptions['source'] = new JsExpression("function(request, response){request.config='$config';request.condition=$condition;jQuery.post('$url',request,function(data,status,xhr){response(data);},'json')}");
    }

    public function renderWidget()
    {
        $value = '';
//        if (isset($this->sourceConfig['value'])) {
//            if ($this->hasModel()) {
//                $value = Html::activeHiddenInput($this->model, $this->attribute . 'Value', []);
//            } else {
//                $value = Html::hiddenInput($this->name . 'Value', $this->value, []);
//            }
//        }
        return parent::renderWidget().$value;
    }


    public static function  initStatic()
    {
        \Yii::$app->session->open();
        self::$sessionId = \Yii::$app->session->id;
        \Yii::$app->session->close();
    }
}

AutoComplete::initStatic();