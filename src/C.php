<?php
namespace Src;
use \Src\Service\Cservice;
use Src\Service\Ssp\Qingting;
use Src\Service\Ssp\Funadx;
class C
{
    public $cservice = null;
    public function __construct()
    {

        //require_once "./service/Cservice.php";
        spl_autoload_register(function ($className) {
            require_once dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $className) . '.php';
        },true, true);
        $this->cservice = new Cservice();
    }

    public function  index ()
    {
        error_reporting(E_ALL);
        $data = [
            ['id'=>1,'content'=>'内容11111111'],
            ['id'=>2,'content'=>'内容222222'],
        ];
        $this->cservice->attributes = $data;
        $this->cservice->index();
    }


    /**
     *  ssp 接拉测试
     *
     */
    public function sspDoing () {

        //ssp媒体蜻蜓
        $qt = new Qingting([],[]);
        echo $qt->uploadAdOrgInfo();
        echo "=================";
        //ssp funAdx
        $fun = new Funadx([],[]);
        echo $fun->uploadAdOrgInfo();
        exit;
    }




}

$c = new c();
$c->sspDoing();