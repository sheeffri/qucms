<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 18.07.14
 * Time: 17:18
 */

namespace siasoft\angular;


use yii\base\Object;
use yii\helpers\VarDumper;

class JsonWrapper extends Object implements \JsonSerializable {
    public $value;

    public $fields = [];
    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $result = [];
        if (is_array($this->value)) {
            foreach ($this->value as $item) {
                $result[] = new JsonWrapper(['value' => $item, 'fields' => $this->fields]);
            }
        } else {
            foreach ($this->fields as $name => $alias) {
                if (is_int($name)) {
                    $name = $alias;
                }
                $path = explode('.', $name);
                $value = $this->value;
                foreach ($path as $f) {
                    if ($value !== null)
                        $value = $value->{$f};
                }
                $result[$alias] = $value;
            }
        }
        return $result;
    }
}