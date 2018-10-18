<?php
namespace Src\Service\Act;

/**
 * Class Caction
 * @package Src\Service\Act
 *
 * 行为模式
 * 1 迭代模式
 *
 */
class Caction {

    private $_tempArray = [];

    public function __construct()
    {

    }


    /**
     * @param $ele
     *
     */
    public function addElements ($ele)
    {
        $this->_tempArray[] = $ele;
    }


    /**
     *
     * 获取
     */
    public function getElements ()
    {

    }



}