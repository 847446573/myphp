<?php
namespace Src\Service\Gc;

/**
 * Created by PhpStorm.
 * User: jueqi
 * Date: 2018/10/17
 * Time: 10:28
 */
/**
 * 简单工厂模式
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