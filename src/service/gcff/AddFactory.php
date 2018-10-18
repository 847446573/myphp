<?php
namespace Src\Service\Gcff;
use Src\Service\Gcff\Factory;
use Src\Service\Gcff\AddResult;

class AddFactory extends Factory{
    public function operate()
    {
        // TODO: Implement operate() method.
        return new AddResult();
    }
}