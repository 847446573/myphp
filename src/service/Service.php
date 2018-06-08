<?php
/**
 * 模仿java框架
 * service 承接c->m中间层中相关的数据操作的业务
 *
 */
namespace Src\Service;
class Service
{
    private $attrData;

    public function __set($name, $value)
    {
        if ($name == 'attributes') {
            $this->attrData = $value;
        }
    }


    public function __get($name)
    {
        if ($name == 'attributes') {
           return $this->attrData;
        }
    }


}