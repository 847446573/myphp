<?php
namespace Src\Service\Gc;
use Src\Service\Gc\Action;


class AddResult extends Action {

    public function getResult()
    {
        // TODO: Implement getResult() method.
        return ($this->a)+($this->b);
    }

}