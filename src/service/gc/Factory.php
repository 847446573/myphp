<?php
namespace Src\Service\Gc;
use Src\Service\Gc\AddResult;
use Src\Service\Gc\SubResult;

class Factory {
    public function operate ($operate) {
        switch ($operate) {
            case '+':
                return new AddResult();
                break;
            case '-':
                return new SubResult();
                break;
            default:
                echo "开发中......";
        }
    }


}