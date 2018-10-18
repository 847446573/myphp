<?php
namespace Src\Service\Cxgc;
use Src\Service\Cxgc\Action;


class AddResult extends Action {

    public function getResult()
    {
        // TODO: Implement getResult() method.
        return ($this->a)+($this->b);
    }

}