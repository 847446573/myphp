<?php
namespace Src\Service\Adapter;

/**
 *      前四个方法，是原来的功能，随着产品的发展，
 *      此接口日后会扩展无数的方法,这样，实现抽象类也得修改，添加上后面的方法，
 *      如果实现抽象的类有上几十了，让让人很疯狂，
 *      解决办法：适配器模式
 *
 * */
abstract class Action {
    abstract public function uploadAdser();
    abstract public function getAdser();
    abstract public function uploadCreative();
    abstract public function getCreative();

    //后期扩展的功能方法
   /* public function updateCustomer ();

    public function delCreative ();*/


}