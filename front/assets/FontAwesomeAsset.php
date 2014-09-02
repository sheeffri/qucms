<?php

namespace admin\assets;

class FontAwesomeAsset extends \yii\web\AssetBundle
{
    public $allowFiles = [
        'css/font-awesome.min.css',
        'fonts'
    ];

    public function beforeCopy($from, $to)
    {
        foreach ($this->allowFiles as $file) {
            $len = min([mb_strlen($from), mb_strlen($file)]);
            if (mb_substr($from, 0, $len) === mb_substr($file, 0, $len)) {
                return $len;
            }
        }
    }

    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/font-awesome.min.css'
    ];

    public function init()
    {
        parent::init();
        foreach ($this->allowFiles as &$file) {
            $file = realpath($this->sourcePath . '/' . $file);
        }
        unset($file);
        $this->publishOptions = [
            "beforeCopy" => [$this, 'beforeCopy']
        ];
    }

}
