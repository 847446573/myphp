<?php
/**
 * Created by PhpStorm.
 * User: jueqi
 * Date: 2018/5/29
 * Time: 14:10
 */
namespace Src\Service;
use Src\Service\Service;
require_once "Service.php";
class Cservice extends Service
{



    public function index () {
        $result = $this->attributes;
        echo "<pre>";
        print_R($result);
        exit;
    }



}