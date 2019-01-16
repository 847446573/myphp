<?php
namespace Src\Service\Refection;
use ReflectionClass;
class Factory {
    public $nameSpacesAdd = "Src\Service\Refection"."\AddResult";
    public $nameSpacesSub = "Src\Service\Refection"."\SubResult";
    public function addFunction () {
        $class =  new ReflectionClass($this->nameSpacesAdd);
        return $class->newInstance();

    }
    public function subFunction () {
        $class =  new ReflectionClass($this->nameSpacesSub);
        return $class->newInstance();

    }


}