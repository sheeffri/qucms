<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 13.08.14
 * Time: 15:07
 */

namespace siasoft\qucms\web;


class Image {
    public $url;

    public $title;

    public $height;

    public $width;

    public $size;

    function __construct($row)
    {
        $url = $row['url'] . "\\"; explode("\\", str_split($row['id'], 4));
    }
}