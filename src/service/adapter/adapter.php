<?php
namespace Src\Service\Adapter;
/**
 * Class Adapter
 * @package Src\Service\Adapter
 * 适配器模式
 */

class Adapter extends Target {
    private $adapter;
    public function __construct($obj){
        $this->adapter = $obj;
    }

    public function updateCustomer () {
        //todo
    }


    public function updateCreative()
    {
        // TODO: Implement updateCreative() method.
    }

}