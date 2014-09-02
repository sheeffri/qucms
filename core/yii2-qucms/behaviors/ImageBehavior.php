<?php

namespace siasoft\qucms\behaviors;

use yii\base\Behavior;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;

/**
 * Description of Image
 * @property string $name Name of behavior
 * @property array $imageNames
 * @property string $modelName Name of owner
 * @author SW-PC1
 */
class ImageBehavior extends Behavior {

    private $_name;

    private $_imageNames;

    /**
     * list of image sections for generate image
     * @var string[]
     */
    public $sections = [];

    /**
     * Getter for modelName
     * @return string
     */
    protected function getModelName() {
        $class = $this->owner->className();
        return mb_substr($class, mb_strrpos($class, '\\') + 1);
    }
    
    /**
     * Getter for name
     * @return string
     */
    protected function getName() {
        if ($this->_name === null) {
            return $this->_name = array_search($this, $this->owner->behaviors, true);
        }
        return $this->_name;
    }

    protected function getImageNames() {
        if ($this->_imageNames === null) {
            $name = $this->getName();
            $names = [$name];
            foreach($this->sections as $section) {
                $names[] = $name . Inflector::camelize($section);
            }
            $this->_imageNames = $names;
        }
        return $this->_imageNames;
    }

    public function __get($name)
    {
        if (in_array($name, $this->getImageNames())) {
            return [];
        }
        return parent::__get($name);
    }

    public function canGetProperty($name, $checkVars = true) {
        switch ($name) {
            case 'name':
            case 'maxCount':
            case 'modelName':
            case 'requiredFields':
            case 'imageNames':
                return false;
        }

        if (in_array($name, $this->imageNames)) {
            return true;
        }

        return parent::canGetProperty($name, $checkVars);
    }
}
