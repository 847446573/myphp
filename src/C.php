<?php
namespace Src;
use \Src\Service\Cservice;
use Src\Service\Observer\EventFs1;
use Src\Service\Observer\ObserverFs1;
use Src\Service\Observer\ObserverFs2;
use Src\Service\Ssp\Qingting;
use Src\Service\Ssp\Funadx;
use Src\Service\Ms;
use Src\Service\Gc\Factory;
use Src\Service\Gcff\AddFactory;
use Src\Service\Gcff\SubFactory;
use Src\Service\Cxgc\CalFactory;
use Src\Service\Refection\Factory as Rfactory;
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

    /**
     * 工厂模式测试
     */
    public function test1 () {
        $factory1 = new Factory();
        //$operate = $factory1->operate("+");
        $operate = $factory1->operate("-");
        $operate->setA(1);
        $operate->setB(1);
        echo $operate->getResult().":简单工厂模式测试<br/>";

    }

    /**
     *
     * 工厂方法模式测试
     */
    public function test2 () {
        $addFactory = new AddFactory();
        $addPro = $addFactory->operate();
        $addPro->setA(2);
        $addPro->setB(1);
        echo $addPro->getResult().":工厂方法模式测试<br/>";

        $addFactory = new SubFactory();
        $addPro = $addFactory->operate();
        $addPro->setA(2);
        $addPro->setB(1);
        echo $addPro->getResult().":工厂方法模式测试<br/>";

    }

    /**
     * 抽象工厂测试
     *
     *
     */
     public function test3 () {
         $calFactory = new CalFactory();
         $addPro = $calFactory->addPro();
         $addPro->setA(22);
         $addPro->setB(33);
         echo $addPro->getResult().":抽象工厂模式测试<br/>";


         $calFactory = new CalFactory();
         $addPro = $calFactory->subPro();
         $addPro->setA(44);
         $addPro->setB(33);
         echo $addPro->getResult().":抽象工厂模式测试<br/>";

     }

     /**
      *
      * 反射优化抽象工厂模式测试
      */
     public function test4 () {
        $factory = new Rfactory();
        $pro = $factory->addFunction();
        $pro->setA(2);
        $pro->setB(2);
        echo $pro->getResult().":抽象工厂模式测试<br/>";


     }

     /*
      * 观察者模式
      * */
     public function test5 () {
         $fs1 = new EventFs1();
         $fs1->addObserver(new ObserverFs1());
         $fs1->addObserver(new ObserverFs2());
         $fs1->notice();

     }



}
$fileAttr = pathinfo("http://test.resbj.truegrowth.cn/img/d885a95e1c24184752666a3384aba624.jpg", PATHINFO_EXTENSION);
echo $fileAttr;

echo "<pre>";
$c = new c();
//工厂模式测试
$c->test1();
//工厂方法模式测试
$c->test2();
//抽象工厂模式测试
$c->test3();
//反射优化抽象工厂模式测试
$c->test4();
//观察者模式测试
$c->test5();

