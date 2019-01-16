<?php
namespace Src\Service\Adapter;


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