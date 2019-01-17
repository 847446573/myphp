<?php
namespace Src\Service\Register;
/**
 * 注册模式
 **/
class Register {
    protected  static $objects;
    function set ($alias,$object) {
        self::$objects[$alias] = $object;

    }
    function get ($name) {
        return self::$objects[$name];
    }
}