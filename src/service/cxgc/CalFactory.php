<?php
namespace Src\Service\Cxgc;
use Src\Service\Cxgc\Factory;
use Src\Service\Cxgc\AddResult;
class CalFactory extends Factory{
    public function addPro()
    {
        // TODO: Implement addResult() method.
        return new AddResult();

    }
    public function subPro()
    {
        // TODO: Implement subPro() method.
        return new SubResult();
    }
}