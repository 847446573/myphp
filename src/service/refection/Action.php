<?php
namespace Src\Service\Refection;

/**
 *  一个interface 或 abstract 抽象类
 *  多个实现interface 或 继承抽象类
 *  一个工厂
 *
 * */
abstract class Action {
    public $a;
    public $b;
    public function setA($a) {
        $this->a = $a;
    }
    public function setB($b) {
        $this->b = $b;
    }

    abstract public function getResult();

}